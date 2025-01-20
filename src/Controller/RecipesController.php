<?php
declare(strict_types=1);

namespace App\Controller;

use AuditStash\Meta\RequestMetadata;
use Cake\Event\EventManager;
use Cake\Routing\Router;

/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 */
class RecipesController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			'actions' => ['index'],
		]);
        $this->viewBuilder()->setHelpers(['CustomHtml']);
	}
	
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
	}

	/*public function viewClasses(): array
    {
        return [JsonView::class];
		return [JsonView::class, XmlView::class];
    }*/
	
	public function json()
    {
		$this->viewBuilder()->setLayout('json');
        $this->set('recipes', $this->paginate());
        $this->viewBuilder()->setOption('serialize', 'recipes');
    }
	
	public function csv()
	{
		$this->response = $this->response->withDownload('recipes.csv');
		$recipes = $this->Recipes->find();
		$_serialize = 'recipes';

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('recipes', '_serialize'));
	}
	
	public function pdfList()
	{
		$this->viewBuilder()->enableAutoLayout(false); 
        $this->paginate = [
            'contain' => ['Users', 'Categories'],
			'maxLimit' => 10,
        ];
		$recipes = $this->paginate($this->Recipes);
		$this->viewBuilder()->setClassName('CakePdf.Pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, 
				'filename' => 'recipes_List.pdf' 
			]
		);
		$this->set(compact('recipes'));
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

		$this->set('title', 'Recipes List');
		$this->paginate = [
			'maxLimit' => 10,
        ];
        $query = $this->Recipes->find('search', search: $this->request->getQueryParams())
            ->contain(['Users', 'Categories']);
			//->where(['title IS NOT' => null])
        $recipes = $this->paginate($query);
		
		//count
		$this->set('total_recipes', $this->Recipes->find()->count());
		$this->set('total_recipes_archived', $this->Recipes->find()->where(['status' => 2])->count());
		$this->set('total_recipes_active', $this->Recipes->find()->where(['status' => 1])->count());
		$this->set('total_recipes_disabled', $this->Recipes->find()->where(['status' => 0])->count());
		
		//Count By Month
		$this->set('january', $this->Recipes->find()->where(['MONTH(created)' => date('1'), 'YEAR(created)' => date('Y')])->count());
		$this->set('february', $this->Recipes->find()->where(['MONTH(created)' => date('2'), 'YEAR(created)' => date('Y')])->count());
		$this->set('march', $this->Recipes->find()->where(['MONTH(created)' => date('3'), 'YEAR(created)' => date('Y')])->count());
		$this->set('april', $this->Recipes->find()->where(['MONTH(created)' => date('4'), 'YEAR(created)' => date('Y')])->count());
		$this->set('may', $this->Recipes->find()->where(['MONTH(created)' => date('5'), 'YEAR(created)' => date('Y')])->count());
		$this->set('jun', $this->Recipes->find()->where(['MONTH(created)' => date('6'), 'YEAR(created)' => date('Y')])->count());
		$this->set('july', $this->Recipes->find()->where(['MONTH(created)' => date('7'), 'YEAR(created)' => date('Y')])->count());
		$this->set('august', $this->Recipes->find()->where(['MONTH(created)' => date('8'), 'YEAR(created)' => date('Y')])->count());
		$this->set('september', $this->Recipes->find()->where(['MONTH(created)' => date('9'), 'YEAR(created)' => date('Y')])->count());
		$this->set('october', $this->Recipes->find()->where(['MONTH(created)' => date('10'), 'YEAR(created)' => date('Y')])->count());
		$this->set('november', $this->Recipes->find()->where(['MONTH(created)' => date('11'), 'YEAR(created)' => date('Y')])->count());
		$this->set('december', $this->Recipes->find()->where(['MONTH(created)' => date('12'), 'YEAR(created)' => date('Y')])->count());

		$query = $this->Recipes->find();

        $expectedMonths = [];
        for ($i = 11; $i >= 0; $i--) {
            $expectedMonths[] = date('M-Y', strtotime("-$i months"));
        }

        $query->select([
            'count' => $query->func()->count('*'),
            'date' => $query->func()->date_format(['created' => 'identifier', "%b-%Y"]),
            'month' => 'MONTH(created)',
            'year' => 'YEAR(created)'
        ])
            ->where([
                'created >=' => date('Y-m-01', strtotime('-11 months')),
                'created <=' => date('Y-m-t')
            ])
            ->groupBy(['year', 'month'])
            ->orderBy(['year' => 'ASC', 'month' => 'ASC']);

        $results = $query->all()->toArray();

        $totalByMonth = [];
        foreach ($expectedMonths as $expectedMonth) {
            $found = false;
            $count = 0;

            foreach ($results as $result) {
                if ($expectedMonth === $result->date) {
                    $found = true;
                    $count = $result->count;
                    break;
                }
            }

            $totalByMonth[] = [
                'month' => $expectedMonth,
                'count' => $count
            ];
        }

        $this->set([
            'results' => $totalByMonth,
            '_serialize' => ['results']
        ]);

        //data as JSON arrays for report chart
        $totalByMonth = json_encode($totalByMonth);
        $dataArray = json_decode($totalByMonth, true);
        $monthArray = [];
        $countArray = [];
        foreach ($dataArray as $data) {
            $monthArray[] = $data['month'];
            $countArray[] = $data['count'];
        }
        

        $this->set(compact('recipes', 'monthArray', 'countArray'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', 'Recipes Details');
        $recipe = $this->Recipes->get($id, contain: ['Users', 'Categories']);
        $this->set(compact('recipe'));

        $this->set(compact('recipe'));
    }

    public function pdf($id = null)
    {
    $this->viewBuilder()->enableAutoLayout(false);
        $recipe = $this->Recipes->get($id, contain: ['Users', 'Categories']);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'potrait',
                'download' => true,
                'filename' => 'Recipe_' . $id .'.pdf'
            ]
            );
           $this->set('recipe', $recipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', 'New Recipes');
		/*EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Add']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Recipes']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});*/
        $recipe = $this->Recipes->newEmptyEntity();
        if ($this->request->is('post')) { 
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            $recipe->users_id = $this->Authentication->getIdentity('id')->getIdentifier('id');
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $users = $this->Recipes->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Recipes->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('recipe', 'users', 'categories'));
    }
    
    
    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     public function pdfAll()
     {
         $this->viewBuilder()->enableAutoLayout(false); // Disable default layout
         $this->viewBuilder()->setClassName('CakePdf.Pdf'); // Use CakePdf
     
         $recipes = $this->Recipes->find('all', [
             'contain' => ['Users', 'Categories'], // Adjust associations as needed
         ])->toArray();
     
         $this->viewBuilder()->setOption('pdfConfig', [
             'orientation' => 'portrait',
             'download' => true,
             'filename' => 'All_Recipes.pdf',
         ]);
     
         $this->set(compact('recipes'));
     }
     

    public function edit($id = null)
    {
		$this->set('title', 'Recipes Edit');
		
        $recipe = $this->Recipes->get($id, [
            'contain' => [],
        ]);


     

        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
		$users = $this->Recipes->Users->find('list', limit: 200)->all();
		$categories = $this->Recipes->Categories->find('list', limit: 200)->all();
        $this->set(compact('recipe', 'users', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Recipes']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});

        if ((int)$recipe->users_id !== (int)$this->request->getSession()->read('Auth.User.id')) {
            $this->Flash->error(__('You are not authorized to delete this recipe.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function archived($id = null)
    {
		$this->set('title', 'Recipes Edit');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Archived']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Recipes']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $recipe = $this->Recipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
			$recipe->status = 2; //archived
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been archived.'));

				return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The recipe could not be archived. Please, try again.'));
        }
        $this->set(compact('recipe'));
    }
}
