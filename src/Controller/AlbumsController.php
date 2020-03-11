<?php
//src/Controller/AlbumsController.php

namespace App\Controller;

class AlbumsController extends AppController{

  public function index()
  {
    //on récup tt les albums de la base
    $listeAlbums = $this->Albums->find();

    $this->set(compact('listeAlbums'));
  }

  public function view($id)
  {
    $album =$this->Albums->get($id , [
        'contain' => ['Artists']
    ]);

    $this->set(compact('album'));
  }
  
  public function new()
  {
    //on crée une entiter vide
    $n = $this->Albums->newEntity();

    $res = $this->Albums->Artists->find()->select(
        ['id', 'pseudo'])->toArray();

    $allArtists =[];
    foreach ($res as $value) {
        $allArtists[$value['id']] = $value['pseudo'];
    }

    $this->set(compact('n', 'allArtists'));

    if ($this->request->is('post')) {
      //prend contenu des champs
      $n = $this->Albums->patchEntity($n, $this->request->getData());

      //si lien donner
      if (!empty($n->linkspotify)) {
          //on récupère juste le code
          $cut1 = explode('?' , $n->linkspotify); //coupe pour ?
          $step1 = $cut1[0];
          $cut2 = explode('/' , $step1);
          $step2 = array_pop($cut2);
          //place dans $n
          $n->linkspotify = $step2;

      }

      //try saving
      if ($this->Albums->save($n)) {
        $this->Flash->success('Ok');
        return $this->redirect(['action' => 'view', $n->id ]);
      }

      //error
      $this->Flash->error('Nope');
    }
      
  }//fin 

  public function edit($id){
    $e = $this->Albums->find()->where(['id' => $id]);

    //si on n'a pas trouvé d'album correspondat à cet id
    if($e->isEmpty()){
        $this->Flash->error('album inconnu');

        return $this->redirect(['action' => 'new']);
    }

    $fe = $e->first();

    $res = $this->Albums->Artists->find()->select(
        ['id', 'pseudo'])->toArray();

    $allArtists =[];
    foreach ($res as $value) {
        $allArtists[$value['id']] = $value['pseudo'];
    }

    $this->set(compact('allArtists'));    
    $this->set('e', $fe);

    //si on reçu un formulaire
    if($this->request->is(['post', 'put'])){
        $this->Albums->patchEntity($fe, $this->request->getData());

        if (!empty($fe->linkspotify)) {
          //on récupère juste le code
          $cut1 = explode('?' , $fe->linkspotify); //coupe pour ?
          $step1 = $cut1[0];
          $cut2 = explode('/' , $step1);
          $step2 = array_pop($cut2);
          //place dans $fe
          $fe->linkspotify = $step2;

      }
        if($this->Albums->save($fe)){
            $this->Flash->success('modifié');
            return $this->redirect(['action' => 'view', $fe->id]);
        }//fin de save

        $this->Flash->error('modif plantée');

    }//fin de si on a reçu un form
  }//fin edit

  public function delete($id) {
    $this->request->allowMethod(['post','delete']);
    $supp = $this->Albums->get($id);
    if ($this->Albums->delete($supp)) {
      $this->Flash->success('Supr OK');
    }else {
      $this->Flash->error('not supr');
      return $this->redirect(['action' => 'view', $id]);
    }
    return $this->redirect(['action' => 'index']);
  }//fin delete

  public function editcover($id)
  {   
    //récup donné de l'album
    $ec = $this->Albums->get($id);
    
    //transmet à view
    $this->set(compact('ec'));

    //stock ancien nom
    $vieux = $ec->cover;
    
    //if form (post,put)
    if($this->request->is(['post', 'put'])){

      //patchEntity
      $this->Albums->patchEntity($ec, $this->request->getData());

      //if format not good
      if (empty($this->request->getData()['cover']['name']) || !in_array(
        $this->request->getData()['cover']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])) {

        //not good + redirect view
        $this->Flash->error(' nut good format ');

      }else{//sinon
      
        //cut de l'extention
        $ext = pathinfo($this->request->getData()['cover']['name'], PATHINFO_EXTENSION);
                
        //build new name
        $newname = 'c-'.rand(0,999).'-'.time().'.'.$ext; 


        //place dans //webroot/img/covers
        move_uploaded_file($this->request->getData()['cover']['tmp_name'], WWW_ROOT.'img/covers/'.$newname);

        //place new name
        $ec->cover = $newname ;

        //if
        if ($this->Albums->save($ec)) {
          //save + success
          $this->Flash->success('Ok save'); 
          
          //if ancien
          if (!empty($vieux) && file_exists(WWW_ROOT.'img/covers/'.$vieux)) {                 

            //supr
            unlink(WWW_ROOT.'/img/covers/'.$vieux);

          }
          return $this->redirect(['action' => 'view' , $id]);

        }else{//else

          //error
          $this->Flash->error(' nope ');
        }
      }

    }//fin form

  }//fin editCover

}//fin class
