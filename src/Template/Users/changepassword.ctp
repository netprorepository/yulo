<!-- Container -->
<div class="container">

	<div class="row">
	<div class="col-md-6 col-md-offset-4">

	
	<!--Tab -->
	<div class="my-account style-1 margin-top-5 margin-bottom-40">
<?= $this->Flash->render() ?>
		<ul class="tabs-nav">
			<li class=""><a href="#tab1">Change Password</a></li>
			
		</ul>

		<div class="tabs-container alt">

			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
                             <?= $this->Form->create($user,[ 'url' => ['controller' => 'users', 'action' => 'changepassword',$key],'class' => 'login']); ?> 
			
					<p class="form-row form-row-wide">
						<label for="username">Password :
							<i class="im im-icon-Male"></i>
                                                        <input type="password" class="input-text" name="password"  />
						</label>
					</p>
                                        
                                        <p class="form-row form-row-wide">
						<label for="username">Confirm Password :
							<i class="im im-icon-Male"></i>
                                                        <input type="password" class="input-text" name="cpassword"  />
						</label>
					</p>


					  <?= $this->Form->button('Change Password',['class'=>'button border fw margin-top-10 pull-right']) ?>                                   
					 <?= $this->Form->end() ?>
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

