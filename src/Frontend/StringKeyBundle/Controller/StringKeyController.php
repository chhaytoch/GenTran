<?php

namespace Frontend\StringKeyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Frontend\StringKeyBundle\Entity\StringKey;
use Frontend\StringKeyBundle\Form\StringKeyType;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;

/**
 * StringKey controller.
 *
 * @Route("/stringkey")
 */
class StringKeyController extends Controller
{
    /**
     * Lists all StringKey entities.
     *
     * @Route("/", name="stringkey_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stringKeys = $em->getRepository('StringKeyBundle:StringKey')->findAll();

        return $this->render('stringkey/index.html.twig', array(
            'stringKeys' => $stringKeys,
        ));
    }

    /**
     * Creates a new StringKey entity.
     *
     * @Route("/new", name="stringkey_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stringKey = new StringKey();
        $form = $this->createForm('Frontend\StringKeyBundle\Form\StringKeyType', $stringKey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stringKey);
            $em->flush();

            return $this->redirectToRoute('stringkey_show', array('id' => $stringKey->getId()));
        }

        return $this->render('stringkey/new.html.twig', array(
            'stringKey' => $stringKey,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StringKey entity.
     *
     * @Route("/{id}", name="stringkey_show")
     * @Method("GET")
     */
    public function showAction(StringKey $stringKey)
    {
        $deleteForm = $this->createDeleteForm($stringKey);

        return $this->render('stringkey/show.html.twig', array(
            'stringKey' => $stringKey,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StringKey entity.
     *
     * @Route("/{id}/edit", name="stringkey_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StringKey $stringKey)
    {
        $deleteForm = $this->createDeleteForm($stringKey);
        $editForm = $this->createForm('Frontend\StringKeyBundle\Form\StringKeyType', $stringKey);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stringKey);
            $em->flush();

            return $this->redirectToRoute('stringkey_edit', array('id' => $stringKey->getId()));
        }

        return $this->render('stringkey/edit.html.twig', array(
            'stringKey' => $stringKey,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a StringKey entity.
     *
     * @Route("/{id}", name="stringkey_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StringKey $stringKey)
    {
        $form = $this->createDeleteForm($stringKey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stringKey);
            $em->flush();
        }

        return $this->redirectToRoute('stringkey_index');
    }

    /**
     * Creates a form to delete a StringKey entity.
     *
     * @param StringKey $stringKey The StringKey entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StringKey $stringKey)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stringkey_delete', array('id' => $stringKey->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
