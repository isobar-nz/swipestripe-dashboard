<?php

class DashboardSalesStatistics extends DashboardPanel
{

    static $icon = "swipestripe-dashboard/images/dashboard-sales-statistics.png";

    private $orders;

    public function getLabel() {
        return 'Sales Statistics';
    }

    public function getDescription() {
        return 'Shows sales statistics';
    }

    public function getConfiguration() {
        $fields = parent::getConfiguration();
        return $fields;
    }

    public function PanelHolder() {
        Requirements::css("swipestripe-dashboard/css/swipestripe-dashboard.css");
        return parent::PanelHolder();
    }

    public function getOrders() {
        if (!$this->orders) {
            $this->orders = Order::get()->filter(array('Status' => array('Dispatched', 'Processing')))->sort("Created DESC");
        }
        return $this->orders;
    }

    public function getOrderCount()
    {
        return $this->getOrders()->count();
    }

    public function getTotalSalesValue()
    {
        $total = 0.0;
        foreach($this->getOrders() as $order) {
            $total += $order->Total()->getAmount();
        }
        return $total;

    }

    public function getNumberOfProductsSold()
    {
        $total = 0;
        foreach($this->getOrders() as $order) {

            foreach ($order->Items() as $item) {
                $total += $item->Quantity;
            }
        }
        return $total;
    }

    public function getPopularProducts()
    {
        $products = array();

        foreach ($this->getOrders() as $order) {
            foreach ($order->Items() as $item) {
                if (isset($products[$item->Product()->ID])) {
                    $products[$item->Product()->ID]['Sold'] = $products[$item->Product()->ID]['Sold'] + $item->Quantity;
                } else {
                    $products[$item->Product()->ID]['Sold'] =  $item->Quantity;
                    $products[$item->Product()->ID]['Title'] = $item->Product()->Title;
                    $products[$item->Product()->ID]['EditLink'] = $item->Product()->getCMSEditLink();
                }
            }
        }

        // sort by the 'Sold' key on each object.
        uasort(
            $products,
            function ($a, $b) {
                if ($a['Sold'] == $b['Sold']) {
                    return 0;
                }
                return ($a['Sold'] > $b['Sold']) ? -1 : 1;
            }
        );

        return new ArrayList(array_slice($products, 0, 5));
    }

}