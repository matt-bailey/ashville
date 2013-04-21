<% if WidgetLayoutType == 4 || WidgetLayoutType == 5 %>
<% if FeatureImage %>
<a class="img-link" href="$FeatureLink" title="$FeatureTitle">
    $FeatureImage.CroppedImage(767,497)
</a>
<% end_if %>
<div class="widget-content">
    <% if FeatureTitle %>
    <h4 class="h4"><a href="$FeatureLink" title="$FeatureTitle">$FeatureTitle</a></h4>
    <% end_if %>
<% else %>
<% if FeatureTitle %>
<div class="widget-content">
    <h4 class="h4"><a href="$FeatureLink" title="$FeatureTitle">$FeatureTitle</a></h4>
    <% end_if %>
    <% if FeatureImage %>
    <a class="img-link" href="$FeatureLink" title="$FeatureTitle">
        $FeatureImage.CroppedImage(767,497)
    </a>
    <% end_if %>
<% end_if %>
    <% if FeatureText %>
    $FeatureText
    <% end_if %>
</div>
<div class="widget-actions fix-bottom">
    <% if ButtonText %>
    <a class="btn btn-block" href="$FeatureLink" title="$FeatureTitle">$ButtonText</a>
    <% end_if %>
</div>
