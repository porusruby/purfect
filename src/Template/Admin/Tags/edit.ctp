<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\tag $tag
 */
$this->assign('title','Add Categories')
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <strong class="card-title">Form Tag</strong>
                </div>
                <?= $this->Form->create($tag,['type'=>'file']) ?>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"  class="form-control" value="<?php echo $tag->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" value="<?php echo $tag->slug ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id=""  rows="5"><?php echo $tag->description ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-dot-circle-o"></i> Update</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div><!-- .animated -->
