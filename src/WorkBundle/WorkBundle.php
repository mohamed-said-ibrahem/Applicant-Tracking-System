<?php

namespace WorkBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WorkBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
