<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\Category;
use BlogBundle\Entity\Feature;
use BlogBundle\Entity\Picture;
use BlogBundle\Entity\Picture_1;
use BlogBundle\Entity\Product;
use BlogBundle\Entity\Student;
use BlogBundle\Entity\Student_1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RelationsController extends Controller
{
    /**
     * @Route("/relations", name="relations_route")
     */
    public function relationsAction()
    {
        //EGYIRÁNYÚ kapcsolatok (csak az egyik Entitybe írjuk bele)

        //MANY TO ONE (many article can have one category)
        //1. Article.php (many oldalra) -> privete $category (get, set, schema update)
        //A Many-be kerül az új mező (idegen kulcs)

//        $em = $this->getDoctrine()->getManager();
//
//        $article = new Article();
//        $article->setDescription('Some description');
//        $article->setTitle('Some title');
//        $article->setContent('Some content');
//
//        $category = new Category();
//        $category->setName('Programming');
//
//        $article->setCategory($category);
//
//        $em->persist($article);
//        $em->persist($category);
//
//        $em->flush();
//
//        return new Response('Great!');

        //ONE TO ONE (one article can have only one picture)
        //1. Article.php -> amelyikbe szeretnénk az idegen kulcs mezőt, abba írunk

//        $em = $this->getDoctrine()->getManager();
//
//        $article = new Article();
//        $article->setDescription('Some description');
//        $article->setTitle('Some title');
//        $article->setContent('Some content');
//
//        $picture = new Picture();
//        $picture->setPath('some/path/name.png');
//        $picture->setType('image/png');
//
//        $article->setPicture($picture);
//
//        $em->persist($article);
//        $em->persist($picture);
//
//        $em->flush();
//
//        return new Response('Done!');

        //KÉTIRÁNYÚ kapcsolatok (mindkét Entitybe bele írjuk)

        //ONE TO ONE (one article <=> one picture)
        //Mindkét Entitybe írunk, amelyikbe a foreign keyt szeretnénk oda az eddigihez hasonlót
//
//        $em = $this->getDoctrine()->getManager();
//
//        $article = new Article();
//        $article->setDescription('Some description');
//        $article->setTitle('Some title');
//        $article->setContent('Some content');
//
//        $picture_1 = new Picture_1();
//        $picture_1->setPath('some/path/name.png');
//        $picture_1->setType('image/png');
//
//        $article->setPicture1($picture_1);
//
//        $em->persist($article);
//        $em->persist($picture_1);
//
//        $em->flush();
//
//        return new Response('Great!');

        //ONE TO MANY (one product has many features) or MANY TO ONE (many article can have one category)
        //A One to Many association has to be bidirectional always, if not you have to use a join table
        //This is because the "many" side in a one-to-many association holds the foreign key
        //This means there is no difference between a bidirectional one-to-many and a bidirectional many-to-one.

//        $em = $this->getDoctrine()->getManager();
//
//        $feature = new Feature();
//        $feature->setName('Some feature');
//
//        $product = new Product;
//        $product->setName('Some name');
//        $product->setSlug('Some slug');
//        $product->setPrice('777');
//        $product->setDescription('Some description');
//
//        $feature->setProduct($product);
//
//        $em->persist($feature);
//        $em->persist($product);
//
//        $em->flush();
//
//        return new Response('Done!');

        //ÖNMAGÁRA MUTATÓ KAPCSOLAT

        //ONE TO ONE (Student tábla: student-mentor)

//        $em = $this->getDoctrine()->getManager();
//
//        $student1 = new Student();
//        $student1->setName('Some name');
//
//        $student2 = new Student();
//        $student2->setName('Some name');
//
//        $student1->setMentor($student2);
//
//        $em->persist($student1);
//        $em->persist($student2);
//
//        $em->flush();
//
//        return new Response('Great!');

        //ONE TO MANY (Student_1 tábla: one mentor -> many student)

//        $em = $this->getDoctrine()->getManager();
//
//        $student1 = new Student_1();
//        $student1->setName('Some name');
//
//        $student2 = new Student_1();
//        $student2->setName('Some name');
//
//        $student1->setMentor($student2);
//        $student2->setMentor($student2);
//
//        $em->persist($student1);
//        $em->persist($student2);
//
//        $em->flush();
//
//        return new Response('Done!');
    }
}
