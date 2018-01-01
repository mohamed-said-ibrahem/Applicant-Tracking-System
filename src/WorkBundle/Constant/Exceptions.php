<?php
namespace WorkBundle\Constant;

class Exceptions {
    const INVALID_CAPATCHA_EXCEPTION = 1;
    const INVALID_RECAPATCHA_EXCEPTION = 2 ;
    const EXCEPTION_MESSAGES = [
        self::INVALID_CAPATCHA_EXCEPTION => "CAPTCHA validation failed, try again.",
        self::INVALID_RECAPATCHA_EXCEPTION => "The reCAPTCHA wasn't entered correctly.
                                               Go back and try it again.",   
    ];
    
}