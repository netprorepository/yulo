<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>My Profile</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>My Profile</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">


		<!-- Widget -->
		<div class="col-md-4">
			<div class="sidebar left">

				<div class="my-account-nav-container">
					
					<ul class="my-account-nav">
						<li class="sub-nav-title">Manage Account</li>
						<li>
                            <!--a href="my-profile.html" class="current"><i class="sl sl-icon-user"></i> My Profile</a-->
                            <?= $this->Html->link(__(' My Profile'), ['controller'=>'users','action' => 'displayuserpage'],['class'=>'sl sl-icon-user']) ?> 
                        </li>
						<li>
                            <!--a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a-->
                             <?= $this->Html->link(__(' Bookmarked Listings'), ['controller'=>'users','action' => 'bookmark'],['class'=>'sl sl-icon-star']) ?> 
                        </li>
					</ul>

					<ul class="my-account-nav">
						<li>
                            <!--a href="change-password.html"><i class="sl sl-icon-lock"></i> Change Password</a-->
                            <?= $this->Html->link(__(' Change Password'), ['controller'=>'users','action' => 'changepassword'],['class'=>'sl sl-icon-star']) ?>
                        </li>
						<li>
                            <!--a href="#"><i class="sl sl-icon-power"></i> Log Out</a-->
                            <?= $this->Html->link(__(' Log Out'), ['controller'=>'users','action' => 'logout'],['class'=>'sl sl-icon-power']) ?>
                        </li>
					</ul>

				</div>

			</div>
		</div>

		<div class="col-md-8">
			<div class="row">


				<div class="col-md-8 my-profile">
					<h4 class="margin-top-0 margin-bottom-30">My Account</h4>

					<label>Your Name</label>
					<input value="Jennie Wilson" type="text">

					<label>Your Title</label>
					<input value="Agent In New York" type="text">

					<label>Phone</label>
					<input value="(123) 123-456" type="text">

					<label>Email</label>
					<input value="jennie@example.com" type="text">

					<button class="button margin-top-20 margin-bottom-20">Save Changes</button>
				</div>

				<div class="col-md-4">
					<!-- Avatar -->
					<div class="edit-profile-photo">
						<img src="images/agent-02.jpg" alt="">
						<div class="change-photo-btn">
							<div class="photoUpload">
							    <span><i class="fa fa-upload"></i> Upload Photo</span>
							    <input type="file" class="upload" />
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>

	</div>
</div>
