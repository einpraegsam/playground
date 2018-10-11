<?php
namespace In2code\Blog\Controller;

/***
 *
 * This file is part of the "blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Alex Kellner <alexander.kellner@in2code.de>, In2code GmbH
 *
 ***/

/**
 * ArticleController
 */
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * articleRepository
     *
     * @var \In2code\Blog\Domain\Repository\ArticleRepository
     * @inject
     */
    protected $articleRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $articles = $this->articleRepository->findAll();
        $this->view->assign('articles', $articles);
    }
}
