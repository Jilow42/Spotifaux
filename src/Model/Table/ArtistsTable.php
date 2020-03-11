<?php

//src/Model/Table/ArtistsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArtistsTable extends Table {


    public function initialize(array $config){
        //gere tout seul les colonnes 'created' et 'modified'
        $this->addBehavior('Timestamp');

        $this->hasMany('Albums', ['foreignKey' => 'artist_id']);
    } //fin initialize


    public function validationDefault(Validator $v){
        $v->notEmpty('pseudo')
            ->maxLength('pseudo', 50)
            ->allowEmpty('birthdate')
            ->allowEmpty('description');
        return $v;
    }
}
