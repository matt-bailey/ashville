<footer class="footer" role="contentinfo">
    <div class="container">
        <% if $SiteConfig.FooterButtons %>
        <ul class="footer-buttons pull-left">
            <% control $SiteConfig.FooterButtons %>
            <li>
                <a class="btn btn-large ss-navigateright right" href="$Link" title="$Title">$Title</a>
            </li>
            <% end_control %>
        </ul>
        <% end_if %>
        <% if $SiteConfig.FooterLogos %>
        <ul class="footer-logos pull-right">
            <% control $SiteConfig.FooterLogos %>
            <li>
                <a href="$Link" title="$Description"><img src="$Image.URL" alt="$Description"></a>
            </li>
            <% end_control %>
        </ul>
        <% end_if %>
    </div>
    <div class="container">
        <div class="vcard">
            <p class="adr"><% if $SiteConfig.CompanyName %>&#169; <span class="fn"><a class="url" href="$BaseHref" title="$SiteConfig.CompanyName" rel="home">$SiteConfig.CompanyName</a></span>&#46; <% end_if %><% if $SiteConfig.CompanyAddress %><span class="address">$SiteConfig.CompanyAddress</span><% end_if %></p>
            <p><% if $SiteConfig.CompanyTelephone %><strong>Telephone:</strong> <span class="tel">$SiteConfig.CompanyTelephone</span><br /><% end_if %>
            <% if $SiteConfig.CompanyEmail %><strong>Email:</strong> <span class="email"><a href="mailto:$SiteConfig.CompanyEmail" title="Email Us">$SiteConfig.CompanyEmail</a></span><% end_if %></p>
            <p><% if $SiteConfig.CompanyNumber %>Company Number: $SiteConfig.CompanyNumber<br /><% end_if %>
            <% if $SiteConfig.CompanyVatNumber %>VAT Number: $SiteConfig.CompanyVatNumber<br /><% end_if %></p>
        </div>
    </div>
</footer>
