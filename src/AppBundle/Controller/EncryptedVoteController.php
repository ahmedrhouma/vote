<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EncryptedVote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Encryptedvote controller.
 *
 * @Route("encryptedvote")
 */
class EncryptedVoteController extends Controller
{
    /**
     * Lists all encryptedVote entities.
     *
     * @Route("/", name="encryptedvote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $encryptedVotes = $em->getRepository('AppBundle:EncryptedVote')->findAll();

        return $this->render('encryptedvote/index.html.twig', array(
            'encryptedVotes' => $encryptedVotes,
        ));
    }

    /**
     * Creates a new encryptedVote entity.
     *
     * @Route("/new", name="encryptedvote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $encryptedVote = new Encryptedvote();
        $form = $this->createForm('AppBundle\Form\EncryptedVoteType', $encryptedVote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($encryptedVote);
            $em->flush();

            return $this->redirectToRoute('encryptedvote_show', array('id' => $encryptedVote->getId()));
        }

        return $this->render('encryptedvote/new.html.twig', array(
            'encryptedVote' => $encryptedVote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a encryptedVote entity.
     *
     * @Route("/{id}", name="encryptedvote_show")
     * @Method("GET")
     */
    public function showAction(EncryptedVote $encryptedVote)
    {
        $deleteForm = $this->createDeleteForm($encryptedVote);

        return $this->render('encryptedvote/show.html.twig', array(
            'encryptedVote' => $encryptedVote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing encryptedVote entity.
     *
     * @Route("/{id}/edit", name="encryptedvote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EncryptedVote $encryptedVote)
    {
        $deleteForm = $this->createDeleteForm($encryptedVote);
        $editForm = $this->createForm('AppBundle\Form\EncryptedVoteType', $encryptedVote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('encryptedvote_edit', array('id' => $encryptedVote->getId()));
        }

        return $this->render('encryptedvote/edit.html.twig', array(
            'encryptedVote' => $encryptedVote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a encryptedVote entity.
     *
     * @Route("/{id}", name="encryptedvote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EncryptedVote $encryptedVote)
    {
        $form = $this->createDeleteForm($encryptedVote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($encryptedVote);
            $em->flush();
        }

        return $this->redirectToRoute('encryptedvote_index');
    }

    /**
     * Creates a form to delete a encryptedVote entity.
     *
     * @param EncryptedVote $encryptedVote The encryptedVote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EncryptedVote $encryptedVote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('encryptedvote_delete', array('id' => $encryptedVote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
