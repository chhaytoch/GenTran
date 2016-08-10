<?php

namespace Frontend\StringValueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Frontend\StringValueBundle\Entity\StringValue;
use Frontend\StringValueBundle\Form\StringValueType;

/**
 * StringValue controller.
 *
 * @Route("/stringvalue")
 */
class StringValueController extends Controller
{
    /**
     * Lists all StringValue entities.
     *
     * @Route("/", name="stringvalue_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stringValues = $em->getRepository('StringValueBundle:StringValue')->findAll();

        return $this->render('stringvalue/index.html.twig', array(
            'stringValues' => $stringValues,
        ));
    }

    /**
     * Creates a new StringValue entity.
     *
     * @Route("/new", name="stringvalue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stringValue = new StringValue();
        $form = $this->createForm('Frontend\StringValueBundle\Form\StringValueType', $stringValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stringValue);
            $em->flush();

            return $this->redirectToRoute('stringvalue_show', array('id' => $stringValue->getId()));
        }

        return $this->render('stringvalue/new.html.twig', array(
            'stringValue' => $stringValue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StringValue entity.
     *
     * @Route("/{id}", name="stringvalue_show")
     * @Method("GET")
     */
    public function showAction(StringValue $stringValue)
    {
        $deleteForm = $this->createDeleteForm($stringValue);

        return $this->render('stringvalue/show.html.twig', array(
            'stringValue' => $stringValue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StringValue entity.
     *
     * @Route("/{id}/edit", name="stringvalue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StringValue $stringValue)
    {
        $deleteForm = $this->createDeleteForm($stringValue);
        $editForm = $this->createForm('Frontend\StringValueBundle\Form\StringValueType', $stringValue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stringValue);
            $em->flush();

            return $this->redirectToRoute('stringvalue_edit', array('id' => $stringValue->getId()));
        }

        return $this->render('stringvalue/edit.html.twig', array(
            'stringValue' => $stringValue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a StringValue entity.
     *
     * @Route("/{id}", name="stringvalue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StringValue $stringValue)
    {
        $form = $this->createDeleteForm($stringValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stringValue);
            $em->flush();
        }

        return $this->redirectToRoute('stringvalue_index');
    }

    /**
     * Creates a form to delete a StringValue entity.
     *
     * @param StringValue $stringValue The StringValue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StringValue $stringValue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stringvalue_delete', array('id' => $stringValue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
