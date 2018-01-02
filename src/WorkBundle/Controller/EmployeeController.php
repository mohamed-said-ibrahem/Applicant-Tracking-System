<?php

namespace WorkBundle\Controller;

use WorkBundle\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorkBundle\Utility\PageUtility;

/**
 * Employee controller class.
 *
 */
class EmployeeController extends Controller
{
    /**
     * Creates new view for the employees.
     *
     * @param request      the request to the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns an array of the employees to the view.
     */ 
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $var = $this->getParameter('page');       
        $pu = new PageUtility($request, $em, 'WorkBundle:Employee', $var, 'id');
        return $this->render('employee/index.html.twig',[
               'employees' => $pu->getRecords(),
               'pager' => $pu->getDisplayParameters(),
        ]);
    }

    /**
     * Creates a new employees entity.
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
        $exception = null;
      try{          
        $employee = new Employee();
        $form = $this->createForm('WorkBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
         {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();
      return $this->redirectToRoute('applicat_done');
         }
         }
      catch(\Doctrine\ORM\ORMException $e){$exception = $e;}
      catch(\Exception $e){$exception = $e;} 
      return $this->render('employee/new.html.twig', array(
            'employee' => $employee,
            'form' => $form->createView(),
            'error' => $exception,
        ));
    }

    /**
     * Finds and displays a employees entity.
     *
     * @param employee  an object of the employee type        .
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for the employee.
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
     * @param request      the request for the action
     * @param employee  an object of the employee type
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for the employee edit page.
     */ 
    public function editAction(Request $request, Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('WorkBundle\Form\EmployeeType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employee_edit',
             array('id' => $employee->getId()));
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
     * @param request      the request for the action
     * 
     * @throws Some_Exception_Class  there is not exeptions
     * @author Mohamed Said
     * 
     * returns if(Success) a view for all the employees page.
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
            ->setAction($this->generateUrl('employee_delete',
            array('id' => $employee->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}