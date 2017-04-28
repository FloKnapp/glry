<?php
/**
 * AdminController | AdminController.php
 * @package Faulancer\Controller
 * @author Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Controller;

use Faulancer\Controller\AbstractController;
use Glry\Entity\CategoryEntity;
use Glry\Entity\UserEntity;
use Glry\Form\UserAddForm;
use Faulancer\Http\Response;
use Glry\Form\UserDeleteForm;

/**
 * Class AdminController
 */
class AdminController extends AbstractController
{

    /**
     * @return Response
     */
    public function indexAction()
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        return $this->render('/admin/site/index.phtml');
    }

    /**
     * @return Response
     */
    public function categoryAction()
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        $categories = $this->getDb()->fetch(CategoryEntity::class)->all();

        return $this->render('/admin/site/category.phtml', ['categories' => $categories]);
    }

    /**
     * @return Response
     */
    public function layoutSettingsAction()
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        return $this->render('/admin/site/layout_settings.phtml');
    }

    /**
     * @return Response
     */
    public function userManagementAction()
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        $users = $this->getDb()->fetch(UserEntity::class)->all();

        return $this->render('/admin/site/user_management.phtml', ['users' => $users]);
    }

    /**
     * @return Response
     */
    public function userAddAction()
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        $form = new UserAddForm();

        if ($this->request->isPost() && $form->isValid()) {

            $data = $form->getData();
            $user = new UserEntity($data);
            $user->save();

            $this->getSessionManager()->setFlashMessage('user.add.success', 'Nutzer wurde erfolgreich eingetragen!');
            $this->redirect('/admin/users');

        }

        return $this->render('/admin/user/manage.phtml', [
            'form' => $form,
            'mode' => 'add'
        ]);
    }

    /**
     * @param integer $userId
     * @return Response
     */
    public function userEditAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        $form = new UserAddForm($this->getDb()->fetch(UserEntity::class, $userId));

        return $this->render('/admin/user/manage.phtml', [
            'form' => $form,
            'mode' => 'edit'
        ]);
    }

    /**
     * @param integer $userId
     * @return Response
     */
    public function userPermissionAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        $form = new UserAddForm($this->getDb()->fetch(UserEntity::class, $userId));

        return $this->render('/admin/user/manage.phtml', [
            'form' => $form,
            'mode' => 'permission'
        ]);
    }

    /**
     * @param integer $userId
     * @return Response
     */
    public function userDeleteAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);
        $this->addDefaultAssets();

        if ($this->getRequest()->isPost() && $this->getRequest()->getParam('confirm') === 'confirmed') {

            $user = $this->getDb()->fetch(UserEntity::class, $userId);
            $this->getDb()->getManager()->delete($user);
            $this->redirect($this->route('admin_user_management'));

        }

        $form = new UserDeleteForm($this->getDb()->fetch(UserEntity::class, $userId));

        return $this->render('/admin/user/delete.phtml', ['form' => $form]);
    }

    /**
     * @return void
     */
    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('https://fonts.googleapis.com/css?family=Noto+Sans');
        $this->getView()->addStylesheet('https://use.fontawesome.com/6f3247207c.css');
        $this->getView()->addStylesheet('/css/main.css');
    }

}