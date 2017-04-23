<?php
/**
 * Created by PhpStorm.
 * UserEntity: flo
 * Date: 23.04.17
 * Time: 21:49
 */

namespace Glry\Controller;

use Faulancer\Controller\Controller;

class UserController extends Controller
{

    public function loginAction()
    {

        $this->addDefaultAssets();

        return $this->render('/user/login.phtml');

    }

    public function logoutAction()
    {
        $this->addDefaultAssets();

        $this->getSessionManager()->delete('user');

        $this->redirect('/');
    }

    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('/css/main.css');
    }

}