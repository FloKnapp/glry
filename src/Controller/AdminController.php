<?php
/**
 * Created by PhpStorm.
 * UserEntity: flo
 * Date: 23.04.17
 * Time: 20:14
 */

namespace Glry\Controller;

use Faulancer\Controller\Controller;
use Glry\Entity\CategoryEntity;
use Glry\Entity\UserEntity;
use Glry\Form\UserAddForm;
use Glry\Form\UserEditForm;

class AdminController extends Controller
{

    /**
     * @return \Faulancer\Http\Response
     */
    public function indexAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/index.phtml');
    }

    /**
     * @return \Faulancer\Http\Response
     */
    public function categoryAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        $categories = $this->getDb()->fetch(CategoryEntity::class)->all();

        return $this->render('/admin/site/category.phtml', ['categories' => $categories]);
    }

    /**
     * @return \Faulancer\Http\Response
     */
    public function layoutSettingsAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/layout_settings.phtml');
    }

    /**
     * @return \Faulancer\Http\Response
     */
    public function userManagementAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        $users = $this->getDb()->fetch(UserEntity::class)->all();

        return $this->render('/admin/site/user_management.phtml', ['users' => $users]);
    }

    /**
     * @return \Faulancer\Http\Response
     */
    public function userAddAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/user/add.phtml');
    }

    /**
     * @param integer $userId
     * @return \Faulancer\Http\Response
     */
    public function userEditAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        $user = $this->getDb()->fetch(UserEntity::class, $userId);

        return $this->render('/admin/user/edit.phtml', ['user' => $user]);
    }

    /**
     * @param integer $userId
     * @return \Faulancer\Http\Response
     */
    public function userPermissionAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        $user = $this->getDb()->fetch(UserEntity::class, $userId);

        return $this->render('/admin/user/edit.phtml', ['user' => $user]);
    }

    /**
     * @param integer $userId
     * @return \Faulancer\Http\Response
     */
    public function userDeleteAction($userId)
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        $user = $this->getDb()->fetch(UserEntity::class, $userId);

        return $this->render('/admin/user/edit.phtml', ['user' => $user]);
    }

    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('https://fonts.googleapis.com/css?family=Noto+Sans');
        $this->getView()->addStylesheet('https://use.fontawesome.com/6f3247207c.css');
        $this->getView()->addStylesheet('/css/main.css');
    }

}