<?php

namespace OptcRestApi\Bundles\RESTBundle\Controller\Character;

use FOS\RestBundle\Request\ParamFetcher;
use JMS\Serializer\SerializationContext;
use OptcRestApi\Bundles\RESTBundle\Controller\BaseController;
use OptcRestApi\Components\Character\Entity\Character;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\QueryParam;

/**
 * CharacterController.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class CharacterController extends BaseController
{
    /**
     * @QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview.")
     * @QueryParam(name="limit", requirements="\d+", default="10", description="Number of items.")
     *
     * @param ParamFetcher $paramFetcher
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(ParamFetcher $paramFetcher)
    {
        $page = $paramFetcher->get('page');
        $limit = $paramFetcher->get('limit');

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

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
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

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
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

    /**
     * @param $id
     * @param $character
     *
     * @ParamConverter("character", converter="fos_rest.request_body", options={"deserializationContext"={"groups"={"api"}, "version"="1.0"}})
     *
     * @return JsonResponse
     */
    public function updateAction($id, Character $character)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $merger = $this->get('optc_api.entity_merger');

        $view = $this->view();

        $entity = $em->getRepository('OptcRestApi\Components\Character\Entity\Character')->find($id);

        $errors = $this->getValidationErrors($entity, array('edit'));

        if (count($errors) > 0) {
            $view->setData($errors);
        } else {
            $view->setData(array('OK'));
            $merger->mergeEntities($entity, $character);
            $em->merge($character);
            $em->flush();
        }

        return $this->handleView($view);
    }

    /**
     * @param Character $character
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Character $character)
    {
        $view = $this->view();

        $em = $this->get('doctrine.orm.default_entity_manager');

        $em->remove($character);
        $em->flush();
        $view->setData(array('message' => 'Character deleted'));

        return $this->handleView($view);
    }
}
