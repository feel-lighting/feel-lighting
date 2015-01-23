<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ItemHomeCategory
 * @package ZIMZIM\AppBundle\Entity
 *
 * @ORM\Entity
 */
class ItemHomeCategory extends ItemHome
{

    const TYPE_ITEMHOME = 'category';

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     *
     */
    protected $category;

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function getAttributeLink(){
        return array('slug' => $this->category->getSlug());
    }
}
