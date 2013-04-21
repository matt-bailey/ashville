<div id="services-slideshow" class="carousel<% if ServicesSlidesPosition %> position-$ServicesSlidesPosition<% end_if %>">
    <div class="carousel-inner">
        <% loop $SiteConfig.ServicesSlides %>
        <article class="item<% if First %> active<% end_if %>">
            <a href="$Link" title="$Title">
                $Image.CroppedImage(100,100)
            </a>
            <div class="carousel-caption">
                <h4><a href="$Link" title="$Title">$Title</a></h4>
            </div>
        </article>
        <% end_loop %>
    </div>
    <%-- @todo Allow multiple slideshows per page --%>
	<a class="carousel-control left" href="#services-slideshow" data-slide="prev"><i class="icon-caret-left"></i></a>
	<a class="carousel-control right" href="#services-slideshow" data-slide="next"><i class="icon-caret-right"></i></a>
</div>
