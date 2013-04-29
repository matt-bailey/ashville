<div class="row">
    <div class="span9">
        <% if Slides %>
        <% include Slideshow %>
        <% end_if %>
    </div>
    <div class="span3">
        <% if Slides %>
        <% if $SiteConfig.ServicesSlides %>
        <% include ServicesCarousel %>
        <% end_if %>
        <% end_if %>
    </div>
</div>
<div class="row">
    <div class="<% if ClassName = NoSidebarPage %>span12<% else %>span9<% end_if %>">
        <article>
            <header class="page-header">
                <h1>$Title</h1>
            </header>
            <%-- <section class="content">$Content</section> --%>
            <section class="content row">$MainContentWidgetArea</section>
        </article>
        $Form
        $PageComments
    </div>
    <% if ClassName != NoSidebarPage %>
    <% include SideBar %>
    <% end_if %>
</div>