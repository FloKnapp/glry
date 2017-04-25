<?php
/**
 * SiteController | SiteController.php
 * @package Faulancer\Controller
 * @author Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Controller;

use Faulancer\Controller\AbstractController;
use Faulancer\Service\DbService;
use Glry\Entity\CategoryEntity;
use Faulancer\Http\Response;

/**
 * Class SiteController
 */
class SiteController extends AbstractController
{

    /**
     * @return Response
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

    /**
     * @return void
     */
    private function addDefaultAssets()
    {
        $this->getView()->addStylesheet('/css/main.css');
    }

}