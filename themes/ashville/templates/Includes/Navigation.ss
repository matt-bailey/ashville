<div class="container">
    <nav role="navigation">
        <a class="brand" href="$BaseHref" rel="home">$SiteConfig.Title</a>
        <ul>
            <% loop $Menu(1) %>
            <li class="$LinkingMode<% if FirstLast %> $FirstLast<% end_if %>">
                <a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
                <% if Children %>
                <ul class="submenu $Title.StringToKey">
                    <% loop Children %>
                    <li class="$LinkingMode<% if FirstLast %> $FirstLast<% end_if %>">
                        <a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
                    </li>
                    <% end_loop %>
                </ul>
                <% end_if %>
            </li>
            <% end_loop %>
        </ul>
        <% if $SearchForm %>
        $SearchForm
        <% end_if %>
    </nav>
</div>
