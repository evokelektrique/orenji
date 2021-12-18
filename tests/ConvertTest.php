<?php

use PHPUnit\Framework\TestCase;
use Orenji\Convert;

final class ConvertTest extends TestCase {
   private $convert;
   private $colors;

   public function setUp(): void {
      $this->convert = new Convert();
      $this->colors = [
         "black" => "#000000"
      ];
   }

   public function test_hex_to_rgb(): void {
      $converted = $this->convert::hex_to_rgb($this->colors["black"]);
      $this->assertIsArray($converted, "Not an array");
   }
}
