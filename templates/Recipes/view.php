<!--Header-->
<div class="row text-secondary">
    <div class="col-10">
        <h1 class="my-0 page_title fw-bold"><?= h($title); ?></h1>
        <h6 class="sub_title text-muted fw-light"><?= h($system_name); ?></h6>
    </div>
    <div class="col-2 text-end">
        <div class="dropdown mx-3 mt-2">
            <button class="btn p-0 border-0" type="button" id="orderStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="orderStatistics">
                <li><?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id], ['class' => 'dropdown-item']); ?></li>
                <li><?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'dropdown-item']); ?></li>
                <li><hr class="dropdown-divider"></li>
                <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index'], ['class' => 'dropdown-item']); ?></li>
                <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add'], ['class' => 'dropdown-item']); ?></li>
            </ul>
        </div>
    </div>
</div>
<hr class="mb-4">
<!--/Header-->

<div class="row">
    <!-- Recipe Details -->
    <div class="col-md-8">
        <div class="card rounded-0 shadow border-0">
            <div class="card-body">
                <h2 class=" fw-bold mb-3"><?= h($recipe->name); ?></h2>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="text-secondary">By: <?= $recipe->hasValue('user') ? $this->Html->link($recipe->user->fullname, ['controller' => 'Users', 'action' => 'view', $recipe->user->id]) : 'Unknown'; ?></span>
                    <span class="text-secondary">Category: <?= $recipe->hasValue('category') ? $this->Html->link($recipe->category->name, ['controller' => 'Categories', 'action' => 'view', $recipe->category->id]) : 'Uncategorized'; ?></span>
                </div>
                
                <!-- Recipe Images -->
                <div class="mb-4">
                    <h5 class="text-secondary">Photos</h5>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <?= $this->Html->image('../files/Recipes/photo/' . $recipe->photo, ['class' => 'img-fluid rounded shadow']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Html->image('../files/Recipes/photo2/' . $recipe->photo2, ['class' => 'img-fluid rounded shadow']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Html->image('../files/Recipes/photo3/' . $recipe->photo3, ['class' => 'img-fluid rounded shadow']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Html->image('../files/Recipes/photo4/' . $recipe->photo4, ['class' => 'img-fluid rounded shadow']); ?>
                        </div>
                    </div>
                </div>

                <!-- Recipe Details Table -->
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= $this->Number->format($recipe->id); ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $this->Number->format($recipe->status); ?></td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td><?= h($recipe->created); ?></td>
                    </tr>
                    <tr>
                        <th>Modified</th>
                        <td><?= h($recipe->modified); ?></td>
                    </tr>
                </table>

                <style>
                    .small-text {
                font-size: 15px; 
                    }
                </style>
                <!-- Ingredients Section -->
                <div class="mb-4">
                    <h5 class="text-secondary">Ingredients</h5>
                    <blockquote class="blockquote  p-3 rounded sm small-text">
                    <?= h($this->CustomHtml->convertHtmlToPlainText($recipe->ingredient)); ?>
                    </blockquote>
                </div>

                <!-- Steps Section -->
                <div class="mb-4">
                    <h5 class="text-secondary">Steps</h5>
                    <blockquote class="blockquote p-3 rounded sm small-text">
                    <?= h($this->CustomHtml->convertHtmlToPlainText($recipe->step)); ?>
                    </blockquote>
                </div>

                <div class='text-end'>
                <?= $this->Html->link(
                    'Download Recipe',
                 ['action' => 'pdf', $recipe->id], 
                 ['class' => 'btn btn-primary']); ?>
            </div>
            </div>
        </div>
    </div>

   
</div>
