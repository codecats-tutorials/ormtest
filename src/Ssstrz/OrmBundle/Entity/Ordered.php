<?php

namespace Ssstrz\OrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordered
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ssstrz\OrmBundle\Entity\OrderedRepository")
 */
class Ordered
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Ssstrz\OrmBundle\Entity\User", inversedBy="orders", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Ssstrz\OrmBundle\Entity\Book", inversedBy="shipping", cascade={"all"}, fetch="EAGER")
     */
    private $item;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Ordered
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Ordered
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set book
     *
     * @param integer $book
     * @return Ordered
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return integer 
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Ordered
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set item
     *
     * @param \Ssstrz\OrmBundle\Entity\Book $item
     * @return Ordered
     */
    public function setItem(\Ssstrz\OrmBundle\Entity\Book $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Ssstrz\OrmBundle\Entity\Book 
     */
    public function getItem()
    {
        return $this->item;
    }
}
