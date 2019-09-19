<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/create_article", name="create_article_route")
     */
    public function createArticleRouteAction()
    {
        $article = new Article();
        $article->setTitle('Learn Symfony 3');
        $article->setDescription('Learn Symfony 3 in Stack Academy the easy way');
        $article->setContent('Welcome to our latest series tutorial ...');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response("Saved new Article with id = " . $article->getId());
    }

    /**
     * @Route("/show_article/{idArticle}", name="show_article_route")
     */
    public function showArticleAction($idArticle)
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository('BlogBundle:Article');
        $article = $articleRepository->find($idArticle);

        if(is_null($article)){
            throw $this->createNotFoundException('No articel found for id: ' . $idArticle);
        }

        return $this->render('@Blog\Default\article.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/update_article/{idArticle}", name="update_article_route")
     */
    public function updateArticleAction($idArticle)
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository('BlogBundle:Article');
        $article = $articleRepository->find($idArticle);

        if(is_null($article)){
            throw $this->createNotFoundException('No article found for id: ' . $idArticle);
        }

        $article->setTitle('Learn Symfony 3 the right way');

        $em->flush();

        return new Response("Saved new article with id = " . $article->getID());
    }

    /**
     * @Route("/delete_article/{idArticle}", name="delete_article_route")
     */
    public function deleteArticleAction($idArticle)
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository('BlogBundle:Article');
        $article = $articleRepository->find($idArticle);

        if(is_null($article)){
            throw $this->createNotFoundException('No article found for id: ' . $idArticle);
        }

        $em->remove($article);
        $em->flush();

        return new Response("Changes was saved");
    }
}
