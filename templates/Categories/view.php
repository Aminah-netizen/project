<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
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
							<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="row">
	<div class="col-md-9">
		<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
			<div class="card-body text-body-secondary">
            <h3><?= h($category->name) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($category->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            </div>

			</div>
		</div>
		
            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related Recipes') ?></h4>
                <?php if (!empty($category->recipes)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr class="text-center">
                            <th><?= __('Id') ?></th>
                            <th><?= __('Users Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->recipes as $recipes) : ?>
                        <tr class="text-center">
                            <td><?= h($recipes->id) ?></td>
                            <td><?= h($recipes->users_id) ?></td>
                            <td><?= h($recipes->name) ?></td>
                            <td><?= h($recipes->category_id) ?></td>
                            <td>
                        <?php
                        if ($category->status == 1) {
                        echo '<span class="badge text-bg-success">Active</span>';
                        } elseif ($user->status == 0) {
                        echo '<span class="badge text-bg-danger">Inactive</span>';
                        } else {
                        echo '<span class="badge text-bg-warning">Warning</span>';
                        }
                    ?>
                    </td>

                            <td><?= h($category->created) ?></td>
                            <td class="actions text-center">
                            <div class="btn-group shadow" role="group" aria-label="Basic example">
                            <?= $this->Html->link(
								__('<i class="fa-solid fa-eye"></i>'), 
								['action' => 'view', $category->id], 
								['class' => 'btn btn-outline-primary btn-xs', 'escapeTitle' => false]
							) ?>

							<?= $this->Html->link(__('<i class="fa-regular fa-pen-to-square"></i>'), ['action' => 'edit', $category->id], ['class' => 'btn btn-outline-warning btn-xs', 'escapeTitle' => false]) ?>
							<?php $this->Form->setTemplates([
								'confirmJs' => 'addToModal("{{formName}}"); return false;'
							]); ?>
							<?= $this->Form->postLink(
								__('<i class="fa-regular fa-trash-can"></i>'),
								['action' => 'delete', $category->id],
								[
									'confirm' => __('Are you sure you want to delete Recipes: "{0}"?', $category->id),
									'title' => __('Delete'),
									'class' => 'btn btn-outline-danger btn-xs',
									'escapeTitle' => false,
									'data-bs-toggle' => "modal",
									'data-bs-target' => "#bootstrapModal"
								]
							) ?>
						</div>

                            
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>

		
	</div>
</div>




