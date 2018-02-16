<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ResultBallot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resultballot controller.
 *
 * @Route("resultballot")
 */
class ResultBallotController extends Controller
{
    /**
     * Lists all resultBallot entities.
     *
     * @Route("/", name="resultballot_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultBallots = $em->getRepository('AppBundle:ResultBallot')->findAll();

        return $this->render('resultballot/index.html.twig', array(
            'resultBallots' => $resultBallots,
        ));
    }

    /**
     * Creates a new resultBallot entity.
     *
     * @Route("/new", name="resultballot_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resultBallot = new Resultballot();
        $form = $this->createForm('AppBundle\Form\ResultBallotType', $resultBallot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultBallot);
            $em->flush();

            return $this->redirectToRoute('resultballot_show', array('id' => $resultBallot->getId()));
        }

        return $this->render('resultballot/new.html.twig', array(
            'resultBallot' => $resultBallot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultBallot entity.
     *
     * @Route("/{id}", name="resultballot_show")
     * @Method("GET")
     */
    public function showAction(ResultBallot $resultBallot)
    {
        $deleteForm = $this->createDeleteForm($resultBallot);

        return $this->render('resultballot/show.html.twig', array(
            'resultBallot' => $resultBallot,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultBallot entity.
     *
     * @Route("/{id}/edit", name="resultballot_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResultBallot $resultBallot)
    {
        $deleteForm = $this->createDeleteForm($resultBallot);
        $editForm = $this->createForm('AppBundle\Form\ResultBallotType', $resultBallot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultballot_edit', array('id' => $resultBallot->getId()));
        }

        return $this->render('resultballot/edit.html.twig', array(
            'resultBallot' => $resultBallot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultBallot entity.
     *
     * @Route("/{id}", name="resultballot_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResultBallot $resultBallot)
    {
        $form = $this->createDeleteForm($resultBallot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultBallot);
            $em->flush();
        }

        return $this->redirectToRoute('resultballot_index');
    }

    /**
     * Creates a form to delete a resultBallot entity.
     *
     * @param ResultBallot $resultBallot The resultBallot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResultBallot $resultBallot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultballot_delete', array('id' => $resultBallot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
