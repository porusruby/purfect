<nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">Ruby Admin</a>
                <a class="navbar-brand hidden" href="#"><img src="<?php echo  $this->Url->image('/backend/images/logo2.png') ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo ($this->request->getParam('controller') == 'Home' )?'active' :'' ?>">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Main Website</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown <?php echo ($this->request->getParam('controller') == 'Posts' OR $this->request->getParam('controller') == 'Tags' OR $this->request->getParam('controller') == 'Categories' )?'active' :'' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-paper-plane-o"></i>Posts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class=""><i class="fa fa-file-o"></i><a href="<?php echo $this->Url->build('/admin/posts', true); ?>">Posts</a></li>
                            <li><i class="fa fa-ravelry"></i><a href="<?php echo $this->Url->build('/admin/categories', true); ?>">Categories</a></li>
                            <li><i class="fa fa-tags"></i><a href="<?php echo $this->Url->build('/admin/tags', true); ?>">Tags</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Users' )?'active' :'' ?>">
                        <a href="<?php echo $this->Url->build('/admin/users/filemanager', true); ?>"> <i class="menu-icon fa fa-image"></i>Media </a>
                    </li>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Pages' )?'active' :'' ?>">
                        <a href="<?php echo $this->Url->build('/admin/pages', true); ?>"> <i class="menu-icon fa fa-file-text-o"></i>Pages </a>
                    </li>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Comments' )?'active' :'' ?>">
                        <a href="index.html"> <i class="menu-icon fa fa-comments"></i>Comments </a>
                    </li>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Tasks' )?'active' :'' ?>">
                        <a href="<?php echo $this->Url->build('/admin/tasks', true); ?>"> <i class="menu-icon fa fa-drupal"></i>Tasks </a>
                    </li>


                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
                    <?php if($logged->role == 'admin') : ?>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Users' )?'active' :'' ?>">
                        <a href="<?php echo $this->Url->build('/admin/users', true); ?>"> <i class="menu-icon fa fa-user"></i>Users </a>
                    </li>
                    <?php endif; ?>
                    <li class="<?php echo ($this->request->getParam('controller') == 'Users' )?'active' :'' ?>">
                        <a href="<?php echo $this->Url->build('/admin/users/setting', true); ?>"> <i class="menu-icon fa fa-cogs"></i>Settings </a>
                    </li>
                    <li>
                    <?= $this->Form->postLink("<i class='menu-icon fa fa-sign-out'></i> Logout", ['controller'=>'users','action' => 'logout'], ['confirm' => __('Are you sure you want to logout ?'),'escape'=>false]) ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>