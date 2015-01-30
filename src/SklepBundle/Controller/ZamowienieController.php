<?php

namespace SklepBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SklepBundle\Entity\Zamowienie;
use SklepBundle\Form\ZamowienieType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Zamowienie controller.
 *
 * @Route("/zamowienie")
 */
class ZamowienieController extends Controller
{
    
    /**
     * Lists all Zamowienie entities.
     *
     * @Route("/", name="zamowienie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $response->headers->set('x-frame-options', 'deny');
        $response->send();
        $entities = $em->getRepository('SklepBundle:Zamowienie')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Skladamy nowe zamówienei
     *
     * @Route("/", name="zamowienie_create")
     * @Method("POST")
     * @Template("SklepBundle:Zamowienie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Zamowienie();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zamowienie_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Zamowienie entity.
     *
     * @param Zamowienie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Zamowienie $entity)
    {
        $form = $this->createForm(new ZamowienieType(), $entity, array(
            'action' => $this->generateUrl('zamowienie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Zamowienie entity.
     *
     * @Route("/new/{id}", name="zamowienie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $entity = new Zamowienie();
        // Ustaw użytkownika na obecnego przy nowym zamówienie
        $entity->setUzytkownik($this->getUser());

        $em = $this->getDoctrine()->getManager();
        


        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SklepBundle:Zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zamowienie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Zamowienie entity.
     *
     * @Route("/{id}/edit", name="zamowienie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SklepBundle:Zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zamowienie entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Zamowienie entity.
    *
    * @param Zamowienie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Zamowienie $entity)
    {
        $form = $this->createForm(new ZamowienieType(), $entity, array(
            'action' => $this->generateUrl('zamowienie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_update")
     * @Method("PUT")
     * @Template("SklepBundle:Zamowienie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SklepBundle:Zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Zamowienie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zamowienie_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SklepBundle:Zamowienie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Zamowienie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zamowienie'));
    }

    /**
     * Creates a form to delete a Zamowienie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zamowienie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
