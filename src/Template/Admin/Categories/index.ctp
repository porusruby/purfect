<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
        <?= $this->Html->link('New Categories', ['action' => 'add'],['class'=>'btn btn-primary']) ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Categories</strong>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= h($category->name) ?></td>
                                <td><?= h($category->slug) ?></td>
                                <td><?= h($category->description) ?></td>
                                <td>
                                <?= $this->Html->link("<i class='fa fa-pencil-square-o'></i> Edit", ['action' => 'edit', $category->id],['class'=>'btn btn-info','escape'=>false]) ?>
                                <?= $this->Form->postLink("<i class='fa fa-trash-o'></i> Delete", ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete #{0} ?', $category->name),'class'=>'btn btn-danger','escape'=>false]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->