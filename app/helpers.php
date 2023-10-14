<?php

if (!function_exists('user_email')){
    function user_email(){
        $user = Auth::user();
        return $user->email;
    }
}

?>  