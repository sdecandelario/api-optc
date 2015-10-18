<?php

namespace OptcRestApi\Bundles\RESTBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * BaseController.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class BaseController extends FOSRestController
{
    public function getValidationErrors($entity, $groups = array())
    {
        $validationMessages = array();

        $validator = $this->get('validator');

        $errors = $validator->validate($entity, null, $groups);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $validationMessages[$error->getPropertyPath()] = $error->getMessage();
            }
        }

        return $validationMessages;
    }
}
