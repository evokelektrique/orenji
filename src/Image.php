<?php

namespace Orenji;

use Orenji\Convert;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

final class Image {

   private $width;
   private $height;
   private $image;
   private $tile_size;

   public $database;

   public function __construct(string $file_name, array $files, int $tile_size = 50) {
      $this->image = $this->create_image($file_name);
      $this->width = $this->get_image_width($this->image);
      $this->height = $this->get_image_height($this->image);
      $this->tile_size = $this->calculate_tile_size($tile_size);
      $this->database = $this->generate_database($files);
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

   private function calculate_tile_size($size): int {
      return $size;
   }

   private function get_average_colors(string $file_name, int $max_colors = 5): array {
      $palette = Palette::fromFilename($file_name);

      return $palette->getMostUsedColors($max_colors);
   }

   // 1. loop images
   // 2. get colors
   // 3. get distances
   private function generate_database(array $files): array {
      $database = [];

      foreach($files as $file) {
         $colors = [];
         foreach($this->get_average_colors($file) as $color) {
            $hex = Color::fromIntToHex($color);
            $colors[] = Convert::hex_to_rgb($hex);
            $database[$file] = $colors;
         }
      }

      return $database;
   }

}
