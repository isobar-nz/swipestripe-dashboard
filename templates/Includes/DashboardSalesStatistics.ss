<div class="dashboard-sale-statistics">
    <p>Sales information</p>
    <ol>
        <li><strong>$OrderCount</strong> orders</li>
        <li><strong>$$TotalSalesValue</strong> sales</li>
        <li><strong>$NumberOfProductsSold</strong> products sold</li>
    </ol>
    <br />
    <p>Most Popular Products:</p>
    <ol>
        <% loop $PopularProducts %>
            <li><a href="$CMSEditLink">$Title</a> ($Sold sold)</li>
        <% end_loop %>
    </ol>
</div>