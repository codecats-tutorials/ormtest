<?php

namespace Ssstrz\OrmBundle\Controller;

use Ssstrz\OrmBundle\Entity\Book;
use Ssstrz\OrmBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if (1 === 0) {
            $book = new Book();
            $book->setIsbn(123344322);
            $book->setPrice(12.58);

            $user = new User();
            $user->setName('Tomas');
            $user->setSurname('Van Hart');
            $user->setBorn(new \DateTime('2014-02-26 12:38'));
            $user->setAge2(new \DateTime('2000-02-26 23:38'));
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
