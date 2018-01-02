<?php
namespace WorkBundle\Exception;
use WorkBundle\Constant\Error;

class WorkBundleError extends \Exception
{
    public function __construct(int $code = 0) {
      parent::__construct(Error::ERROR_MESSAGES[$code], $code);
    }
}