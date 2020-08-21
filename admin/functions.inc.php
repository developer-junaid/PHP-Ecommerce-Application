<?php
    
    // Some functions
    function pr($arr){
        echo '<pre>';
        print_r($arr);
    }

    function prx($arr){
        echo '<pre>';
        print_r($arr);
        die();
    }


    // Get Safe Value 
    function get_safe_value($con, $str){
        if($str != ''){
             $str = trim($str);
             return mysqli_real_escape_string($con, $str);
        }
    }



?>