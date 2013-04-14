<header class="header" role="banner">
    <% if $SiteConfig.HeaderLinks %>
    <div class="secondary-links">
        <% control $SiteConfig.HeaderLinks %>
        <a href="$Link" title="$Title">$Title</a>
        <% if not Last %><span class="divider">|</span><% end_if %>
        <% end_control %>
    </div>
    <% end_if %>
    <% if $SiteConfig.CompanyTelephone %>
        <div class="phone-number">$SiteConfig.CompanyTelephone</div>
    <% end_if %>
    <% if $SiteConfig.CompanyEmail %>
        <div class="email"><a href="mailto:$SiteConfig.CompanyEmail" title="Email $SiteConfig.CompanyName">$SiteConfig.CompanyEmail</a></div>
    <% end_if %>

    <% if $SiteConfig.HeaderSocialLinks %>
    <ul>
        <% control $SiteConfig.HeaderSocialLinks %>
        <li>
            <% if $Image %>
            <a href="$URL" title="$Description"><img src="$Image.URL" alt="$Description"></a>
            <% else %>
            <a class="ss-icon<% if $IconType %> <% if $IconType == "Regular" %>ss-social<% else %>ss-social-$IconType.LowerCase<% end_if %><% end_if %>"<% if $IconColour%> style="color: #$IconColour"<% end_if %> href="$URL" title="$Description">$IconKeyword</a>
            <% end_if %>
        </li>
        <% end_control %>
    </ul>
    <% end_if %>

</header>
