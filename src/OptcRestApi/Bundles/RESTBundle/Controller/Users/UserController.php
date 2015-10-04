<?php

namespace OptcRestApi\Bundles\RESTBundle\Controller\Users;

use OptcRestApi\Bundles\RESTBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * UserController.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class UserController extends BaseController
{
    public function testApiAction()
    {
        $articles = array('article1', 'article2', 'article3');

        return new JsonResponse($articles);
    }

    public function userAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user) {
            return new JsonResponse(array(
                'id' => $user->getId(),
                'username' => $user->getUsername(),
            ));
        }

        return new JsonResponse(array(
            'message' => 'User is not identified',
        ));
    }
}
