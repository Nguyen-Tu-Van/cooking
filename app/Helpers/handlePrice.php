<?php

use App\Model\Product;
use Carbon\Carbon;
    use App\Model\ProductDetail;

    // Xác định giá có đc KM hay không?. 1:nằm trong khoảng min-max, 2: dưới max, 3: trên min
    if (!function_exists('check_price')) {
        function check_price($min,$max,$value)
        {
            if($min == 0 && $max == 0) return 1;
            else if($min != 0 && $max == 0) return 1;

            if($value >= $min && $value <= $max) return 1;
            else if($value <= $min && $value <= $max) return 2;
            else return 3;
        }
    }

    // Xác định giá có đc KM hay không?. 1:nằm trong khoảng min-max, 2: dưới max, 3: trên min
    if (!function_exists('math_price')) {
        function math_price($unit,$value,$price)
        {
            if($unit == 2) $price = $price - $price*$value/100;
            else  $price = $price - $value;
            return $price;
        }
    }

    if (!function_exists('getPricePromotion')) {
        function getPricePromotion($id)
        {
            $product_details = ProductDetail::find($id);
            $price = $product_details->price;
            $promotion = $product_details->promotion;
            if(!empty($promotion) && check_date($promotion->first_date,$promotion->last_date) == 1 && check_price($promotion->price_min,$promotion->price_max,$price) == 1) {
                return math_price($promotion->unit,$promotion->value,$price);
            }
            return $price;
        }
    }

    if (!function_exists('getPriceProduct')) {
        function getPriceProduct($id)
        {
            $product = Product::find($id);
            $product_details = $product->product_details;
            $price = 0;$min=1000000000;$max=0;
            foreach($product_details as $item)
            {
                $price = getPricePromotion($item->id);
                if($price < $min) $min = $price;
                if($price > $max) $max = $price;
            }
            if($min==1000000000) $min=0;
            return [$min,$max];
        }
    }

    if (!function_exists('getStringNotEnd')) {
        function getStringNotEnd($inputString)
        {
            $wordsArray = explode(' ', $inputString);
            array_pop($wordsArray); // Loại bỏ chữ cuối cùng
            $output = implode(' ', $wordsArray);

            return trim($output);
        }
    }
?>