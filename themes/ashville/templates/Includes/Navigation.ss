<style>
<% if SiteConfig.MenuCallouts %>
<% loop SiteConfig.MenuCallouts %>
nav .$MenuItem { width: 440px !important; }
nav .$MenuItem .link,
nav .$MenuItem .current { width: 50%; }
nav .$MenuItem .submenu-bg {
    background-image: url('$Image.URL');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
<% end_loop %>
<% end_if %>
</style>
<div class="mega-menu">
    <nav class="container" role="navigation">
        <ul class="navigation">
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
                    <div class="submenu-bg"></div>
                </ul>
                <% end_if %>
            </li>
            <% end_loop %>
            <% if $SearchForm %>
            <li class="nav-search pull-right span3">
                $SearchForm
            </li>
            <% end_if %>
        </ul>
    </nav>
</div>
