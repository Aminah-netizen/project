<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
echo $this->Html->script('https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js');
//echo $this->Html->script('https://unpkg.com/feather-icons'); 
echo $this->Html->script('ckeditor/ckeditor.js');
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars-staggered"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($recipe, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Recipe') ?></legend>
                
                <?php
                    echo $this->Form->hidden('user_id');
                    echo $this->Form->control('name');
                    ?>
            
                    <div class="row g-6">
                    <div class="col">
                    <?php
                    echo $this->Form->control('photo', ['label'=>'Photo', 'class'=>'form-control','type' => 'file']);
                    echo $this->Form->hidden('photo_dir');
                    ?>
                     </div>
                    <div class="col">
                    <?php
                    echo $this->Form->control('photo2' , ['label'=>'Photo 2', 'class'=>'form-control','type' => 'file' ]);
                    echo $this->Form->hidden('photo2_dir', ['type' => 'file']);
                    ?>
                    </div> 
                    <div class="col">
                    <?php
                    echo $this->Form->control('photo3' , ['label'=>'Photo 3', 'class'=>'form-control','type' => 'file' ]);
                    echo $this->Form->hidden('photo3_dir', ['type' => 'file']);
                    ?>
                    </div> 
                    <div class="col">
                    <?php
                    echo $this->Form->control('photo4' , ['label'=>'Photo 4', 'class'=>'form-control','type' => 'file' ]);
                    echo $this->Form->hidden('photo4_dir', ['type' => 'file']);
                    ?>
                    </div> 
                    
                    <style>
								.ck-editor__editable_inline {
									min-height: 150px;
								}
							</style>
                    <?php echo $this->Form->control('ingredient', ['required' => false, 'id' => 'ckeditor_ingredient', 'label' => 'Ingredient', 'class'=>'form-control']); ?>
							<script>
								ClassicEditor
									.create(document.querySelector('#ckeditor_ingredient'))
									.catch(error => {
										console.error(error);
									});
							</script>

                            <style>
								.ck-editor__editable_inline {
									min-height: 150px;
								}
							</style>
                        <?php echo $this->Form->control('step', ['required' => false, 'id' => 'ckeditor_step', 'label' => 'Step', 'class'=>'form-control']); ?> 
                    
                        	<script>
								ClassicEditor
									.create(document.querySelector('#ckeditor_step'))
									.catch(error => {
										console.error(error);
									});
							</script>
                
                    <div class="input-group">
                    <?php
                    echo $this->Form->control('category_id', ['options' => $categories, 'class'=>'form-select', 'empty' => 'Choose category',]);
                    ?>
                     </div> 
                    
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>
