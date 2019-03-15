<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Bookmarked Listings</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Bookmarked Listings</li>
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
			<table class="manage-table bookmarks-table responsive-table">

				<tr>
					<th><i class="fa fa-file-text"></i> Property</th>
					<th></th>
				</tr>

                <?php 
                    foreach($mybookmarks as $mybookmark):
                ?>
				<!-- Item #1 -->
				<tr>
					<td class="title-container">
                                          <?php $count = 0; foreach ($mybookmark->property->images as $image): $count++; ?>
                                         
						<?=$this->html->image('/property_images/'.$image->imageurl)?>
                                            
                                            <?php if($count==1){break;} endforeach; ?>
						<div class="title">
							<h4><a href="#"><?=$mybookmark->property->listing_title?></a></h4>
							<span><?=$mybookmark->property->listing_address?></span>
							<span class="table-property-price">&#8358;<?=number_format($mybookmark->property->listing_price)?></span>
						</div>
					</td>
					<td class="action">
						<a href="#" class="delete"><i class="fa fa-remove"></i> Remove</a>
					</td>
				</tr>
                <?php 
                    endforeach;
                ?>
			</table>
		</div>

	</div>
</div>
