<?php

namespace WorkBundle\Controller;

use WorkBundle\Entity\Application;
use WorkBundle\Entity\Education;
use WorkBundle\Entity\Blacklist;
use WorkBundle\Repository\BlacklistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorkBundle\Service\ApplicationService;
use WorkBundle\Utility\PageUtility;
use Symfony\Component\HttpFoundation\Response;


/**
 * Application controller class.
 *
 */ 
class ApplicationController extends Controller
{
    /**
     * Creates new view for the applicants.
     *
     * @param request      the request to the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an array of the applicants to the view.
     */ 
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $var = $this->getParameter('page');               
        $pu = new PageUtility($request, $em, 'WorkBundle:Application', $var, 'id');
        return $this->render('application/index.html.twig',[
               'applications' => $pu->getRecords(),
               'pager' => $pu->getDisplayParameters(),
        ]);
    }
    
    /**
     * Creates a new application entity.
     *
     * @param request      the request to the action  .
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a redirection to applicat_done Route.
     */ 
    public function newAction(Request $request)
    {
           $exception =null;
        try {
           $application = new Application();        
           $form = $this->createForm('WorkBundle\Form\ApplicationType', $application);
           $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($application);
           $em->flush();
          return $this->redirectToRoute('applicat_done');
           }
        }
        catch(\Doctrine\ORM\ORMException $e) {
            $exception = $e;
         } 
        catch(\Exception $e) {
            $exception = $e;
         }
          return $this->render('application/new.html.twig', array(
            'application' => $application,
            'form' => $form->createView(),
            'error' => $exception,
             ));
    }

    /**
     * Finds and displays a application entity.
     *
     * @param application  an object of the aplication type        .
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for the applicant.
     */ 
    public function showAction(Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);

        return $this->render('application/show.html.twig', array(
            'application' => $application,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing application entity.
     *
     * @param request      the request for the action
     * @param application  an object of the aplication type
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for the applicant edit page.
     */ 
    public function editAction(Request $request, Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);
        $editForm = $this->createForm('WorkBundle\Form\ApplicationTypeAdmin', $application);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('applicat_edit', array('id' => $application->getId()));
         }

        return $this->render('application/edit.html.twig', array(
            'application' => $application,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a successful submition page.
     *
     * @param request      the request for the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for the Submitted page.
     */ 
    public function submittedAction(Request $request)
    {
        return $this->render('WorkBundle:Default:Submitted.html.twig');
    }

    /**
     * Deletes a application entity.
     *
     * @param request      the request for the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for all the applicants page.
     */ 
    public function deleteAction(Request $request, Application $application)
    {
        $form = $this->createDeleteForm($application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($application);
            $em->flush();
         }
        
        return $this->redirectToRoute('applicat_index');
    }

    /**
     * Creates a form to delete a application entity.
     *
     * @param Application $application The application entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Application $application)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl(
                'applicat_delete',
                 array('id' => $application->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * find the applicant by it is position.
     *
     * @param request     the request for the action
     * @param value       position for the user
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for all the applicants page.
     */ 
    public function findByPositionAction(Request $request,$value)
    {
        $val = (string) $value;
        $applicants = $this->get(ApplicationService::class)
        ->filterApplicantsByPosition($val);

        return $this->render('application/search.html.twig',[
               'applications' => $applicants,
        ]);
    }
}








    // public function logoutAction(Request $request)
    // { 
    //    $token = $request->headers->get("Authorization");
    //    $token = explode("Bearer ", $token);
    //    $repo = $this->getDoctrine()->getRepository("WorkBundle:Blacklist");   
    //    $repo->blackToken($token[1]); 
    //    return $this->redirectToRoute('thank_you');
    // }