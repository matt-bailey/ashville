<div id="hero-slideshow" class="carousel carousel-buttons">
    <div class="carousel-inner">
        <% loop SlideItems %>
        <article class="item<% if First %> active<% end_if %>">
            <% if Image %>
            <a href="$Link" title="$Title">
                $Image.CroppedImage(870,470)
            </a>
            <% end_if %>
            <div class="carousel-caption<% if SlideCaptionPosition %> position-$SlideCaptionPosition<% end_if %>">
                <% if Title %>
                <h4><a href="$Link" title="$Title">$Title</a></h4>
                <% end_if %>
                <% if Caption %>
                <p>$Caption</p>
                <% end_if %>
            </div>
        </article>
        <% end_loop %>
    </div>
    <%-- @todo Allow multiple slideshows per page --%>
	<a class="carousel-control left" href="#hero-slideshow" data-slide="prev"><i class="icon-caret-left"></i></a>
	<a class="carousel-control right" href="#hero-slideshow" data-slide="next"><i class="icon-caret-right"></i></a>
</div>
