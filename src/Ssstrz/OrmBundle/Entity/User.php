<?php

namespace Ssstrz\OrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="born", type="datetime")
     */
    private $born;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="age2", type="datetime")
     */
    private $age2;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="authors")
     */
    private $books;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Ssstrz\OrmBundle\Entity\Ordered", mappedBy="user")
     */
    private $orders;
    
    public function __construct() 
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     * @return User
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime 
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set age2
     *
     * @param \DateTime $age2
     * @return User
     */
    public function setAge2($age2)
    {
        $this->age2 = $age2;

        return $this;
    }

    /**
     * Get age2
     *
     * @return \DateTime 
     */
    public function getAge2()
    {
        return $this->age2;
    }

    /**
     * Add books
     *
     * @param \Ssstrz\OrmBundle\Entity\Book $books
     * @return User
     */
    public function addBook(\Ssstrz\OrmBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \Ssstrz\OrmBundle\Entity\Book $books
     */
    public function removeBook(\Ssstrz\OrmBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Add orders
     *
     * @param \Ssstrz\OrmBundle\Entity\Ordered $orders
     * @return User
     */
    public function addOrder(\Ssstrz\OrmBundle\Entity\Ordered $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Ssstrz\OrmBundle\Entity\Ordered $orders
     */
    public function removeOrder(\Ssstrz\OrmBundle\Entity\Ordered $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
