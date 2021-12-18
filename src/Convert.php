<?php

namespace Orenji;

/**
 * Color converter class
 */
final class Convert {

   /**
    * Convert Hex color to RGB
    *
    * @param  string $hex   Hex color
    * @param  string $alpha Alpha
    * @return array         Array of converted RGB color
    */
   public static function hex_to_rgb(string $hex, int $alpha = 255): array {
      // Magic
      list($r,$g,$b) = sscanf('#'.implode('',array_map('str_repeat',str_split(str_replace('#','',$hex)), [2,2,2])), "#%02x%02x%02x");
      $rgb = [];
      $rgb[] = $r;
      $rgb[] = $g;
      $rgb[] = $b;
      $rgb[] = $alpha;

      return $rgb;
   }
}
