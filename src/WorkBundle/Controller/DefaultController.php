<?php

namespace WorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default controller class.
 *
 */ 
class DefaultController extends Controller
{
    /**
     * Shows the Applications Main page.
     *      
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said
     * 
     * returns a view for the main application page.
     */ 
    public function indexAction()
    {
        return $this->render('WorkBundle:Default:index.html.twig');
    }

    /**
     * Shows a thank_you page after the user submited the application.
     *      
     * @throws Some_Exception_Class  there is not exeptions.
     * @author Mohamed Said
     * 
     * returns a view for a thank_you page.
     */ 
    public function thankAction()
    {
        return $this->render('WorkBundle:Default:thank.html.twig');
    } 
}
