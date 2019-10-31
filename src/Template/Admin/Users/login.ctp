

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                <?= $this->Form->create() ?>
                        <div class="form-group">
                            <?= $this->Form->control('email',['class'=>'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('password',['class'=>'form-control']);?>
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <!--
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div>
                                -->
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
