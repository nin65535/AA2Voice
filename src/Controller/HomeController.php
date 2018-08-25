<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    public function dashboard(){
        $this->loadModel('Scenes');
        
        $scenes = $this->Scenes->find('statistics');
        
        $this->set(compact('scenes'));
                
    }
    
    public function play(){
        
    }
    
}
