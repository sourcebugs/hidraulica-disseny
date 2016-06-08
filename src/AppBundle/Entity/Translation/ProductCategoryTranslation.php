<?php

namespace AppBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * Class ProductCategoryTranslation
 *
 * @category Translation
 * @package  AppBundle\Entity\Translation
 * @author   David Romaní <david@flux.cat>
 *
 * @ORM\Entity
 * @ORM\Table(name="product_category_translation",
 *   uniqueConstraints={@ORM\UniqueConstraint(name="lookup_product_category_unique_idx", columns={
 *     "locale", "object_id", "field"
 *   })}
 * )
 */
class ProductCategoryTranslation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductCategory", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}
