<?php

namespace Ssstrz\OrmBundle\Controller;

use DateTime;
use Ssstrz\OrmBundle\Entity\Book;
use Ssstrz\OrmBundle\Entity\Ordered;
use Ssstrz\OrmBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function checkOrderAction()
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('SsstrzOrmBundle:Book')->find(2);
        $user = $em->getRepository('SsstrzOrmBundle:User')->find(1);
        $order = new Ordered();
        $order->setItem($book);
        $book->addShipping($order);
        
        
        $order->setUser($user);
        $user->addOrder($order);
       
        $order->setDate(new \DateTime());
        $order->setStatus(false);
        
        $em->persist($user);
        $em->persist($order);
        $em->persist($book);
        $em->flush();
        
        return $this->render(
                'SsstrzOrmBundle:Default:checkOrders.html.twig',
                array(
                    'table1'   => array(),
                    'table2'     => array()
                )
        );
    }
    public function indexAction()
    {
        if (1 === 0) {
            $book = new Book();
            $book->setIsbn(123344322);
            $book->setPrice(12.58);

            $user = new User();
            $user->setName('Tomas');
            $user->setSurname('Van Hart');
            $user->setBorn(new DateTime('2014-02-26 12:38'));
            $user->setAge2(new DateTime('2000-02-26 23:38'));
            $user->addBook($book);
            $book->addAuthor($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->persist($user);
            $em->flush();
        }
        $em = $this->getDoctrine();
        $book = $em->getRepository('SsstrzOrmBundle:Book')->find(1);
        
        $author = $em->getRepository('SsstrzOrmBundle:User')->find(1);
        
        return $this->render(
                'SsstrzOrmBundle:Default:index.html.twig',
                array(
                    'authors'   => $book->getAuthors(),
                    'books'     => $author->getBooks()
                ));
    }
}
