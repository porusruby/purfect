<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $user
 */
$this->assign('title','Setting Account')
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <strong class="card-title">My Account</strong>
                </div>
                <?= $this->Form->create($user,['type'=>'file']) ?>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="">Avatar</label><br>
                        <img src="<?php echo $this->Url->image("/uploads/").$user->avatar ?>" style="max-height:150px"><br>
                        <input type="file" name="myFile" class="">
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname"  class="form-control" value="<?= h($user->fullname) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email"  class="form-control" value="<?= h($user->email) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password"  class="form-control" value="<?= h($user->password) ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone"  class="form-control" value="<?= h($user->phone) ?>">
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
