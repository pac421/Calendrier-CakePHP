<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Calendar extends Entity
{
    protected $_accesible = [
        '*' => true,
        'id' => false,
        'created' => false
    ];
}
