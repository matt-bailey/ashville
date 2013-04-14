<div class="span9">
    <% if SlideItems %>
    <% include Slideshow %>
    <% end_if %>
</div>
<div class="span3">
    <% if $SiteConfig.ServicesSlides %>
    <% include ServicesCarousel %>
    <% end_if %>
</div>
<div class="span12">
    <article>
        <div class="page-header">
            <h1>$Title</h1>
        </div>
        <%-- <div class="content">$Content</div> --%>
        <div class="content">$MainContentWidgetArea</div>
    </article>
    $Form
    $PageComments
</div>