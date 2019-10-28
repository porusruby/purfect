<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $page
 */
$this->assign('title','Add Pages')
?>
<a class="btn btn-warning" href="<?php echo $this->Url->build('/admin/pages', true); ?>"><i class="fa fa-arrow-left"></i> Back</a>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <strong class="card-title">Edit Page</strong>
                </div>
                <?= $this->Form->create($page,['type'=>'file']) ?>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= h($page->title) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="<?= h($page->slug) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" id="editor1" ><?= h($page->body) ?></textarea>
                    </div>
                    <label class="alert alert-info" for="">Search Engine Optimation</label>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="keyword-tab" data-toggle="tab" href="#keyword" role="tab" aria-controls="keyword" aria-selected="false">Keywords</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade" id="keyword" role="tabpanel" aria-labelledby="keyword-tab">
                            <textarea class="form-control" name="keyword" rows="5"><?= h($page->keyword) ?></textarea>
                        </div>
                        <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <textarea class="form-control" name="description" rows="5"><?= h($page->description) ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div><!-- .animated -->

