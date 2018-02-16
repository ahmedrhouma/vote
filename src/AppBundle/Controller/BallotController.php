<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ballot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ballot controller.
 *
 * @Route("ballot")
 */
class BallotController extends Controller
{
    /**
     * Lists all ballot entities.
     *
     * @Route("/", name="ballot_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ballots = $em->getRepository('AppBundle:Ballot')->findAll();

        return $this->render('ballot/index.html.twig', array(
            'ballots' => $ballots,
        ));
    }

    /**
     * Creates a new ballot entity.
     *
     * @Route("/new", name="ballot_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ballot = new Ballot();
        $form = $this->createForm('AppBundle\Form\BallotType', $ballot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ballot);
            $em->flush();

            return $this->redirectToRoute('ballot_show', array('id' => $ballot->getId()));
        }

        return $this->render('ballot/new.html.twig', array(
            'ballot' => $ballot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ballot entity.
     *
     * @Route("/{id}", name="ballot_show")
     * @Method("GET")
     */
    public function showAction(Ballot $ballot)
    {
        $deleteForm = $this->createDeleteForm($ballot);

        return $this->render('ballot/show.html.twig', array(
            'ballot' => $ballot,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ballot entity.
     *
     * @Route("/{id}/edit", name="ballot_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ballot $ballot)
    {
        $deleteForm = $this->createDeleteForm($ballot);
        $editForm = $this->createForm('AppBundle\Form\BallotType', $ballot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ballot_edit', array('id' => $ballot->getId()));
        }

        return $this->render('ballot/edit.html.twig', array(
            'ballot' => $ballot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ballot entity.
     *
     * @Route("/{id}", name="ballot_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ballot $ballot)
    {
        $form = $this->createDeleteForm($ballot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ballot);
            $em->flush();
        }

        return $this->redirectToRoute('ballot_index');
    }

    /**
     * Creates a form to delete a ballot entity.
     *
     * @param Ballot $ballot The ballot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ballot $ballot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ballot_delete', array('id' => $ballot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
