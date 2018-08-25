<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personalities Model
 *
 * @property \App\Model\Table\VoicesTable|\Cake\ORM\Association\HasMany $Voices
 *
 * @method \App\Model\Entity\Personality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Personality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personality|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personality findOrCreate($search, callable $callback = null, $options = [])
 */
class PersonalitiesTable extends Table
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

        $this->setTable('personalities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Voices', [
            'foreignKey' => 'personality_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('actor')
            ->maxLength('actor', 255)
            ->requirePresence('actor', 'create')
            ->notEmpty('actor');

        $validator
            ->scalar('sample')
            ->maxLength('sample', 255)
            ->requirePresence('sample', 'create')
            ->notEmpty('sample');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        return $validator;
    }
}
