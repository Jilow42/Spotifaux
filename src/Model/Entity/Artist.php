<?php
// src/Model/Entity/Artist.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Artist extends Entity{


    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}