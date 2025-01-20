<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Recipe newEmptyEntity()
 * @method \App\Model\Entity\Recipe newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipe> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Recipe findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Recipe> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Recipe saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recipe>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recipe> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('recipes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('name')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['name'],
				]);

                $this->addBehavior('Josegonzalez/Upload.Upload', [
                    'photo' => [
                        'fields' => [
                            'dir' => 'photo_dir',
                        ],
                    ],
                    'photo2' => [
                        'fields' => [
                            'dir' => 'photo2_dir',
                        ],
                    ],
                    'photo3' => [
                        'fields' => [
                            'dir' => 'photo3_dir',
                        ],
                    ],
                    'photo4' => [
                        'fields' => [
                            'dir' => 'photo4_dir',
                        ],
                    ],
                ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
            // $validator                       
            //     ->integer('users_id')
            //     ->notEmptyString('users_id');

            // $validator
            //     ->scalar('name')
            //     ->maxLength('name', 50)
            //     ->requirePresence('name', 'create')
            //     ->notEmptyString('name');
    
            // $validator
            //     ->scalar('ingredient')
            //     ->requirePresence('ingredient', 'create')
            //     ->notEmptyString('ingredient');

            // $validator
            //     ->scalar('step')
            //     ->requirePresence('step', 'create')
            //     ->notEmptyString('step');

            // $validator
            //     ->integer('category_id')
            //     ->notEmptyString('category_id');

            // $validator
            //     ->integer('status')
            //     ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'), ['errorField' => 'users_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }

    public function generatePdf(array $recipes): string
{
    // Use your preferred PDF library to create and format the PDF
    $pdf = new \SomePdfLibrary();
    foreach ($recipes as $recipe) {
        $content = "<h1>{$recipe->title}</h1><p>{$recipe->ingredients}</p><p>{$recipe->steps}</p>";
        $pdf->addPage($content);
    }

    return $pdf->output(); // Adjust based on your library's output method
}
}
