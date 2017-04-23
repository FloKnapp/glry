<?php

namespace Glry\Entity;

use Faulancer\ORM\Entity;

/**
 * @property integer created
 * @property integer updated
 * @property string  name
 * @property string  description
 */
class CategoryEntity extends Entity
{

    /** @var array */
    protected static $relations = [
        'images' => [ImageEntity::class, 'category']
    ];

    protected static $tableName = 'category';

}