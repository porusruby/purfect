<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
        <?= $this->Html->link("<i class='fa fa-pencil'></i> New Post", ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pages</strong>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($pages as $page): ?>
                                <tr>
                                    <td><?= h($page->title) ?></td>
                                    <td><?= h($page->modified) ?></td>
                                    <td><?= $this->Html->link("<i class='fa fa-pencil-square-o'></i> Edit", ['action' => 'edit', $page->id],['class'=>'btn btn-info','escape'=>false]) ?>
                                        <?= $this->Form->postLink("<i class='fa fa-trash-o'></i> Delete", ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id),'class'=>'btn btn-danger','escape'=>false]) ?>
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