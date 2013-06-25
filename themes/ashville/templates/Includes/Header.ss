<header class="header" role="banner">
    <% if $SiteConfig.HeaderLinks %>
    <ul class="container secondary-links">
        <% control $SiteConfig.HeaderLinks %>
        <li>
            <a href="$Link" title="$Title">$Title</a>
        </li>
        <% end_control %>
    </ul>
    <% end_if %>
    <div class="siteinfo-container">
        <div class="container">
            <div class="brand pull-left">
                <div class="brand-icon pull-left"><a class="brand-link" href="$BaseHref" rel="home" title="$SiteConfig.Title"></a></div>
                <% if URLSegment = home %><h1 class="brand-text"><% else %><div class="brand-text"><% end_if %>
                    <a class="brand-link" href="$BaseHref" rel="home" title="$SiteConfig.Title">$SiteConfig.Title</a>
                <% if URLSegment = home %></h1><% else %></div><% end_if %>
                <% if $SiteConfig.Tagline %>
                <div class="tagline">$SiteConfig.Tagline</div>
                <% end_if %>
            </div>
            <div class="co-info pull-right">
                <% if $SiteConfig.CompanyTelephone %>
                <div class="phone-number">$SiteConfig.CompanyTelephone</div>
                <% end_if %>
                <% if $SiteConfig.HeaderSocialLinks %>
                <ul class="social-links">
                    <% control $SiteConfig.HeaderSocialLinks %>
                    <li>
                        <% if $Image %>
                        <a href="$URL" title="$Description"><img src="$Image.URL" alt="$Description"></a>
                        <% else %>
                        <a class="ss-icon<% if $IconType %> <% if $IconType == "Regular" %>ss-social<% else %>ss-social-$IconType.LowerCase<% end_if %><% end_if %>"<% if $IconColour%> style="color: #$IconColour"<% end_if %> href="$URL" title="$Description">$IconKeyword</a>
                        <% end_if %>
                    </li>
                    <% end_control %>
                    <% if $SiteConfig.CompanyAddress %>
                    <li class="address"><strong>$SiteConfig.CompanyAddress</strong></li>
                    <% end_if %>
                </ul>
                <% end_if %>
            </div>
            <a class="mini-menu-btn visible-phone ss-icon ss-rows" href="#"></a>
        </div>
    </div>
</header>
