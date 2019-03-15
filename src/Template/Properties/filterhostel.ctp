<?php 
                    foreach($hostels as $hostel):
                ?>
				<!-- Listing Item -->
				<div class="col-md-6">
					<div class="listing-item compact">

						<a href="../properties/display/<?=$hostel->id?>" class="listing-img-container">

							<div class="listing-badges">
								<?php if($hostel->listing_premium != 0){ ?>
									<span class="featured">Featured</span>
								<?php 	} ?>
								<span><?=$hostel->category->category_name?></span>
							</div>

							<div class="listing-img-content">
								<span class="listing-compact-title"><?=$hostel->listing_title?> <i>&#8358;<?=number_format($hostel->listing_price)?></i></span>

								<ul class="listing-hidden-content">
									<li>Area <span><?=$hostel->listing_square_area?> sq ft</span></li>
									<li>Rooms <span><?=$hostel->listing_bedrooms?></span></li>
									<li>Beds <span><?=$hostel->listing_rooms?></span></li>
									<li>Baths <span><?=$hostel->listing_bathrooms?></span></li>
								</ul>
							</div>
							
							<?php 
								$count = 0;
								foreach ($hostel->images as $propertyImage): 
								$count++;
							?>
								<?=$this->html->image('/property_images/'.$propertyImage->imageurl,['style'=>'height: 275px;'])?>
							<?php 
								if($count == 1){
									break;
								}
								endforeach; 
							?>
						</a>

					</div>
				</div>
				<!-- Listing Item / End -->

				<?php 
					endforeach;
				?>