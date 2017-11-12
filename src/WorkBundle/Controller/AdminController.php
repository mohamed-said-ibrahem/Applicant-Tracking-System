<?php

namespace WorkBundle\Controller;
use WorkBundle\Utility\PageUtility;

use WorkBundle\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AdminController extends Controller
{
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $pu = new PageUtility($request, $em, 'WorkBundle:Application', 2, 'id');
        return $this->render('WorkBundle:Admin:list.html.twig',[
            'tasks' => $pu->getRecords(),
            'pager' => $pu->getDisplayParameters(),
        ]);
    }

}
