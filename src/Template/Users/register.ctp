<!-- Container -->
<div class="container">

	<div class="row">
	<div class="col-md-6 col-md-offset-4">

	
	<!--Tab -->
	<div class="my-account style-1 margin-top-5 margin-bottom-40">
<?= $this->Flash->render() ?>
		

		<div class="tabs-container alt">

		

			<!-- Register -->
			<div class="tab-content" id="tab2" style="display: none;">

                            <?= $this->Form->create($user ,[ 'url' => ['controller' => 'users', 'action' => 'register'],'id' => 'register']); ?> 
				
                          <?php  
//                          echo $this->Form->input('title', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'your title']);
//            echo '<br />';
            
            echo $this->Form->input('fullname', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Name','class'=>'im im-icon-Male']);
           
             echo '<br />';
            echo $this->Form->input('username', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Email','type'=>'email', 'class'=>'im im-icon-Mail' ,'required']);
           
            
//              echo $this->Form->input('phone', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'your phone number']);
//            
//            echo '<br />';
//            echo $this->Form->input('about', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'about(optional)']);
          
            
//             echo $this->Form->input('address', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'Your Address']);
           
            
//             echo $this->Form->input('street', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'your street address']);
//            echo '<br />';
//            
//            echo $this->Form->input('locality', ['label'=>false,'class'=>'form-control',
//                'placeholder'=>'your locality']);
            
         //    echo '<br />';
              echo $this->Form->control('state_id', ['label'=>'State Of Residence','options' => $states,'class'=>'form-control', 'empty' => 'Select state Of Residence']);
            echo '<br />';
             echo '<br />';
              echo '<br />';
            echo $this->Form->input('password', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Password','type'=>'password', 'class'=>'im im-icon-Lock-2' ,'required']);
            echo '<br />';
            
            echo $this->Form->input('cpassword', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Re-enter Your Password','type'=>'password', 'class'=>'im im-icon-Lock-2' ,'required']);
            echo '<br />';
            
         	
            echo $this->Form->input('accounttype', ['label'=>false, 'required', 'options'=>['Property Owner'=>
                'Property Owner','Agent'=>'Agent','User'=>'User'],'class'=>'form-control','empty' => 'Choose Account Type']);
            ?>   
                            <br /> <br /> 
           <?= $this->Form->button('Register',['class'=>'button border fw margin-top-10 pull-right']) ?>
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