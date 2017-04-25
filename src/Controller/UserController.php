<?php
/**
 * UserController | UserController.php
 * @package Glry\Controller
 * @author Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Controller;

use Faulancer\Controller\AbstractController;
use Faulancer\Http\Response;
use Faulancer\Service\AuthenticatorService;
use Glry\Entity\UserEntity;
use Glry\Form\UserLoginForm;

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

        $form = new UserLoginForm();

        if ($this->getRequest()->isPost() && $form->isValid()) {

            /** @var AuthenticatorService $authService */
            $authService = $this->getServiceLocator()->get(AuthenticatorService::class);
            $authService->loginUser(new UserEntity($form->getData()));

        }

        return $this->render('/user/login.phtml', ['form' => $form]);
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