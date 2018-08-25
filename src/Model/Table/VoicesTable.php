<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Voices Model
 *
 * @property \App\Model\Table\PersonalitiesTable|\Cake\ORM\Association\BelongsTo $Personalities
 * @property \App\Model\Table\ScenesTable|\Cake\ORM\Association\BelongsTo $Scenes
 *
 * @method \App\Model\Entity\Voice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Voice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Voice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Voice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Voice|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Voice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Voice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Voice findOrCreate($search, callable $callback = null, $options = [])
 */
class VoicesTable extends Table
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

        $this->setTable('voices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Personalities', [
            'foreignKey' => 'personality_id'
        ]);
        $this->belongsTo('Scenes', [
            'foreignKey' => 'scene_id',
            'joinType' => 'INNER'
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
            ->numeric('length')
            ->allowEmpty('length');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['personality_id'], 'Personalities'));
        $rules->add($rules->existsIn(['scene_id'], 'Scenes'));

        return $rules;
    }
}
