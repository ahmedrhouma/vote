<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Candidate controller.
 *
 * @Route("candidate")
 */
class CandidateController extends Controller
{
    /**
     * Lists all candidate entities.
     *
     * @Route("/", name="candidate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $candidates = $em->getRepository('AppBundle:Candidate')->findAll();

        return $this->render('candidate/index.html.twig', array(
            'candidates' => $candidates,
        ));
    }

    /**
     * Creates a new candidate entity.
     *
     * @Route("/new", name="candidate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $candidate = new Candidate();
        $form = $this->createForm('AppBundle\Form\CandidateType', $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidate);
            $em->flush();

            return $this->redirectToRoute('candidate_show', array('id' => $candidate->getId()));
        }

        return $this->render('candidate/new.html.twig', array(
            'candidate' => $candidate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a candidate entity.
     *
     * @Route("/{id}", name="candidate_show")
     * @Method("GET")
     */
    public function showAction(Candidate $candidate)
    {
        $deleteForm = $this->createDeleteForm($candidate);

        return $this->render('candidate/show.html.twig', array(
            'candidate' => $candidate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing candidate entity.
     *
     * @Route("/{id}/edit", name="candidate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Candidate $candidate)
    {
        $deleteForm = $this->createDeleteForm($candidate);
        $editForm = $this->createForm('AppBundle\Form\CandidateType', $candidate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidate_edit', array('id' => $candidate->getId()));
        }

        return $this->render('candidate/edit.html.twig', array(
            'candidate' => $candidate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a candidate entity.
     *
     * @Route("/{id}", name="candidate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Candidate $candidate)
    {
        $form = $this->createDeleteForm($candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($candidate);
            $em->flush();
        }

        return $this->redirectToRoute('candidate_index');
    }

    /**
     * Creates a form to delete a candidate entity.
     *
     * @param Candidate $candidate The candidate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Candidate $candidate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('candidate_delete', array('id' => $candidate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
