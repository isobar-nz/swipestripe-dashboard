<div class="dashboard-recent-orders">
    <% if $Orders %>
        <ul>
            <% loop $Orders %>
                <li><a href="$CMSEditLink">#$ID - {$Products.Count} products, {$Total.Nice} ($Status)</a></li>
            <% end_loop %>
        </ul>
    <% else %>
        <p>No recent orders to display.</p>
    <% end_if %>
</div>