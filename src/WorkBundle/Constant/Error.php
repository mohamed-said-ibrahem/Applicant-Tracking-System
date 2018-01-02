<?php
namespace WorkBundle\Constant;

class Error {
    const INVALID_CAPATCHA= 1;
    const INVALID_RECAPATCHA = 2 ;
    const ERROR_MESSAGES = [
        self::INVALID_CAPATCHA => "CAPTCHA validation failed, try again.",
        self::INVALID_RECAPATCHA => "The reCAPTCHA wasn't entered correctly.
                                               Go back and try it again.",   
    ];
    
}