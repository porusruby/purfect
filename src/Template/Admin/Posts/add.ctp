<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->assign('title','Add Posts')
?>
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
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" id="editor1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="myFile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Published</label>
                        <select name="published" >
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
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
