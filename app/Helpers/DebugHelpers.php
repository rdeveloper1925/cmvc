<?php
/*Contains all the debug functions
 */
namespace App\Helpers;

class DebugHelpers{
    public static function see_array($array){
        print_r($array,true);
    }
}