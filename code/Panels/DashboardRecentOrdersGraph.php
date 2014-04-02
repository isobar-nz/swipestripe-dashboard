<?php

class DashboardRecentOrdersGraph extends DashboardPanel
{

    static $icon = "swipestripe-dashboard/images/dashboard-order-graph.png";

    public function getLabel()
    {
        return 'Order History';
    }

    public function getDescription()
    {
        return 'Graphs orders';
    }

    public function getConfiguration()
    {
        $fields = parent::getConfiguration();

        return $fields;
    }

    public function PanelHolder()
    {
        Requirements::css("swipestripe-dashboard/css/recent-orders.css");
        return parent::PanelHolder();
    }

    public function Chart()
    {
        $chart = DashboardChart::create("Order history", "Date", "Number of orders");
        $result = DB::query(
            <<<EOT
            SELECT COUNT(*) AS OrderCount, DATE_FORMAT(Created,'%d %b %Y') AS OrderDate FROM "Order" WHERE "Status" !='Cart' GROUP BY OrderDate
EOT
        );
        if ($result) {
            while ($row = $result->nextRecord()) {
                $chart->addData($row['OrderDate'], $row['OrderCount']);
            }
        }
        return $chart;
    }
}