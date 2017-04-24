<?php

namespace Glry\Form\Handler;

use Faulancer\Form\AbstractFormHandler;
use Faulancer\Service\AuthenticatorService;
use Faulancer\Service\SessionManagerService;
use Faulancer\Session\SessionManager;
use Glry\Entity\UserEntity;

/**
 * Class UserLoginHandler
 * @package Glry\Form
 */
class UserLoginHandler extends AbstractFormHandler
{

    /**
     * @return boolean
     */
    public function run()
    {
        $request = $this->getRequest();

        $login = $request->getParam('text/login');
        $pass  = $request->getParam('text/password');

        /** @var AuthenticatorService $authService */
        $authService = $this->getServiceLocator()->get(AuthenticatorService::class);

        $user           = new UserEntity();
        $user->login    = $login;
        $user->password = $pass;

        $authService->loginUser($user);

        return true;
    }

}