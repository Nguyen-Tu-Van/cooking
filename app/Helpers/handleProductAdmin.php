<?php

    // trả về imgae đầu tiên. Input: imgae1,imgae2 => Output: image1
    if (!function_exists('image_product')) {
        function image_product($path)
        {
            return explode(',',$path)[0];
        }
    }

    // trả về list feature unique không rỗng
    if (!function_exists('feature')) {
        function feature($product,$feature)
        {
            return $product->product_details->pluck($feature)->unique()->reject(function ($value, $key) {
                return $value === '';
            });
        }
    }

    if (!function_exists('feature_version')) {
        function feature_version($f1,$f2,$f3)
        {
            if(empty($f1))
            {
                if(empty($f2))
                {
                    return $f3;
                }
                else
                {
                    if(empty($f3))
                    {
                        return $f2;
                    }
                    return $f2.' ♦ '.$f3;
                }
            }
            else
            {
                if(empty($f2))
                {
                    if(empty($f3))
                    {
                        return $f1;
                    }
                    return $f1.' ♦ '.$f3;
                }
                else
                {
                    if(empty($f3))
                    {
                        return $f1.' ♦ '.$f2;
                    }
                    return $f1.' ♦ '.$f2.' ♦ '.$f3;
                }
            }
        }
    }

    if (!function_exists('feature_version2')) {
        function feature_version2($f1,$f2,$f3)
        {
            if(empty($f1)) $f1 = '___';
            if(empty($f2)) $f2 = '___';
            if(empty($f3)) $f3 = '___';

            return $f1.' ♦ '.$f2.' ♦ '.$f3;
        }
    }

?>