<?php

namespace Frontend\OperatingSystemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Frontend\OperatingSystemBundle\Entity\OperatingSystem;
use Frontend\OperatingSystemBundle\Form\OperatingSystemType;

/**
 * OperatingSystem controller.
 *
 * @Route("/operatingsystem")
 */
class OperatingSystemController extends Controller
{
    /**
     * Lists all OperatingSystem entities.
     *
     * @Route("/", name="operatingsystem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operatingSystems = $em->getRepository('OperatingSystemBundle:OperatingSystem')->findAll();

        return $this->render('operatingsystem/index.html.twig', array(
            'operatingSystems' => $operatingSystems,
        ));
    }

    /**
     * Creates a new OperatingSystem entity.
     *
     * @Route("/new", name="operatingsystem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operatingSystem = new OperatingSystem();
        $form = $this->createForm('Frontend\OperatingSystemBundle\Form\OperatingSystemType', $operatingSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operatingSystem);
            $em->flush();

            return $this->redirectToRoute('operatingsystem_show', array('id' => $operatingSystem->getId()));
        }

        return $this->render('operatingsystem/new.html.twig', array(
            'operatingSystem' => $operatingSystem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OperatingSystem entity.
     *
     * @Route("/{id}", name="operatingsystem_show")
     * @Method("GET")
     */
    public function showAction(OperatingSystem $operatingSystem)
    {
        $deleteForm = $this->createDeleteForm($operatingSystem);

        return $this->render('operatingsystem/show.html.twig', array(
            'operatingSystem' => $operatingSystem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OperatingSystem entity.
     *
     * @Route("/{id}/edit", name="operatingsystem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OperatingSystem $operatingSystem)
    {
        $deleteForm = $this->createDeleteForm($operatingSystem);
        $editForm = $this->createForm('Frontend\OperatingSystemBundle\Form\OperatingSystemType', $operatingSystem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operatingSystem);
            $em->flush();

            return $this->redirectToRoute('operatingsystem_edit', array('id' => $operatingSystem->getId()));
        }

        return $this->render('operatingsystem/edit.html.twig', array(
            'operatingSystem' => $operatingSystem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OperatingSystem entity.
     *
     * @Route("/{id}", name="operatingsystem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OperatingSystem $operatingSystem)
    {
        $form = $this->createDeleteForm($operatingSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operatingSystem);
            $em->flush();
        }

        return $this->redirectToRoute('operatingsystem_index');
    }

    /**
     * Creates a form to delete a OperatingSystem entity.
     *
     * @param OperatingSystem $operatingSystem The OperatingSystem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OperatingSystem $operatingSystem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operatingsystem_delete', array('id' => $operatingSystem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
