<?php
//src/Model/Table/AlbumsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AlbumsTable extends Table{

  public function initialize(array $config)
  {
    // gérer la colone created modified
    $this->addBehavior('Timestamp');

    $this->belongsTo('Artists', [
        'foreignKey' => 'artist_id',
        'joinType' => 'left'
      ]);
  }
  public function validationDefault(Validator $v) {
    $v->notEmpty('title')
    ->add('title' , [
      'length' => [
        'rule' => ['maxLength' , 100],
        'message' => 'Le titre doit faire moins de 100 caractères',]
        ])
      ->notEmpty('artist_id')
      ->allowEmpty('releasedate')
      ->allowEmpty('nbtracks')
      ->allowEmpty('linkspotify')
      ->add('linkspotify' , [
        'length' => [
          'rule' => ['maxLength' , 250],
          'message' => 'Le lien doit faire moins de 250 caractères',]
        ])->allowEmpty('cover');
    return $v;
  }
}
