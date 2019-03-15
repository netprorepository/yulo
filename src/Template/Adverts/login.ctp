<!-- Container -->
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-4">


            <!--Tab -->
            <div class="my-account style-1 margin-top-5 margin-bottom-40">
                <?= $this->Flash->render() ?>
                <ul class="tabs-nav">
                    <li class=""><a href="#tab1">Log In</a></li>
                    <li><a href="#tab2">Create Account</a></li>
                </ul>

                <div class="tabs-container alt">

                    <!-- Login -->
                    <div class="tab-content" id="tab1" style="display: none;">
                        <?= $this->Form->create(null, ['url' => ['controller' => 'users', 'action' => 'login'], 'class' => 'login']); ?> 

                        <p class="form-row form-row-wide">
                            <label for="username">Username:
                                <i class="im im-icon-Male"></i>
                                <input type="text" class="input-text" name="username" id="username" value="" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Password:
                                <i class="im im-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password"/>
                            </label>
                        </p>
                        <p class="lost_password">
                            <!--<a href="#" >Lost Your Password?</a>-->
                            <?= $this->Html->link(__('Forgot Your Password?'), ['action' => 'forgotpassword'], ['class' => 'pull-left']) ?>
                        </p>
                        <?= $this->Form->button('Login', ['class' => 'button border fw margin-top-10 pull-right']) ?>                                   
                        <?= $this->Form->end() ?>
                    </div>

                    <!-- Register -->
                    <div class="tab-content" id="tab2" style="display: none;">

                        <?= $this->Form->create(null, ['url' => ['controller' => 'Adverts', 'action' => 'createadaccount'], 'id' => 'register']); ?> 

                        <?php
//                          echo $this->Form->input('title', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'your title']);
//            echo '<br />';

                        echo $this->Form->input('fname', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'First Name', 'class' => 'im im-icon-Male']);

                        echo '<br />';
                        echo $this->Form->input('lname', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'Last Name', 'class' => 'im im-icon-Mail', 'required']);


                        echo $this->Form->input('phone', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'your phone number']);

                        echo $this->Form->input('username', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'username/Email', 'type' => 'email', 'class' => 'im im-icon-Mail', 'required']);

                        echo $this->Form->input('password', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'Password', 'type' => 'password', 'class' => 'im im-icon-Lock-2', 'required']);
                        echo '<br />';

                        echo $this->Form->input('cpassword', ['label' => false, 'class' => 'form-control',
                            'placeholder' => 'Re-enter Your Password', 'type' => 'password', 'class' => 'im im-icon-Lock-2', 'required']);
                        echo '<br />';
                        ?>   

                        <?= $this->Form->button('Create Account', ['class' => 'button border fw margin-top-10 pull-right']) ?>
                        <br />         
                        <?= $this->Form->end() ?>
                        <br />
                    </div>

                </div>
            </div>



        </div>
    </div>

</div>
<!-- Container / End -->



<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<!-- Wrapper / End -->


</body>
</html>
