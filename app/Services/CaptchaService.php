<?php
/**
 * Created by PhpStorm.
 * User: me
 * Date: 24.06.17
 * Time: 01:02
 */
namespace TaskManager\Services;
class CaptchaService{

    public static function GenerateCode($start = "1000", $end="99999"){
        $code = random_int($start, $end);
        session()->put('code', $code);
       // dd(session()->get('code'));
        return $code;
}

    public function flushCode(){
        session()->forget('code');
    }

}