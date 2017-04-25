<?php
/**
 * UserController | UserController.php
 * @package Glry\Controller
 * @author Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Controller;

use Faulancer\Controller\AbstractController;
use Faulancer\Http\Response;

/**
 * Class UserController
 */
class UserController extends AbstractController
{

    /**
     * @return Response
     */
    public function loginAction()
    {
        $this->addDefaultAssets();
        return $this->render('/user/login.phtml');
    }

    /**
     * @return void
     */
    public function logoutAction()
    {
        $this->addDefaultAssets();

        $this->getSessionManager()->delete('user');

        $this->redirect('/');
    }

    /**
     * @return void
     */
    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('/css/main.css');
    }

}