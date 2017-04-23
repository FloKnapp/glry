<?php
/**
 * Created by PhpStorm.
 * UserEntity: flo
 * Date: 23.04.17
 * Time: 20:14
 */

namespace Glry\Controller;

use Faulancer\Controller\Controller;

class AdminController extends Controller
{

    public function indexAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/index.phtml');
    }

    public function categoryAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/category.phtml');
    }

    public function layoutSettingsAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/layout_settings.phtml');
    }

    public function userManagementAction()
    {
        $this->requireAuth(['administrator', 'moderator']);

        $this->addDefaultAssets();

        return $this->render('/admin/site/user_management.phtml');
    }

    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('https://fonts.googleapis.com/css?family=Noto+Sans');
        $this->getView()->addStylesheet('https://use.fontawesome.com/6f3247207c.css');
        $this->getView()->addStylesheet('/css/main.css');

    }

}