<?php

namespace App\Custom;

class Price {

    public static function formatPrice($value) {

        return number_format($value, 2, "," , ".") . "€";
    }

}