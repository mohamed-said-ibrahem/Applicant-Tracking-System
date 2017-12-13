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
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Lists all application entities.
     *
     */
   
    /**
     * Creates new view for the applicants.
     *
     * @param request      the request to the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an array of the applicants.
     */ 
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();       
        $pu = new PageUtility($request, $em, 'WorkBundle:Application', 10, 'id');
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
     * returns if(Success) a redirection to applicant_done Route.
     */ 
    public function newAction(Request $request)
    {
        try
        {
          $application = new Application();        
          $form = $this->createForm('WorkBundle\Form\ApplicationType', $application);
          $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($application);
                $em->flush();
                return $this->redirectToRoute('applicat_done');
            }
         }
        catch(\Doctrine\ORM\ORMException $e)
        {
             $this->get('session')->getFlashBag()->add('error', 'Your custom message');
             $this->get('logger')->error($e->getMessage());
             echo "*There is an error please check your input";

          return $this->redirect($request->headers->get('referer'));

        } 
        catch(\Exception $e)
        {
             echo "**There is an error please check your input";
        }
          return $this->render('application/new.html.twig', array(
            'application' => $application,
            'form' => $form->createView(),
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
            ->setAction($this->generateUrl('applicat_delete', array('id' => $application->getId())))
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
        $val = (string)$value;
        $applicants = $this->get(ApplicationService::class)
        ->filterApplicantsByPosition($val);

        return $this->render('application/search.html.twig',[
               'applications' => $applicants,
        ]);
        
    }

    public function logoutAction(Request $request)
    { 
       $token = $request->headers->get("Authorization");
       $token = explode("Bearer ", $token);
    //    dump($token[1]);die;       
       $repo = $this->getDoctrine()->getRepository("WorkBundle:Blacklist");   
       $repo->blackToken($token[1]); 
       return $this->redirectToRoute('thank_you');
    }

    //test actions

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
     // dump($arr);
     // $output = $applicantRepo->sortByName($arr);
     // dump($output);die;
    }
    
    public function testAction2()
    {
                //    $value = $this->get(ApplicationService::class)->createNewApplicant('maomddfdaaa','moadaadfdfma',
        //     'maodasdfama','modfsdfamaa','momaassssdfsa@yahoo.com','78888533564',
        //     '34238789322432',new \DateTime(),'3000','phone','YES','PHP','NO','MONaAAAd',
        //     'mySCHsssshsOL',new \DateTime(),new \DateTime(),
        //      'A+','collegesnagmdd','1-2-23','1-2-23',1,'A+');
        //     dump($value);die();

        // $em = $this->getDoctrine()->getManager();
        // $applicantRepo = $em->getRepository('WorkBundle:Application');
        // $arr = $applicantRepo->findByUserOrEmail('mohamed');
        
        // $sou=$c->findAllApplicationDegree('1');
        // dump($sou);die();
        // $app =$a->createApplication('maomdaaa','moadaama','maodaama','modfamaa','momaassssa@yahoo.com','08888533564',
        // '34234329322432',new \DateTime(),'3000','phone','YES','PHP','NO','MONaAAA');
       
        // $b = $em->getRepository('WorkBundle:Education')->createEducation($app,
        // 'mySCHsssssOL',new \DateTime(),new \DateTime(),
        // 'A+','collegesnamdd','1-2-23','1-2-23',1,'A+');

        // dump($b);die;
        // return $this->render('application/index.html.twig', array(
        //     'applications' => $applications,
        // ));
    }

}
