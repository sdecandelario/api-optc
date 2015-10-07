<?php

namespace OptcRestApi\Bundles\RESTBundle\Controller\Character;

use JMS\Serializer\SerializationContext;
use OptcRestApi\Bundles\RESTBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * CharacterController.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class CharacterController extends BaseController
{
    public function listAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 10);

        $paginator = $this->get('knp_paginator');

        $entities = $this->get('optc_api.repository.character')->findAll();

        $context = new SerializationContext();
        $context->setGroups(array('api'));

        $pagination = $paginator->paginate($entities, $page, $limit);

        $view = $this
            ->view($pagination->getItems())
            ->setSerializationContext($context)
        ;

        return $this->handleView($view);
    }

    public function createAction(Request $request)
    {
        $response = new JsonResponse();
        $response->setData(array('content' => JsonResponse::HTTP_OK));
        $serializer = $this->get('jms_serializer');
        $validator = $this->get('validator');
        $data = $request->request->all();

        $entity = $serializer->fromArray($data, 'OptcRestApi\Components\Character\Entity\Character');

        $errors = $validator->validate($entity, null, 'new');

        if ($errors->count()) {
            $response->setStatusCode(JsonResponse::HTTP_BAD_REQUEST);

            $errorMessages = array();

            foreach ($errors as $key => $error) {
                $errorMessages[$error->getPropertyPath()] = $error->getMessage();
            }

            $response->setData(array('content' => $errorMessages));
        } else {
            $em = $this->get('doctrine.orm.default_entity_manager');

            $em->persist($entity);
            $em->flush($entity);
        }

        return $response;
    }

    public function getAction($id)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');

        $entity = $em->getRepository('OptcRestApi\Components\Character\Entity\Character')->find($id);

        $context = new SerializationContext();
        $context->setGroups(array('api'));

        $view = $this
            ->view($entity)
            ->setSerializationContext($context)
        ;

        return $this->handleView($view);
    }

    public function updateAction(){

    }

    public function deleteAction(){

    }
}
