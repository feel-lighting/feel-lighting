<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ItemHomeProduct
 * @package ZIMZIM\AppBundle\Entity
 *
 * @ORM\Entity
 */
class ItemHomeProduct extends ItemHome
{

    const TYPE_ITEMHOME = 'product';

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     *
     */
    protected $product;

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function getAttributeLink(){
        return array('slug' => $this->product->getSlug());
    }
}
