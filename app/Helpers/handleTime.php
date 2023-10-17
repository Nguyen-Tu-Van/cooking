<?php
    use Carbon\Carbon;

    // Định dạng thời gian. Từ 2022-11-20 -> 20-11-2022
    if (!function_exists('format_date')) {
        function format_date($date)
        {
            try{
                $param = explode("-",$date);
                return $param[2]."/".$param[1]."/".$param[0];
            }catch(Exception $e)
            {
                if($date == null) return "_ /_ /_";
                return "Date not format";
            }
        }
    }

    // Định dạng thời gian. Từ 2022-11-20 -> 11-20-2022
    if (!function_exists('format_date2')) {
        function format_date2($date)
        {
            try{
                $param = explode("-",$date);
                return $param[1]."/".$param[2]."/".$param[0];
            }catch(Exception $e)
            {
                if($date == null) return "_ /_ /_";
                return "Date not format";
            }
        }
    }

    // Định dạng thời gian. Từ 2022-11-10 17:30:00 -> 17:30:00 10/11/2022
    if (!function_exists('format_time')) {
        function format_time($time)
        {
            try{
                $param = explode(" ",$time);
                $param2 = explode("-",$param[0]);
                return $param[1]." _ ".$param2[2]."/".$param2[1]."/".$param2[0];
            }catch(Exception $e)
            {
                return "Time not format";
            }
        }
    }

    // Định dạng thời gian. Từ 2023-04-04T15:14:04.000000Z -> 15:14:04 04/04/2023 (H:i:s Y/m/d)
    if (!function_exists('format_time_zone')) {
        function format_time_zone($time)
        {
            try{
                return Carbon::parse($time)->setTimezone('Asia/Ho_Chi_Minh')->format('H:i:s _ Y/m/d');
            }catch(Exception $e)
            {
                return "Time not format";
            }
        }
    }

    // Định dạng thời gian. Trả về array 2 phần tử gồm giờ và ngày. Từ 2022-11-10 17:30:00 -> ['17:30:00','10-11-2022']
    if (!function_exists('format_time_array')) {
        function format_time_array($time)
        {
            try{
                $param = explode(" ",$time);
                $param2 = explode("-",$param[0]);
                return [$param[1],$param2[2]."-".$param2[1]."-".$param2[0]];
            }catch(Exception $e)
            {
                return "Time not format";
            }
        }
    }

    // Xác định thời gian hiện tại so với khoảng thời gian A đến B. 1:nằm trong khoảng AB, 2: nằm trước A, 3: nằm sau B
    if (!function_exists('check_date')) {
        function check_date($first,$last)
        {
            if($first == null || $last == null) return 1;
            $now =Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            if($now >= $first && $now <= $last) return 1;
            else if($now <= $first && $now <= $last) return 2;
            else return 3;
        }
    }

    // Xác định thời gian hiện tại so với khoảng thời gian A đến B. 1:nằm trong khoảng AB, 2: nằm trước A, 3: nằm sau B
    if (!function_exists('check_time')) {
        function check_time($first,$last)
        {
            $now = date(strtotime(Carbon::now('Asia/Ho_Chi_Minh')));
            $first = date(strtotime($first));
            $last = date(strtotime($last));
            if($now >= $first && $now <= $last) return 1;
            else if($now <= $first && $now <= $last) return 2;
            else return 3;
        }
    }

    if (!function_exists('convert_date')) {
            function convert_date($timestamp)
            {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y-m-d H:i:s');

                echo $formattedDate;
            }
        }
    if (!function_exists('convert_date_2')) {
        function convert_date_2($timestamp)
        {
            if($timestamp == "")
            {
                echo "";
                return ;
            }
            try {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y-m-d');
    
                echo $formattedDate;
            } catch (\Throwable $th) {
                try {
                    $timestamp = strtotime(str_replace('/', '-', $timestamp));
                    $output_date = date('Y-m-d', $timestamp);
                    echo $output_date;
                } catch (\Throwable $th) {
                    echo $timestamp;
                }
            }
        }
    }
    if (!function_exists('convert_date_3')) {
        function convert_date_3($timestamp)
        {
            if($timestamp == "")
            {
                return "";
            }
            try {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y-m-d');
    
                return $formattedDate;
            } catch (\Throwable $th) {
                try {
                    $timestamp = strtotime(str_replace('/', '-', $timestamp));
                    $output_date = date('Y-m-d', $timestamp);
                    return $output_date;
                } catch (\Throwable $th) {
                    return $timestamp;
                }
            }
        }
    }
    if (!function_exists('convert_date_3')) {
        function convert_date_3($timestamp)
        {
            if($timestamp == "")
            {
                return "";
            }
            try {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y-m-d');
    
                return $formattedDate;
            } catch (\Throwable $th) {
                try {
                    $timestamp = strtotime(str_replace('/', '-', $timestamp));
                    $output_date = date('Y-m-d', $timestamp);
                    return $output_date;
                } catch (\Throwable $th) {
                    return $timestamp;
                }
            }
        }
    }
    if (!function_exists('convert_date_3_month')) {
        function convert_date_3_month($timestamp)
        {
            if($timestamp == "")
            {
                return "";
            }
            try {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y-m');
    
                return $formattedDate;
            } catch (\Throwable $th) {
                try {
                    $timestamp = strtotime(str_replace('/', '-', $timestamp));
                    $output_date = date('Y-m', $timestamp);
                    return $output_date;
                } catch (\Throwable $th) {
                    return $timestamp;
                }
            }
        }
    }
    if (!function_exists('convert_date_3_year')) {
        function convert_date_3_year($timestamp)
        {
            if($timestamp == "")
            {
                return "";
            }
            try {
                $date = new DateTime($timestamp);

                // Format the DateTime object as required
                $formattedDate = $date->format('Y');
    
                return $formattedDate;
            } catch (\Throwable $th) {
                try {
                    $timestamp = strtotime(str_replace('/', '-', $timestamp));
                    $output_date = date('Y', $timestamp);
                    return $output_date;
                } catch (\Throwable $th) {
                    return $timestamp;
                }
            }
        }
    }
    //
    // if (!function_exists('check_date')) {
    //     function check_date($first,$last)
    //     {
    //         $now = date(strtotime(Carbon::now('Asia/Ho_Chi_Minh')));
    //         $first = date(strtotime($first));
    //         $last = date(strtotime($last));
    //         if($now >= $first && $now <= $last) return true;
    //         else return false;
    //     }
    // }
?>