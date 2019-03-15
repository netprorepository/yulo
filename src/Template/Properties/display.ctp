<!-- Titlebar
================================================== -->
<link rel="stylesheet" href="../../../css/bootstrap.min.css">

<div id="titlebar" class="property-titlebar margin-bottom-0">
	<div class="container">
		<div class="row">
                    <?php foreach ( $adverts as $advert): ?>
            <center>
                <?php if($device=='mobile'){
                    echo $this->Html->image('../ad_images/'.$advert->advert_url,['style'=>'width:300px;height:250px;']);
                } 
                else{
                    echo $this->Html->image('../ad_images/'.$advert->advert_url,['style'=>'width:750px;height:150px;']);
                }
                ?>
          <br />
            </center>
            <?php endforeach; ?>
                    <br />
			<div class="col-md-12">
				
				<a href="" class="back-to-listings"></a>
				<div class="property-title">
					<h2><?=$property->listing_title  ?> <span class="property-badge"><?=$property->category->category_name?></span></h2>
					<span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							<?=$property->listing_address.', '.$property->state->name  ?>
						</a>
					</span>
				</div>

				<div class="property-pricing">
					<div class="property-price">&#8358;<?=number_format($property->listing_price)  ?></div>
					<div class="sub-price">
						<?php if(!empty($property->listing_square_area))
							{
						echo $property->listing_square_area.' sq ft';}
						else{
							echo 'NA';
							
						}
						?>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row margin-bottom-50">
		<div class="col-md-12">
		
			<!-- Slider -->
			<div class="property-slider default">  
				<?php foreach ($property->images as $propertyImages): $share_image = $propertyImages->imageurl; ?>
          
                    <?=$this->html->image('/property_images/'.$propertyImages->imageurl,['data-background-image'=>'/property_images/'.$propertyImages->imageurl,'class'=>'item mfp-gallery'])?> 
				<?php endforeach; ?>
			</div>

			<!-- Slider Thumbs -->
			<div class="property-slider-nav">
				<?php foreach ($property->images as $propertyImages): ?>
					<div class="item"> <?=$this->html->image('/property_images/'.$propertyImages->imageurl,['height'=>'200','width'=>'530'])?> </div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</div>


<div class="container">
	<div class="row">
				<div class="col-md-12">
			    <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Report Property</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= $this->Form->create(null,[ 'url' => ['controller' => 'users', 'action' => 'reportproperty']]); ?> 
						<div class="form-group">
							<p class="alert alert-info" style="display: none;" id="rel"> </p>
							<label for="exampleFormControlSelect1">Reason</label>
							<?php 
								$bed = [
									'Offensive content or Photo'=>'Offensive content or Photo',
									'Property no longer Available'=>'Property no longer Available',
									'Fraudulent Listing'=>'Fraudulent Listing',
									'Duplicate Listing'=>'Duplicate Listing','Others'=>'Others'
									];
								echo $this->Form->control(
										'reason', 
										['options' =>  $bed, 'empty' => 'Select Reason'],
										['class'=>'chosen-select-no-single']
									);
							?>	
						</div>
						<div class="form-group">
							<?php 
								echo $this->Form->input('fullname', ['label'=>'Name*','class'=>'form-control','placeholder'=>'Your name']);
							?>
						</div>
						<div class="form-group">
							<?= $this->Form->input(
								'email', 
									['label'=>'Email*','class'=>'form-control','placeholder'=>'example@email.com','type'=>'email',
										'pattern'=>'^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$'
									]
								);?>
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Comment</label>
							<textarea class="form-control"  id="comment" name="comment" rows="3"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						 <?= $this->Form->button('Send Report',['class'=>'btn btn-primary']) ?>
					</div>
					<?= $this->Form->end() ?>
					</div>
				</div>
				</div>
				<!--/modal end -->

					<div class="col-md-12">
			    <!-- Modal -->
				<div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="loginRegisterModalLabel">Login/Register</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--p class="text-center">You need to login before you can bookmark any listing.</p-->
						<section class="jumbotron text-center">
							<div class="container">
							<!--h1 class="jumbotron-heading">Album example</h1-->
							<p class="lead text-muted">
								You need to login before you can bookmark any property.	
							</p>
							<p>
								<!--a href="" class="btn btn-primary my-2">Login</a>
								<a href="" class="btn btn-danger my-2">Register</a-->
								<?= $this->Html->link(__(' Login'), ['controller' => 'users', 'action' => 'login'],['class'=>'btn btn-primary my-2']) ?>
								<?= $this->Html->link(__(' Register'), ['controller' => 'users', 'action' => 'login'],['class'=>'btn btn-danger my-2']) ?>
							</p>
							</div>
						</section>
					</div>
					<!--div class="modal-footer">
						<button type="button" id="report" class="btn btn-primary">Send Report</button>
					</div-->
					</div>
				</div>
				</div>
				<!--/modal end -->
		</div>


		</div>
		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">
			<div class="property-description">

				<!-- Main Features -->
				<ul class="property-main-features">
					<li>Area(sq ft)
							<?php if(!empty($property->listing_square_area))
							{
						echo '<span>'.$property->listing_square_area.'</span>';}
						else{
							echo 'NA';
							
						}?>                                          
                    </li>
					<li>Rooms <span><?= $property->listing_rooms ?></span></li>
					<li>Bedrooms <span><?= $property->listing_rooms ?></span></li>
					<li>Bathrooms <span><?= $property->listing_bathrooms ?></span></li>
				</ul>

<!-- Your share button code -->
  <div class="fb-share-button pull-right" 
       data-href="https://www.yulo.ng/properties/display/<?=$property->id.'/'.$this->generateUrl($property->listing_title) ?>" 
    data-layout="button_count">
  </div>

				<!-- Description -->
				<h3 class="desc-headline">Description</h3>
				<div class="show-more">
					<p><?= h($property->listing_description) ?></p>

					<a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
				</div>

				<!-- Details -->
				<h3 class="desc-headline">Details</h3>
				<ul class="property-features margin-top-0">
					<li>Building Age: <span><?= $property->listing_age ?> Years</span></li>
					<li>Parking lots: <span><?= $property->listing_parking ?></span></li>
					<li>Toilets: <span><?= $property->listing_toilet ?></span></li>
				</ul>


				<!-- Features -->
				<h3 class="desc-headline">Features</h3>
				<ul class="property-features checkboxes margin-top-0">
					<li>Air Conditioning</li>
					<li>Swimming Pool</li>
					<li>Central Heating</li>
					<li>Laundry Room</li>
					<li>Gym</li>
					<li>Alarm</li>
					<li>Window Covering</li>
					<li>Internet</li>
				</ul>

				<!-- Video -->
                                <?php if(!empty($property->listing_video_link)){ ?>
				<h3 class="desc-headline no-border">Video</h3>
				<div class="responsive-iframe">
					<iframe width="560" height="315" src="<?= h('http://'.str_replace("http://","",$property->listing_video_link))?>" frameborder="0" allowfullscreen></iframe>
				</div>
                                <?php };?>
				
				<!-- Location -->
				<h3 class="desc-headline no-border" style="margin-top: 10px !important;" id="location">Location</h3>
				<div id="propertyMap-container">
					<div id="propertyMap"></div>
					<a href="#" id="streetView">Street View</a>
				</div>


				<!-- Similar Listings Container -->
				<h3 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Properties</h3>

				<!-- Layout Switcher -->

				<div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
				<div class="listings-container list-layout">
				<?php foreach($similarproperties as $similarproperty):?>
					<!-- Listing Item -->
					<div class="listing-item">

						<a href="" class="listing-img-container">

							<div class="listing-badges">
								<span><?=$similarproperty->category->category_name?></span>
							</div>

							<div class="listing-img-content">
                                                        <?php $userdata = $this->request->session()->read('userdetails');?>
								<span class="listing-price">&#8358;<?=number_format($similarproperty->listing_price)?> <i>per annum</i></span>
                                                                <span onclick="addtomybookmark('<?=$userdata['id']?>','<?=$similarproperty->id?>')" class="like-icon" title="Add to my Bookmarks"></span>
                                                    
							</div>
                                                    <?php $image_count = 0;
                                                    foreach($similarproperty->images as $images){
                                                  echo $this->html->image('/property_images/'.$images->imageurl,['height'=>'200','width'=>'530']);
                                                  if($image_count==1){break;}
                                                  
                                                    }
                                                    ?>
							
						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4>
									<?= $this->Html->link(__($similarproperty->listing_title), ['controller' => 'Properties', 'action' => 'display',$similarproperty->id,
									$similarproperty->listing_title]) ?>
								</h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									<?= mb_strimwidth($similarproperty->listing_address.', '.$similarproperty->state->name, 0, 40, "...") ?>
								</a>

								<a href="" class="details button border">Details</a>
							</div>

							<ul class="listing-details">

								<li><?= $property->listing_square_area ?> sq ft</li>
								<li><?= $property->listing_bathrooms ?> Bedroom</li>
								<li><?= $property->listing_rooms ?> Rooms</li>
								<li><?= $property->listing_rooms ?> Rooms</li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> <?= ucwords(strtolower($similarproperty->agent->fullname))?></a>
								<span><i class="fa fa-calendar-o"></i> 
                                                                    <?= $this->timeago(strtotime($similarproperty->listing_date_added)) ?>
									
								</span>
							</div>

						</div>
						<!-- Listing Item / End -->

					</div>
					<!-- Listing Item / End -->
					<?php endforeach;?>
				</div>
				<!-- Similar Listings Container / End -->

			</div>
		</div>
		<!-- Property Description / End -->


		<!-- Sidebar -->
		<div class="col-lg-4 col-md-5">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-30">
					
					<!--button class="widget-button with-tip" data-tip-content="Print"><i class="sl sl-icon-printer"></i></button-->
					<button onclick="addtomybookmark('<?=$userdata['id']?>','<?=$similarproperty->id?>')" class="widget-button with-tip" data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
					<!--button class="widget-button with-tip compare-widget-button" data-tip-content="Add to Compare"><i class="icon-compare"></i></button-->
					<div class="clearfix"></div>
				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				<div class="widget">
<?= $this->Form->create(null,[ 'url' => ['controller' => 'users', 'action' => 'contactowner'],'class' => 'login']); ?> 
					<!-- Agent Widget -->
					<div class="agent-widget">
						<div class="agent-title">
							<div class="agent-photo">
                                                            <?php if(!empty($property->agent->pix_url)) {echo $this->html->image('/profile_pix/'.$property->agent->pix_url);}
                                                            else{?>
                                                            
                                                            <img src="../../img/agent-avatar.jpg" alt="" />
                                                            <?php }?>
                                                        </div>
							<div class="agent-details">
								<h4><a href="#"><?= $property->agent->fullname ?></a></h4>
								<span><i class="sl sl-icon-call-in"></i><?= $property->agent->phone?></span>
							</div>
							<div class="clearfix"></div>
						</div>
  <?= $this->Form->input('title', ['label'=>false,'class'=>'form-control', 'required',
                'placeholder'=>'your email address','type'=>'email',
      'pattern'=>'^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$']);?>
		
                <?= $this->Form->input('phone', ['label'=>false,'class'=>'form-control','placeholder'=>'your phone number','required'])?>
                <?= $this->Form->input('owner_email', ['type'=>'hidden','value'=>$property->agent->user->username])?>
                                            <textarea placeholder="your message" name="message" required > </textarea>
	 <?= $this->Form->button('Send Message',['class'=>'button fullwidth margin-top-5']) ?>                                   
					 <?= $this->Form->end() ?>
					</div>
					<!-- Agent Widget / End -->
					<hr>
					<!--button class="button fullwidth margin-top-5" style="background-color: #fa5b0f !important;">What is your home worth?</button>
					<hr-->
					<button type="button" class="button fullwidth margin-top-5" data-toggle="modal" data-target="#exampleModal" style="background-color: #f00 !important;">
					Report this property
					</button>

				</div>
				<!-- Widget / End -->


		


				<!-- Widget -->
				<div class="widget">
					<h3 class="margin-bottom-35">Featured Properties</h3>

					<div class="listing-carousel outer">
						<?php foreach($featuredproperties as $featuredproperty):?>
						<!-- Item -->
						<div class="item">
							<div class="listing-item compact">

								<a href="#" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">Featured</span>
										<span><?=$featuredproperty->category->category_name?></span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title"><?=$featuredproperty->listing_title?> 
										<i><?=number_format($featuredproperty->listing_price)?></i>
										</span>

										<ul class="listing-hidden-content">
											<li>Area <span><?= $property->listing_square_area ?> sq ft</span></li>
											<li>Rooms <span><?= $property->listing_bathrooms ?></span></li>
											<li>Beds <span><?= $property->listing_rooms ?></span></li>
										</ul>
									</div>

									<!--img src="../../img/listing-01.jpg" alt=""-->
									<?php 
										$count = 0;
										foreach ($featuredproperty->images as $propertyImage): 
										$count++;
                                                                               
									?>
										<?=$this->html->image('/property_images/'.$propertyImage->imageurl)?>
									<?php 
										if($count == 1){
											break;
										}
										endforeach; 
									?>
								</a>

							</div>
						</div>
						<!-- Item / End -->

						<?php endforeach; ?>	
					</div>

				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->

	</div>
</div>
