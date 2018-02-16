<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Elector;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Elector controller.
 *
 * @Route("elector")
 */
class ElectorController extends Controller
{
    /**
     * Lists all elector entities.
     *
     * @Route("/", name="elector_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $electors = $em->getRepository('AppBundle:Elector')->findAll();

        return $this->render('elector/index.html.twig', array(
            'electors' => $electors,
        ));
    }

    /**
     * Creates a new elector entity.
     *
     * @Route("/new", name="elector_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $elector = new Elector();
        $form = $this->createForm('AppBundle\Form\ElectorType', $elector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($elector);
            $em->flush();

            return $this->redirectToRoute('elector_show', array('id' => $elector->getId()));
        }

        return $this->render('elector/new.html.twig', array(
            'elector' => $elector,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a elector entity.
     *
     * @Route("/{id}", name="elector_show")
     * @Method("GET")
     */
    public function showAction(Elector $elector)
    {
        $deleteForm = $this->createDeleteForm($elector);

        return $this->render('elector/show.html.twig', array(
            'elector' => $elector,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing elector entity.
     *
     * @Route("/{id}/edit", name="elector_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Elector $elector)
    {
        $deleteForm = $this->createDeleteForm($elector);
        $editForm = $this->createForm('AppBundle\Form\ElectorType', $elector);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('elector_edit', array('id' => $elector->getId()));
        }

        return $this->render('elector/edit.html.twig', array(
            'elector' => $elector,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a elector entity.
     *
     * @Route("/{id}", name="elector_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Elector $elector)
    {
        $form = $this->createDeleteForm($elector);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($elector);
            $em->flush();
        }

        return $this->redirectToRoute('elector_index');
    }

    /**
     * Creates a form to delete a elector entity.
     *
     * @param Elector $elector The elector entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Elector $elector)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('elector_delete', array('id' => $elector->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
