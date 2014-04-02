<?php

class DashboardRecentOrdersPanel extends DashboardPanel
{

    static $icon = "swipestripe-dashboard/images/dashboard-recent-orders.png";

    public function getLabel() {
        return 'Recent Orders';
    }

    public function getDescription() {
        return 'Shows orders from the last three days.';
    }

    public function getConfiguration() {
        $fields = parent::getConfiguration();

        return $fields;
    }

    public function Orders() {
        $orders = Order::get()->sort("Created DESC"
        );
        return $orders;
    }

}