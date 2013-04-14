<hr>
<footer class="footer" role="contentinfo">
    <%-- <p class="right">SS-Bootstrap theme by <a href="http://www.gpmd.co.uk/">GPMD</a> / Powered by <a href="http://silverstripe.org">Silverstripe</a></p> --%>

    <% if $SiteConfig.FooterButtons %>
    <ul class="footer-buttons">
        <% control $SiteConfig.FooterButtons %>
        <li>
            <a href="$Link" title="$Title">$Title</a>
        </li>
        <% end_control %>
    </ul>
    <% end_if %>

    <% if $SiteConfig.FooterLogos %>
    <ul class="footer-logos">
        <% control $SiteConfig.FooterLogos %>
        <li>
            <a href="$Link" title="$Description"><img src="$Image.URL" alt="$Description"></a>
        </li>
        <% end_control %>
    </ul>
    <% end_if %>

    <p><% if $SiteConfig.CompanyName %>&#169; $SiteConfig.CompanyName&#46; <% end_if %><% if $SiteConfig.CompanyAddress %>$SiteConfig.CompanyAddress<% end_if %></p>
    <p><% if $SiteConfig.CompanyTelephone %>Telephone: $SiteConfig.CompanyTelephone<br /><% end_if %>
    <% if $SiteConfig.CompanyEmail %>Email: <a href="mailto:$SiteConfig.CompanyEmail" title="Email Us">$SiteConfig.CompanyEmail</a><% end_if %></p>
    <p><% if $SiteConfig.CompanyNumber %>Company Number: $SiteConfig.CompanyNumber<br /><% end_if %>
    <% if $SiteConfig.CompanyVatNumber %>VAT Number: $SiteConfig.CompanyVatNumber<br /><% end_if %></p>
    
</footer>
