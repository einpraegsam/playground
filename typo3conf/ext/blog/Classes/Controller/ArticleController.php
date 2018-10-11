<?php
namespace In2code\Blog\Controller;

use In2code\Blog\Domain\Model\Article;

/**
 * ArticleController
 */
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \In2code\Blog\Domain\Repository\ArticleRepository
     * @inject
     */
    protected $articleRepository = null;

    /**
     * @return void
     */
    public function listAction()
    {
        $articles = $this->articleRepository->findAll();
        $this->view->assign('articles', $articles);
    }

    /**
     * @param Article $article
     * @return void
     */
    public function showAction(Article $article)
    {
        $this->view->assign('article', $article);
    }
}
