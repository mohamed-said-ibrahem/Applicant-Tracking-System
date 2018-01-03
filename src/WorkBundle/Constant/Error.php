<?php
namespace WorkBundle\Constant;

class Error {
    const INVALID_CAPATCHA= 1;
    const INVALID_RECAPATCHA = 2 ;
    const ERROR_MESSAGES = [
        self::INVALID_CAPATCHA => "PLEASE ENTER THE CAPTCHA AGAIN.",
        self::INVALID_RECAPATCHA => "PLEASE ENTER THE reCAPTCHA AGAIN.",   
    ];
    
}