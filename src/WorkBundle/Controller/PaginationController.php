<?php

namespace WorkBundle\Controller;
use WorkBundle\Utility\PageUtility;

use WorkBundle\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Pagination controller class.
 *
 */ 
class PaginationController extends Controller
{
    /**
     * List the elements in a pagination for every page  new view for the applicants.
     *
     * @param request      the request to the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an array of the applicants to the view.
     */ 
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();   
        $var = $this->getParameter('page_default');               
        $pu = new PageUtility($request, $em, 'WorkBundle:Application', $var, 'applied_position');
        return $this->render('WorkBundle:Pagination:list.html.twig',[
            'tasks' => $pu->getRecords(),
            'pager' => $pu->getDisplayParameters(),
        ]);
    }
}