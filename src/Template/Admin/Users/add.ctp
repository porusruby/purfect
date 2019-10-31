<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $user
 */
$this->assign('title','Add users')
?>
<a class="btn btn-warning" href="<?php echo $this->Url->build('/admin/users', true); ?>"><i class="fa fa-arrow-left"></i> Back</a>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <strong class="card-title">Data Users</strong>
                </div>
                <?= $this->Form->create($user,['type'=>'file']) ?>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control">
                            <option value="owner">Owner</option>
                            <option value="member">Member</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
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
