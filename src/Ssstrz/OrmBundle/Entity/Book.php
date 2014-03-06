<?php

namespace Ssstrz\OrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BookRepository")
 */
class Book
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
     * @ORM\Column(name="isbn", type="string", length=15)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Ssstrz\OrmBundle\Entity\User", inversedBy="books")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    private $authors;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Ssstrz\OrmBundle\Entity\Ordered", mappedBy="item")
     */
    private $shipping;

    public function __construct() 
    {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->shipping = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set isbn
     *
     * @param integer $isbn
     * @return Book
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return integer 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add authors
     *
     * @param \Ssstrz\OrmBundle\Entity\User $authors
     * @return Book
     */
    public function addAuthor(\Ssstrz\OrmBundle\Entity\User $authors)
    {
        $this->authors[] = $authors;

        return $this;
    }

    /**
     * Remove authors
     *
     * @param \Ssstrz\OrmBundle\Entity\User $authors
     */
    public function removeAuthor(\Ssstrz\OrmBundle\Entity\User $authors)
    {
        $this->authors->removeElement($authors);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Add shipping
     *
     * @param \Ssstrz\OrmBundle\Entity\Ordered $shipping
     * @return Book
     */
    public function addShipping(\Ssstrz\OrmBundle\Entity\Ordered $shipping)
    {
        $this->shipping[] = $shipping;

        return $this;
    }

    /**
     * Remove shipping
     *
     * @param \Ssstrz\OrmBundle\Entity\Ordered $shipping
     */
    public function removeShipping(\Ssstrz\OrmBundle\Entity\Ordered $shipping)
    {
        $this->shipping->removeElement($shipping);
    }

    /**
     * Get shipping
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShipping()
    {
        return $this->shipping;
    }
}
