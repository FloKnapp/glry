<?php
/**
 * Class ImageEntity | ImageEntityEntity.php
 * @package Glry\Entity
 * @author Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Entity;

use Faulancer\ORM\Entity;

/**
 * Class ImageEntity
 * @package Glry\Entity
 *
 * @property integer created
 * @property integer updated
 * @property string  title
 * @property string  altTitle
 * @property integer size
 * @property string  mimeType
 * @property string  url
 */
class ImageEntity extends Entity
{

    protected static $relations = [
        'category' => [CategoryEntity::class, ['categoryId' => 'id']]
    ];

    protected static $tableName = 'image';

}