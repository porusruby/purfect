<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->assign('title','Edit Post');
?>
<a class="btn btn-warning" href="<?php echo $this->Url->build('/admin/posts', true); ?>"><i class="fa fa-arrow-left"></i> Back</a>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <strong class="card-title">Data Posts</strong>
                </div>
                <?= $this->Form->create($post,['type'=>'file']) ?>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= h($post->title) ?>">
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('category_id', ['options' => $category, 'empty' => 'Select Category','class'=>'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" id="editor1" ><?= h($post->body) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label><br>
                        <img src="<?php echo $this->Url->image("/uploads/").$post->image ?>" style="max-height:200px">
                        <input type="file" name="myFile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Published</label>
                        <div class="text-left">
                        <?php echo $this->Form->control('published',['class'=>'form-control','label'=>false,'style'=>'width:5%']) ?>
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
