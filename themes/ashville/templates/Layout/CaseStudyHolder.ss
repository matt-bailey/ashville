<div class="row">
    <div class="span9">
        <% if SlideItems %>
        <% include Slideshow %>
        <% end_if %>
    </div>
    <div class="span3">
        <% if SlideItems %>
        <% if $SiteConfig.ServicesSlides %>
        <% include ServicesCarousel %>
        <% end_if %>
        <% end_if %>
    </div>
</div>
<div class="row">
    <div class="span9">
        <article>
            <header class="page-header">
                <h1>$Title</h1>
            </header>
            <section class="content">$Content</section>
        </article>
        <% loop Children %>
        <% include CaseStudyTeaser %>
        <% end_loop %>
        $Form
        $PageComments
    </div>
    <% include SideBar %>
</div>