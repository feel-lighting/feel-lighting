<?php

namespace AppBundle\Entity;

use ZIMZIM\CategoryProductBundle\Model\ItemHome\ItemHome as baseItemHome;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="ItemHomeRepository")
 * @ORM\Table(name="zimzim_itemhome")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"ItemHomeCategory" = "ItemHomeCategory", "ItemHomeProduct" = "ItemHomeProduct"})
 * @ORM\HasLifecycleCallbacks
 *
 */
abstract class ItemHome extends baseItemHome
{

}
