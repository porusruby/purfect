<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
        <?= $this->Html->link('New Posts', ['action' => 'add'],['class'=>'btn btn-primary']) ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Posts</strong>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td><?= h($post->title) ?></td>
                                    <td><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                                    <td><?= h($post->created) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->