<?php

namespace AppBundle\Entity;

use ZIMZIM\CategoryProductBundle\Model\CategoryProduct\Product as baseProduct;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Class Product
 * @package ZIMZIM\CPBundle\Entity
 *
 * @ORM\Table(name="zimzizm_product")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProductRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Product extends baseProduct
{

    /**
     * @var string
     *
     * @Gedmo\Translatable
     *
     * @ORM\Column(name="feature", type="text", nullable=true)
     *
     * @GRID\Column(operatorsVisible=false, visible=false, filterable=false)
     */
    protected $feature;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     *
     * @ORM\Column(name="listing", type="text", nullable=true)
     *
     * @GRID\Column(operatorsVisible=false, visible=false, filterable=false)
     */
    protected $listing;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     *
     * @ORM\Column(name="specification", type="text", nullable=true)
     *
     * @GRID\Column(operatorsVisible=false, visible=false, filterable=false)
     */
    protected $specification;


    /**
     * @ORM\OneToMany(targetEntity="CategoryProduct", mappedBy="product")
     * @ORM\OrderBy({"position" = "ASC"}))
     **/
    protected $categoryproducts;

    /**
     * @param mixed $categoryproducts
     */
    public function setCategoryproducts($categoryproducts)
    {
        $this->categoryproducts = $categoryproducts;
    }

    /**
     * @return mixed
     */
    public function getCategoryproducts()
    {
        return $this->categoryproducts;
    }

    /**
     * @param string $feature
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param string $listing
     */
    public function setListing($listing)
    {
        $this->listing = $listing;
    }

    /**
     * @return string
     */
    public function getListing()
    {
        return $this->listing;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $specification
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;
    }

    /**
     * @return string
     */
    public function getSpecification()
    {
        return $this->specification;
    }
}