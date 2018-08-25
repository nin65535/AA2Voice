<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Scenes Controller
 *
 * @property \App\Model\Table\ScenesTable $Scenes
 *
 * @method \App\Model\Entity\Scene[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScenesController extends AppController {

    public $paginate = [
        'limit' => 20,
    ];

    public function index($category = null) {
        $query = $this->loadModel('SceneGroups')->find()
                ->select('scene_group');
        if ($category) {
            $query->where(['substr(scene_group,1,2)' => $category]);
        }

        $scene_groups = $this->_getSceneGroups($query);

        $personalities = $this->loadModel('Personalities')->find();
        $this->set(compact('personalities', 'scene_groups'));
    }

    protected function _getSceneGroups($query) {
        $sceneGroups = $this->Paginate($query);


        $labels = Hash::extract($sceneGroups->toArray(), '{n}.scene_group');


        $scenes = $this->Scenes->find()
                ->where(['substr(scene,1,9) IN' => $labels])
                ->contain('Voices');

        foreach ($sceneGroups as $sceneGroup) {
            $scenes_in_group = [];
            foreach ($scenes as $scene) {
                if (strpos($scene->scene, $sceneGroup->scene_group) === 0) {
                    $scenes_in_group[] = $scene;
                }
            }

            $sceneGroup->scenes = $scenes_in_group;
        }

        return $sceneGroups;
    }

    public function setTitle() {
        
        if( !$this->request->is('post') || !$this->request->is('ajax')){
            throw new \InvalidArgumentException;
        }
        
        $scene = $this->Scenes->get($this->request->getData('scene_id'));
        $scene = $this->Scenes->patchEntity( $scene , ['title'=>$this->request->getData('title')]);
        
        $data = $this->Scenes->save($scene);
        
        $this->set([
            'data' => $data,
            '_serialize' => ['data'],
        ]);
    }

}
