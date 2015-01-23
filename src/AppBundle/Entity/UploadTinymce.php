<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use ZIMZIM\ToolsBundle\Model\UploadTinymce as base;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadTinymce
 *
 * @ORM\Table(name="zimzim_uploadtinymce")
 * @ORM\Entity(repositoryClass="ZIMZIM\ToolsBundle\Model\UploadTinymceRepository")
 * @ORM\HasLifecycleCallbacks
 *
 */
class UploadTinymce extends base
{
}
