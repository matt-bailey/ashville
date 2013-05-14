<?php

class BetterImage extends WatermarkImage {

  // by overriding this, you can define whether to automatically add the watermark or not
  // (this can also be controlled in templates for every single image)
  protected $addWatermark = true;

  /**
   * @return Image
   */
  public function getWatermark() {
    // in this example we assume has an image named "Watermark"
    $siteConfig = SiteConfig::current_site_config();
    if ($siteConfig->Watermark()) {
      return $siteConfig->Watermark();
    }
    return null;
  }

  /**
     * @return int
     */
  public function getWatermarkPosition() {
    // return the position at which the watermark should appear on the image
    // can be 1 to 9 (representing the positions on your number pad)
    return 3; // bottom right
  }

    /**
     * @return int
     */
  public function getWatermarkTransparency() {
    // return the transparency of the watermark
    // can be 0 to 100 (0 = fully transparent, 100 = no transparency)
    return 90;
  }

}