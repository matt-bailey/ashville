<article class="media media-cs-teaser">
    <% if Title %>
    <h2 class="media-heading visible-phone">
        <a href="$Link" title="Read More about $Title">$Title</a>
    </h2>
    <% end_if %>
    <% loop Slides %>
    <% if Image %>
    <% if First %>
    <section class="media-object">
        <a href="$Top.Link" title="Read More about $Title">
            <img src="$Image.SetWidth(767).URL" alt="$Title">
        </a>
    </section>
    <% end_if %>
    <% end_if %>
    <% end_loop %>
    <section class="media-body">
        <h2 class="media-heading hidden-phone">
            <a href="$Link" title="Read More about $Title">$Title</a>
        </h2>
        <p>$Content.FirstParagraph</p>
        <a class="btn btn-block" href="$Link" title="Read More about $Title">Read More</a>
    </section>
</article>
