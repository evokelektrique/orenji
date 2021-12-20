<?php

namespace Orenji;

final class Image {

   private $width;
   private $height;
   private $image;

   public function __construct(string $file_name) {
      $this->image = $this->create_image($file_name);
      $this->width = $this->get_image_width($this->image);
      $this->height = $this->get_image_height($this->image);
   }

   private function create_image($file_name) {
      return imagecreatefromjpeg($file_name);
   }

   private function get_image_width($image): int {
      if(!is_resource($image)) {
         return false;
      }

      return imagesx($image);
   }

   private function get_image_height($image): int {
      if(!is_resource($image)) {
         return false;
      }

      return imagesy($image);
   }

}
