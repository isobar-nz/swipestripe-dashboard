<?php

class DashboardOrderExtension extends DataExtension
{

    public function getCMSEditLink()
    {
        return 'admin/shop/Order/EditForm/field/Order/item/' . $this->owner->ID . '/edit';
    }

}