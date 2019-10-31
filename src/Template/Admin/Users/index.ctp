<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$no=1;
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
        <?= $this->Html->link("<i class='fa fa-pencil'></i> New Users", ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Users</strong>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= h($user->fullname) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->is_active) ?></td>
                                    <td><?= $this->Html->link("<i class='fa fa-pencil-square-o'></i> Edit", ['action' => 'edit', $user->id],['class'=>'btn btn-info','escape'=>false]) ?>
                                        <?= $this->Form->postLink("<i class='fa fa-trash-o'></i> Delete", ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-danger','escape'=>false]) ?>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
