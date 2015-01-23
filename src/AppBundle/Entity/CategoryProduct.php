<?php


namespace AppBundle\Entity;

use ZIMZIM\CategoryProductBundle\Model\CategoryProduct\CategoryProduct as baseCategoryProduct;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Category
 * @package ZIMZIM\AppBundle\Entity
 *
 * @ORM\Table(name="zimzim_categoryproduct")
 * @ORM\Entity
 */
class CategoryProduct extends baseCategoryProduct
{
    /**
     * @var Category
     *
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="categoryproducts", cascade={"persist"})
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id", nullable=FALSE)
     *
     **/
    protected $category;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="categoryproducts", cascade={"persist"})
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id", nullable=FALSE)
     *
     **/
    protected $product;
}