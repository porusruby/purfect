<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
        <?= $this->Html->link('New tags', ['action' => 'add'],['class'=>'btn btn-primary']) ?>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Tags</strong>
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
                            <?php foreach ($tags as $tag): ?>
                            <tr>
                                <td><?= h($tag->name) ?></td>
                                <td><?= h($tag->slug) ?></td>
                                <td><?= h($tag->description) ?></td>
                                <td>
                                <?= $this->Html->link("<i class='fa fa-pencil-square-o'></i> Edit", ['action' => 'edit', $tag->id],['class'=>'btn btn-info','escape'=>false]) ?>
                                <?= $this->Form->postLink("<i class='fa fa-trash-o'></i> Delete", ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete #{0} ?', $tag->name),'class'=>'btn btn-danger','escape'=>false]) ?>
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