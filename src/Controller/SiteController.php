<?php

namespace Glry\Controller;

use Faulancer\Controller\Controller;

/**
 * Class SiteController
 */
class SiteController extends Controller
{

    public function indexAction()
    {
        return $this->render('/site/index.phtml');
    }

}