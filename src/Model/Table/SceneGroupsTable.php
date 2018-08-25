<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SceneGroups Model
 *
 * @method \App\Model\Entity\SceneGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\SceneGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SceneGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SceneGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SceneGroup|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SceneGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SceneGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SceneGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class SceneGroupsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('scene_groups');

        $this->hasMany('Scenes', [
            'foreignKey' => '1',
            'bindingKey' => '1',
            'conditions' => 'substr(Scenes.scene,1,9) = scene_groups.scene_group'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->scalar('scene_group')
                ->maxLength('scene_group', 9)
                ->requirePresence('scene_group', 'create')
                ->notEmpty('scene_group');

        return $validator;
    }

}
