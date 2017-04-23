<?php

namespace Glry\Controller;

use Faulancer\Controller\Controller;
use Faulancer\Service\DbService;
use Glry\Entity\CategoryEntity;

/**
 * Class SiteController
 */
class SiteController extends Controller
{

    /**
     * @return \Faulancer\Http\Response
     */
    public function indexAction()
    {
        $this->addDefaultAssets();

        /** @var DbService $data */
        $db   = $this->getDb();

        /** @var CategoryEntity[] $data */
        $data = $db->fetch(CategoryEntity::class)->all();

        return $this->render('/site/index.phtml', ['categories' => $data]);
    }

    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('/css/main.css');
    }

}