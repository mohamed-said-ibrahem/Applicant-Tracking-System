<?php

namespace WorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function indexAction()
    {
    $em = $this->getDoctrine()->getManager();
    $applicantRepo = $em->getRepository('WorkBundle:Application');
//    dump(get_class_methods($applicantRepo));die;
//    dump($applicantRepo->findApplicantByUsernameOrEmail('mohamed'));die;
//    dump($applicantRepo->findApplicantByPosition('php'));die;
    
    
    }
}
