<?php

namespace Orenji;

/**
 * Helpers class
 */
final class Utils {

   /**
    * Get the distance from two colors
    *
    * @param  array $first_color   RGB color
    * @param  array $second_color  RGB color
    * @return float                Distance
    */
   public static function distance(array $first_color, array $second_color): float {
      $array = [];
      for ($i = 0; $i < 3; $i++) {
         $array[] = ($first_color[$i] - $second_color[$i]) ** 2;
      }

      return sqrt(array_sum( $array ));
   }
}
