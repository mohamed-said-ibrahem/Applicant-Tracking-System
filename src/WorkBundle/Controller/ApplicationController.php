<?php

namespace WorkBundle\Controller;

use WorkBundle\Entity\Application;
use WorkBundle\Entity\Blacklist;
use WorkBundle\Repository\BlacklistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorkBundle\Service\ApplicationService;
use WorkBundle\Utility\PageUtility;
use Symfony\Component\HttpFoundation\Response;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Lists all application entities.
     *
     */
   
   public function logoutAction(Request $request)
    { 
       $token = $request->headers->get("Authorization");
       $token = explode("Bearer ", $token);
    //    dump($token[1]);die;       
       $repo = $this->getDoctrine()->getRepository("WorkBundle:Blacklist");   
       $repo->blackToken($token[1]); 
       return $this->redirectToRoute('thank_you');
    }
   
   public function listAction(Request $request)
    {
        
        //$em = $this->getDoctrine()->getManager();       
        //$pu = new PageUtility($request, $em, 'WorkBundle:Application', 2, 'id');
        // return $this->render('WorkBundle:Pagination:list.html.twig',[
        //     'tasks' => $pu->getRepository('WorkBundle:Application')
        //     ->findByUserOrEmail('mohamed'),
        //     //'tasks' => $pu->getRecords(),
        //     'pager' => $pu->getDisplayParameters(),
        // ]);

    }

   public function testAction()
   {
   $em = $this->getDoctrine()->getManager();
   $applicantRepo = $em->getRepository('WorkBundle:Application');
   //    dump(get_class_methods($applicantRepo));die;
    //    dump($applicantRepo->findByUserOrEmail('yahoo'));die;
    $arr = $applicantRepo->findByUserOrEmail('mohamed');
    dump($arr);
    // $output = $applicantRepo->sortByName($arr);
    // dump($output);die;

   } 
    
    public function indexAction(Request $request)
    {
        // $em = $this->getDoctrine()->getManager();

        // $applications = $em->getRepository('WorkBundle:Application')->filterByPosition('PHP')
        // ;

        // //dump($applications);die;
        // return $this->render('application/index.html.twig', array(
        //     'applications' => $applications,
        // ));

        
        $em = $this->getDoctrine()->getManager();       
        $pu = new PageUtility($request, $em, 'WorkBundle:Application', 2, 'applied_position');
        return $this->render('application/index.html.twig',[
               'applications' => $pu->getRecords(),
               'pager' => $pu->getDisplayParameters(),
        ]);
    
    }

    public function submittedAction(Request $request)
    {
        return $this->render('WorkBundle:Default:Submitted.html.twig');
    }
    

    /**
     * Creates a new application entity.
     *
     */
    public function newAction(Request $request)
    {
        try{
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
    catch(\Doctrine\ORM\ORMException $e){
        $this->get('session')->getFlashBag()->add('error', 'Your custom message');
        // or some shortcut that need to be implemented
        // $this->addFlash('error', 'Custom message');
        echo "error1";
        
        // error logging - need customization
        $this->get('logger')->error($e->getMessage());
        //$this->get('logger')->error($e->getTraceAsString());
        // or some shortcut that need to be implemented
        // $this->logError($e);
        echo "error2";
        // some redirection e. g. to referer
        return $this->redirect($request->headers->get('referer'));
      } 
    catch(\Exception $e){
        // other exceptions
        // flash
        // logger
        // redirection
        echo "error3";
        
    }
        return $this->render('application/new.html.twig', array(
            'application' => $application,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a application entity.
     *
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
     * Deletes a application entity.
     *
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
            ->setAction($this->generateUrl('applicat_delete', array('id' => $application->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
