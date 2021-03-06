<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Notice", mappedBy="categories")
     */
    private $notices;

    public function __construct() {
        $this->notices = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Add notice
     *
     * @param \AppBundle\Entity\Notice $notice
     *
     * @return Category
     */
    public function addNotice(\AppBundle\Entity\Notice $notice)
    {
        $this->notices[] = $notice;

        return $this;
    }

    /**
     * Remove notice
     *
     * @param \AppBundle\Entity\Notice $notice
     */
    public function removeNotice(\AppBundle\Entity\Notice $notice)
    {
        $this->notices->removeElement($notice);
    }

    /**
     * Get notices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotices()
    {
        return $this->notices;
    }
}
