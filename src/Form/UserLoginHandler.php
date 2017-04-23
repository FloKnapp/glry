<?php

namespace Glry\Form;

use Faulancer\Form\AbstractFormHandler;
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

        $user = $this->getDb()
            ->fetch(UserEntity::class)
            ->where('login', '=', $login)
            ->andWhere('password', '=', $pass)
            ->one();

        if (empty($user->getData())) {
            $this->redirect('/user/login');
        }

        /** @var SessionManager $sessionManager */
        $sessionManager = $this->getServiceLocator()->get(SessionManagerService::class);
        $sessionManager->set('user', $user->id);

        $this->redirect('/');

        return true;
    }

}