<?php

namespace Frontend\ContextBundle\Controller;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Frontend\ContextBundle\Entity\Context;
use Frontend\ContextBundle\Form\ContextType;

/**
 * Context controller.
 *
 * @Route("/context")
 */
class ContextController extends Controller
{
    /**
     * Lists all Context entities.
     *
     * @Route("/", name="context_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contexts = $em->getRepository('ContextBundle:Context')->findAll();

        return $this->render('context/index.html.twig', array(
            'contexts' => $contexts,
        ));
    }

    /**
     * Creates a new Context entity.
     *
     * @Route("/new", name="context_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $context = new Context();
        $form = $this->createForm('Frontend\ContextBundle\Form\ContextType', $context);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $context->getImagePath();
            $fileName = $this->get('cores.image_uploader')->upload($file);

            $context->setImagePath($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($context);
            $em->flush();

            return $this->redirectToRoute('context_show', array('id' => $context->getId()));
        }

        return $this->render('context/new.html.twig', array(
            'context' => $context,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Context entity.
     *
     * @Route("/{id}", name="context_show")
     * @Method("GET")
     */
    public function showAction(Context $context)
    {
        $deleteForm = $this->createDeleteForm($context);

        return $this->render('context/show.html.twig', array(
            'context' => $context,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Context entity.
     *
     * @Route("/{id}/edit", name="context_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Context $context)
    {
        $context->setImagePath(new File($this->getParameter('images_directory').'/'.$context->getImagePath()));
        $deleteForm = $this->createDeleteForm($context);
        $editForm = $this->createForm('Frontend\ContextBundle\Form\ContextType', $context);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $file = $context->getImagePath();
//            $fileName = $this->get('core.image_uploader')->upload($file);
//            $context->setImagePath($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($context);
            $em->flush();

            return $this->redirectToRoute('context_edit', array('id' => $context->getId()));
        }

        return $this->render('context/edit.html.twig', array(
            'context' => $context,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Context entity.
     *
     * @Route("/{id}", name="context_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Context $context)
    {
        $form = $this->createDeleteForm($context);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($context);
            $em->flush();
        }

        return $this->redirectToRoute('context_index');
    }

    /**
     * Creates a form to delete a Context entity.
     *
     * @param Context $context The Context entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Context $context)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('context_delete', array('id' => $context->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
