<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DqlController extends Controller
{
    /**
     * @Route("/example_one", name="example_one_route")
     */
    public function exampleOneAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BlogBundle:Product');
        $productId = 1;

        //query for a single product by its primary key
        $product = $repository->find($productId);

        //find a single product based on a column value
        $product = $repository->findOneById($productId);
        $product = $repository->findOneByName('keyboard');

        //find a group of products based on a column value
        $products = $repository->findByPrice('2.00');

        //find all products
        $products = $repository->findAll();

        //query for a single product based on more column value
        $product = $repository->findOneBy(
            array('name' => 'keyboard', 'price' => '2.00')
        );

        //query a group of products based on more conditions
        $products = $repository->findBy(
            array('name' => 'keyboard'),
            array('price' => 'ASC')
        );
    }

    /**
     * @Route("/example_two/{title}", name="example_two_route")
     */
    public function exampleTwoAction($title)
    {
        //DQL A vátozat
//        $em = $this->getDoctrine()->getManager();
//
//        $query = $em->createQuery(
//            'SELECT a FROM BlogBundle:Article a
//            WHERE a.title LIKE :title')
//            ->setParameter('title', '%' . $title . '%');
//
//        $articles = $query->getResult();
//        //$query->setMaxResults(1)->getOneOrNullResult();
//
//        var_dump($articles);

        //DQL B változat (Repositoryból)
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BlogBundle:Article');
        $articles = $repository->findArticlesWhereTitleInclude($title);

        var_dump($articles);
        exit;
    }
}
