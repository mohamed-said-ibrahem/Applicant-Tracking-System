<?php

namespace WorkBundle\Controller;

use WorkBundle\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorkBundle\Utility\PageUtility;

/**
 * Employee controller.
 *
 */
class EmployeeController extends Controller
{
    /**
     * Lists all employee entities.
     *
     */
    public function indexAction(Request $request)
    {
       // $em = $this->getDoctrine()->getManager();

       // $employees = $em->getRepository('WorkBundle:Employee')->findByPhone('01004200590');
       // dump($employees);die;    

        // return $this->render('employee/index.html.twig', array(
        //     'employees' => $employees,
        // ));

        $em = $this->getDoctrine()->getManager();       
        $pu = new PageUtility($request, $em, 'WorkBundle:Employee', 2, 'id');
        return $this->render('employee/index.html.twig',[
               'employees' => $pu->getRecords(),
               'pager' => $pu->getDisplayParameters(),
        ]);
    }

    /**
     * Creates a new employee entity.
     *
     */
    public function newAction(Request $request)
    {
        try{          
        $employee = new Employee();
        $form = $this->createForm('WorkBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();

            return $this->redirectToRoute('applicat_done');
        }
    }
    catch(\Doctrine\ORM\ORMException $e){
        $this->get('session')->getFlashBag()->add('error', 'Your custom message');
        // or some shortcut that need to be implemented
        // $this->addFlash('error', 'Custom message');
        
        // error logging - need customization
        $this->get('logger')->error($e->getMessage());
        //$this->get('logger')->error($e->getTraceAsString());
        // or some shortcut that need to be implemented
        // $this->logError($e);
        // some redirection e. g. to referer
        echo "*There is an error please check your input";
        return $this->redirect($request->headers->get('referer'));
      }
      catch(\Exception $e){
        // other exceptions
        // flash
        // logger
        // redirection
        echo "**There is an error please check your input";
        
    } 
        return $this->render('employee/new.html.twig', array(
            'employee' => $employee,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employee entity.
     *
     */
    public function showAction(Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
            'employee' => $employee,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employee entity.
     *
     */
    public function editAction(Request $request, Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('WorkBundle\Form\EmployeeType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employee_edit', array('id' => $employee->getId()));
        }

        return $this->render('employee/edit.html.twig', array(
            'employee' => $employee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employee entity.
     *
     */
    public function deleteAction(Request $request, Employee $employee)
    {
        $form = $this->createDeleteForm($employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employee);
            $em->flush();
        }

        return $this->redirectToRoute('employee_index');
    }

    /**
     * Creates a form to delete a employee entity.
     *
     * @param Employee $employee The employee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employee $employee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employee_delete', array('id' => $employee->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
