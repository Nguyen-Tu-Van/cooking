<?php
    if (!function_exists('open_icon')) {
        function open_icon($name)
        {
            return (Session::get('open')==$name)? 'nav-item-open' : '';
        }
    }
    if (!function_exists('open')) {
        function open($name)
        {
            return (Session::get('open')==$name)? 'style=display:block' : '';
        }
    }

    if (!function_exists('active')) {
        function active($name)
        {
            return (Session::get('active')==$name)? 'active' : '';
        }
    }
    
    // if (!function_exists('menu')) {
    //     function menu($open, $active)
    //     {
    //         Session::put('open', $open);
    //         Session::put('active', $active);
    //     }
    // }
?>