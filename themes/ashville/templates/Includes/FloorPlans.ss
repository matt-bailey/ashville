<% loop FloorPlans %>
<section class="media media-floorplan">
    <% if Title %>
    <h2 class="media-heading visible-phone">$Title</h2>
    <% end_if %>
    <% if Image %>
    <div class="media-object">
        <img src="$Image.SetWidth(767).URL" alt="$Title" usemap="#$TitleKey">
    </div>
    <% end_if %>
    <div class="media-body">
        <% if Title %>
        <h2 class="media-heading hidden-phone">$Title</h2>
        <% end_if %>
        <% if Description %>
        $Description
        <% end_if %>
    </div>
    <map name="$TitleKey">
        <% loop FloorPlanAreas %>
        <area shape="rect" coords="$X1,$Y1,$X2,$Y2" href="#" title="$Title" class="js-cs-area fancybox fancybox.image" data-fancybox-group="fancybox-$ID">
        <% end_loop %>
    </map>
</section>
<% end_loop %>
<div class="hidden">
    <% loop FloorPlanAreaImages %>
    <a href="$Image.SetRatioSize(1280,1024).URL" title="$Description" class="js-cs-imgurl fancybox fancybox.image" data-fancybox-group="fancybox-$LinkedFloorPlanArea"></a>
    <% end_loop %>
</div>
