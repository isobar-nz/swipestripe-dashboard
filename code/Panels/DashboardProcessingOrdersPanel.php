<?php

class DashboardProcessingOrdersPanel extends DashboardPanel
{

    static $icon = "swipestripe-dashboard/images/dashboard-processing-orders.png";

    public function getLabel() {
        return 'Orders to be Processed';
    }

    public function getDescription() {
        return 'Shows orders which need to be processed.';
    }

    public function getConfiguration() {
        $fields = parent::getConfiguration();
        return $fields;
    }

    public function Orders() {
        $orders = Order::get()->filter(array('Status' => 'Processing'))->sort("Created DESC");
        return $orders;
    }

}