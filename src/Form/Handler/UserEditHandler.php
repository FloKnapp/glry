<?php

namespace Glry\Form\Handler;

use Faulancer\Form\AbstractFormHandler;
use Faulancer\Security\Crypt;
use Faulancer\Service\DbService;
use Glry\Entity\UserEntity;

class UserEditHandler extends AbstractFormHandler
{

    /**
     * @return boolean
     */
    public function run()
    {
        if (!$this->getForm()->isValid()) {
            $this->redirect('/admin/user/edit/' . $this->getRequest()->getParam('user_id'));
        }

        /** @var DbService $dbService */
        $dbService = $this->getServiceLocator()->get(DbService::class);

        $password = $this->getRequest()->getParam('text/password');

        if (!empty($password)) {
            $crypt    = new Crypt();
            $password = $crypt->hashPassword($this->getRequest()->getParam('text/password'));
        } else {
            $password = null;
        }

        $user            = new UserEntity();
        $user->id        = $this->getRequest()->getParam('user_id');
        $user->gender    = $this->getRequest()->getParam('text/gender');
        $user->firstname = $this->getRequest()->getParam('text/firstname');
        $user->lastname  = $this->getRequest()->getParam('text/lastname');
        $user->email     = $this->getRequest()->getParam('email/email');
        $user->login     = $this->getRequest()->getParam('text/login');

        if ($password !== null) {
            $user->password  = $password;
        }

        $user->save($dbService->getManager());

        $this->redirect('/admin/users');

        return true;

    }

}