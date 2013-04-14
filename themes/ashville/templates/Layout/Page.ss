<div class="row">
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
</div>
<div class="row">
    <div class="<% if ClassName = NoSidebarPage %>span12<% else %>span9<% end_if %>">
        <article>
            <div class="page-header">
                <h1>$Title</h1>
            </div>
            <%-- <div class="content">$Content</div> --%>
            <div class="content row">$MainContentWidgetArea</div>
        </article>
        $Form
        $PageComments
    </div>
    <% if ClassName != NoSidebarPage %>
    <% include SideBar %>
    <% end_if %>
</div>