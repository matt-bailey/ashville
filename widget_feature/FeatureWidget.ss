<% if FeatureTitle %>
<h4><a href="$FeatureLink" title="$FeatureTitle">$FeatureTitle</a></h4>
<% end_if %>
<% if FeatureImage %>
<a href="$FeatureLink" title="$FeatureTitle">
    $FeatureImage.CroppedImage(767,497)
</a>
<% end_if %>
<% if FeatureText %>
<p>$FeatureText</p>
<% end_if %>
<% if ButtonText %>
<a href="$FeatureLink" title="$FeatureTitle">$ButtonText</a>
<% end_if %>
