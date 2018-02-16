<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DecryptedVote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Decryptedvote controller.
 *
 * @Route("decryptedvote")
 */
class DecryptedVoteController extends Controller
{
    /**
     * Lists all decryptedVote entities.
     *
     * @Route("/", name="decryptedvote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $decryptedVotes = $em->getRepository('AppBundle:DecryptedVote')->findAll();

        return $this->render('decryptedvote/index.html.twig', array(
            'decryptedVotes' => $decryptedVotes,
        ));
    }

    /**
     * Creates a new decryptedVote entity.
     *
     * @Route("/new", name="decryptedvote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $decryptedVote = new Decryptedvote();
        $form = $this->createForm('AppBundle\Form\DecryptedVoteType', $decryptedVote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($decryptedVote);
            $em->flush();

            return $this->redirectToRoute('decryptedvote_show', array('id' => $decryptedVote->getId()));
        }

        return $this->render('decryptedvote/new.html.twig', array(
            'decryptedVote' => $decryptedVote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a decryptedVote entity.
     *
     * @Route("/{id}", name="decryptedvote_show")
     * @Method("GET")
     */
    public function showAction(DecryptedVote $decryptedVote)
    {
        $deleteForm = $this->createDeleteForm($decryptedVote);

        return $this->render('decryptedvote/show.html.twig', array(
            'decryptedVote' => $decryptedVote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing decryptedVote entity.
     *
     * @Route("/{id}/edit", name="decryptedvote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DecryptedVote $decryptedVote)
    {
        $deleteForm = $this->createDeleteForm($decryptedVote);
        $editForm = $this->createForm('AppBundle\Form\DecryptedVoteType', $decryptedVote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decryptedvote_edit', array('id' => $decryptedVote->getId()));
        }

        return $this->render('decryptedvote/edit.html.twig', array(
            'decryptedVote' => $decryptedVote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a decryptedVote entity.
     *
     * @Route("/{id}", name="decryptedvote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DecryptedVote $decryptedVote)
    {
        $form = $this->createDeleteForm($decryptedVote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($decryptedVote);
            $em->flush();
        }

        return $this->redirectToRoute('decryptedvote_index');
    }

    /**
     * Creates a form to delete a decryptedVote entity.
     *
     * @param DecryptedVote $decryptedVote The decryptedVote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DecryptedVote $decryptedVote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('decryptedvote_delete', array('id' => $decryptedVote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
