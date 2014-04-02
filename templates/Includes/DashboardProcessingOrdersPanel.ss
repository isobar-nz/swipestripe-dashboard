<div class="dashboard-processing-orders">
    <% if $Orders %>
        <ul>
            <% loop $Orders %>
                <li><a href="$CMSEditLink">#$ID - {$Products.Count} products, {$Total.Nice} ($Status)</a></li>
            <% end_loop %>
        </ul>
    <% else %>
    <p>No orders to process.</p>
    <% end_if %>
</div>