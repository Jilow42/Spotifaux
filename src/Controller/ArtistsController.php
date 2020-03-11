<?php
//src/Controller/ArtistsController.php

namespace App\Controller;

class ArtistsController extends AppController{

  public function index()
  {
    //on récup tt les artists de la base
    $listeArtists = $this->Artists->find();

    $this->set(compact('listeArtists'));
  }

  public function view($id)
  {
    $artist =$this->Artists->get($id, [
      'contain' => ['Albums']
    ]);
    
    $this->set(compact('artist'));
  }
  
  public function new()
  {
    //on crée une entiter vide
    $n = $this->Artists->newEntity();

    $this->set(compact('n'));

    if ($this->request->is('post')) {
      //prend contenu des champs
      $n = $this->Artists->patchEntity($n, $this->request->getData());

      //try saving
      if ($this->Artists->save($n)) {
        $this->Flash->success('Ok');
        return $this->redirect(['action' => 'view', $n->id ]);
      }

      //error
      $this->Flash->error('Nope');
    }
      
  }

  public function edit($id){
    $e = $this->Artists->find()->where(['id' => $id]);

    //si on n'a pas trouvé d'artiste correspondat à cet id
    if($e->isEmpty()){
        $this->Flash->error('artiste inconnu');

        return $this->redirect(['action' => 'new']);
    }

    $fe = $e->first();
    
    $this->set('e', $fe);

    //si on reçu un formulaire
    if($this->request->is(['post', 'put'])){
        $this->Artists->patchEntity($fe, $this->request->getData());
        if($this->Artists->save($fe)){
            $this->Flash->success('modifié');
            return $this->redirect(['action' => 'view', $fe->id]);
        }//fin de save

        $this->Flash->error('modif plantée');

    }//fin de si on a reçu un form
  }//fin edit

  public function delete($id) {
    $this->request->allowMethod(['post','delete']);
    $supp = $this->Artists->get($id);
    if ($this->Artists->delete($supp)) {
      $this->Flash->success('Supr OK');
    }else {
      $this->Flash->error('not supr');
      return $this->redirect(['action' => 'view', $id]);
    }
    return $this->redirect(['action' => 'index']);
  }//fin delete

}//fin class
