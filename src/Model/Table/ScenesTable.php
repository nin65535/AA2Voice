<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scenes Model
 *
 * @property \App\Model\Table\VoicesTable|\Cake\ORM\Association\HasMany $Voices
 *
 * @method \App\Model\Entity\Scene get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scene newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Scene[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scene|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scene|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scene[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scene findOrCreate($search, callable $callback = null, $options = [])
 */
class ScenesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('scenes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Voices', [
            'foreignKey' => 'scene_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('scene')
            ->maxLength('scene', 255)
            ->requirePresence('scene', 'create')
            ->notEmpty('scene');

        return $validator;
    }
    
    public function findStatistics( $query , $options ){
        $query->group('substr(scene,1,2)')
                ->select([
                    'category'=>'substr(scene,1,2)',
                    'all'=>'count(id)',
                    'titled'=>'count(CASE WHEN title is null OR title = \'\' THEN null ELSE 1 END)'
                ]);
        return $query;
    }
}
