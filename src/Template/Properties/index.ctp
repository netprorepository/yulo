<link rel="stylesheet" href="css/bootstrap.min.css">
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
								You need to login before you can bookmark any Property.	
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

<!-- Banner
================================================== -->
<div class="parallax" data-background="img/Banner.jpg" data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
	<div class="parallax-content">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!-- Main Search Container -->
					<div class="main-search-container">
						<h2>Find Your Dream Home</h2>
						
						<!-- Main Search -->
						<?= $this->Form->create(null,['url'=>['controller'=>'properties', 'action'=>'categorysearch'],'class'=>'main-search-form']) ?>
							
							<!-- Type -->
							<div class="search-type">
								<label class="active"><input class="first-tab" name="tab" checked="checked" type="radio">Any Status</label>
								<label onclick="getCatType2('2')"><input name="tab" value="2" type="radio">For Sale</label>
								<label onclick="getCatType2('1')"><input name="tab" value="1" type="radio">For Rent</label>
								<label onclick="getCatType2('6')"><input name="tab" value="6" type="radio">Hostel</label>
								<div class="search-type-arrow"></div>
							</div>

							
							<!-- Box -->
							<div class="main-search-box">
								
								<!-- Main Search Input -->
								<div class="main-search-input larger-input">
									<input name="address" type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip"/>
									<button class="button">Search</button>
								</div>

								<!-- Row -->
								<div class="row with-forms">

									<!-- Property Type -->
									<div class="col-md-4" id="categorytype1">
										<select data-placeholder="Any Type" class="chosen-select-no-single" >
											<option>Any Type</option>	
										</select>
									</div>


									<!-- Min Price -->
									<div class="col-md-4">
										
										<!-- Select Input -->
										<div class="select-input">
											<?php 
												echo $this->Form->input('minprice', ['label'=>false,'placeholder'=>'Min Price']);
											?>
										</div>
										<!-- Select Input / End -->

									</div>


									<!-- Max Price -->
									<div class="col-md-4">
										
										<!-- Select Input -->
										<div class="select-input">
											<?php 
												echo $this->Form->input('maxprice', ['label'=>false,'placeholder'=>'Max Price']);
											?>
										</div>
										<!-- Select Input / End -->

									</div>

								</div>
								<!-- Row / End -->


								<!-- More Search Options -->
								<a href="#" class="more-search-options-trigger" data-open-title="More Options" data-close-title="Less Options"></a>

								<div class="more-search-options">
									<div class="more-search-options-container">
										<!-- Row -->
										<div class="row with-forms">

											<!-- Min Area -->
											<div class="col-md-6">
												<select name="bed" data-placeholder="Beds" class="chosen-select-no-single" >
													<option label="blank"></option>	
													<option>Beds (Any)</option>	
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>

											<!-- Max Area -->
											<div class="col-md-6">
												<select name="bath" data-placeholder="Baths" class="chosen-select-no-single" >
													<option label="blank"></option>	
													<option>Baths (Any)</option>	
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>

										</div>
										<!-- Row / End -->

									</div>
								</div>
								<!-- More Search Options / End -->


							</div>
							<!-- Box / End -->

						 <?= $this->Form->end() ?>
						<!-- Main Search -->

					</div>
					<!-- Main Search Container / End -->

				</div>
			</div>
		</div>

	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row">
	<?php foreach ( $adverts as $advert): ?>
            <br /><center>
                <?php if($device=='mobile'){
                    echo $this->Html->image('../ad_images/'.$advert->advert_url,['style'=>'width:300px;height:250px;']);
                } 
                else{
                    echo $this->Html->image('../ad_images/'.$advert->advert_url,['style'=>'width:750px;height:150px;']);
                }
                ?>
          
            </center>
            <?php endforeach; ?>
		<div class="col-md-12">
			<h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
		</div>
		
		<!-- Carousel -->
		<div class="col-md-12">
			<div class="carousel">
				 <?php foreach ($properties as $yuloListing): ?>
				<!-- Listing Item -->
					<div class="carousel-item">
					<div class="listing-item">

						<a href="properties/display/<?=$yuloListing->id.'/'.$this->generateUrl($yuloListing->listing_title)?>" class="listing-img-container">

							<div class="listing-badges">
								<?php if($yuloListing->listing_premium != 0){ ?>
									<span class="featured">Featured</span>
								<?php 	} ?>
								<span><?= $yuloListing->category->category_name ?></span>
							</div>

							<div class="listing-img-content">
								<?php 
									$userdata = $this->request->session()->read('userdetails');
								?>
								<span class="listing-price">&#8358;<?=number_format($yuloListing->listing_price)?></span>
								<span onclick="saveBookmark('<?=$userdata['id']?>','<?=$yuloListing->id?>')" class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<!--span class="compare-button with-tip" data-tip-content="Add to Compare"></span-->
							</div>

							<div class="listing-carousel">
								<?php foreach ($yuloListing->images as $propertyImage): ?>
                                                           
									<div><?=$this->html->image('/property_images/'.$propertyImage->imageurl,['style'=>'height: 209px;'])?></div>
                                                            <?php  endforeach; ?>	
							</div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4>
								<?= $this->Html->link(__(mb_strimwidth($yuloListing->listing_title, 0, 25, "...")), ['controller' => 'Properties', 'action' => 'display',$yuloListing->id,
								$this->generateUrl($yuloListing->listing_title)]) ?>
								</h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									<?= mb_strimwidth($yuloListing->listing_address.', '.$yuloListing->state->name, 0, 35, "...") ?>
								</a>
							</div>

							<ul class="listing-features">
								<li>Area 
								<span>
									<?php if(!empty($yuloListing->listing_square_area))
                                                {
											echo mb_strimwidth($yuloListing->listing_square_area, 0, 6, "...").' sq ft';
											}
                                            else{
                                                echo 'NA';
                                                
                                            }
									?>		
								</span>
								</li>
								<li>Bedrooms <span><?=$yuloListing->listing_bedrooms?></span></li>
								<li>Bathrooms <span><?=$yuloListing->listing_rooms?></span></li>
							</ul>

							<div class="listing-footer" style="font-size: 14px;">
                                                            <a href="#"><i class="fa fa-user"></i><?= ucwords(strtolower($yuloListing->agent->fullname))?></a>
								<span><i class="fa fa-calendar-o"></i>
									  <?= $this->timeago(strtotime($yuloListing->listing_date_added)) ?>
								</span>
							</div>

						</div>

					</div>
				</div>
				<!-- Listing Item / End -->
                <?php endforeach; ?>
			</div>
		</div>
		<!-- Carousel / End -->

	</div>
</div>




