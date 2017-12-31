<?php
namespace WorkBundle\Exception;
use WorkBundle\Constant\Exceptions;

class WorkBundleException extends \Exception
{
    public function __construct(int $code = 0) {
      parent::__construct(Exceptions::EXCEPTION_MESSAGES[$code], $code);
    }
}