<div align="center">
  <h3>🍊 Orenji - オレンジ</h3>
  <span>(Under development)</span>
</div>

### Public API
```php
use Orenji\Convert;
use Orenji\Utils;

// Convert Hex colors to RGB
$convert = new Convert();
$black = $convert::hex_to_rgb("#000000");
$grey = $convert::hex_to_rgb("#808080");
$grey_dark = $convert::hex_to_rgb("#0a0a0a");

// Find the distance between colors, 
// Smaller numbers means more similarity.
$black_grey_distance = Utils::distance($black, $grey); // => 192.33...
$black_grey_distance = Utils::distance($black, $grey_dark); // => 170
```
