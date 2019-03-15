<!-- Titlebar
================================================== -->



<!-- Content
================================================== -->
<div class="container margin-top-30">
	<div class="row sticky-wrapper">

		<div class="col-md-8">

			<!-- Main Search Input -->
			<div class="main-search-input margin-bottom-35">
				<input onkeyup="filterHostel(this.value)" type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip"/>
			</div>

			<!-- Sorting / Layout Switcher -->
			<!--div class="row margin-bottom-15">

				<div class="col-md-6">
				
					<div class="sort-by">
						<label>Sort by:</label>

						<div class="sort-by-select">
							<select data-placeholder="Default order" class="chosen-select-no-single" >
								<option>Default Order</option>	
								<option>Price Low to High</option>
								<option>Price High to Low</option>
								<option>Newest Properties</option>
								<option>Oldest Properties</option>
							</select>
						</div>
					</div>
				</div>

			</div-->

			
			<!-- Listings Container -->
			<div id="hosteldiv" class="row">
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

			</div>
			<!-- Listings Container / End -->

			
			<!-- Pagination -->
			                    		<!-- Pagination -->
	<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
			<!-- Pagination / End -->

		</div>


	<!-- Sidebar
		================================================== -->
		<div class="col-md-4">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-35">Filter Result</h3>
					<?= $this->Form->create(null,['url'=>['controller'=>'properties', 'action'=>'categorysearch']]) ?>
					<!-- Row -->
					<div class="row with-forms">
						<?php 
							echo '<div class="col-md-12">';
								echo $this->Form->control(
									'category', 
									['options' =>  $categories, 'empty' => 'All Categories','onChange'=>'getCatType(this.value)'],
									['class'=>'chosen-select-no-single']
								);
							echo '</div>';
						?>
					</div>
					<!--/ Row -->

					<!-- Row -->
					<div class="row with-forms" id="categorytype1">
						<?php 
							echo '<div class="col-md-12">';
								//$categorytype = ['1'=>'Apartments','2'=>'House','3'=>'Garage'];
								echo $this->Form->control(
									'categorytype', 
									['options' =>  $categoriestypes, 'empty' => 'Any Types'],
									['class'=>'chosen-select-no-single']
								);
							echo '</div>';
						?>
					</div>
					<!--/ Row -->

					<!-- Row -->
					<div class="row with-forms">
					<?php 
						echo '<div class="col-md-12">';
							//$state = ['1'=>'FCT','2'=>'Adamawa','3'=>'Akwa Ibom'];
							echo $this->Form->control(
								'state', 
								['options' =>  $states, 'empty' => 'All States','onChange'=>'getCities(this.value)'],
								['class'=>'chosen-select-no-single']
							);
						echo '</div>';
					?>
					</div>
					<!--/ Row -->

					<!-- Row -->
					<div class="row with-forms" id="cities1">
					<?php 
						echo '<div class="col-md-12">';
							//$cities = ['1'=>'Mpape','2'=>'Yola','3'=>'Uyo'];
							echo $this->Form->control(
								'city', 
								['options' =>  $cities, 'empty' => 'All Cities'],
								['class'=>'chosen-select-no-single']
							);
						echo '</div>';
					?>
					</div>
					<!--/ Row -->

					<!-- Row -->
					<div class="row with-forms">
					<?php 
						echo '<div class="col-md-6">';
							$bed = ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5+'=>'5+'];
							echo $this->Form->control('bed', ['options' =>  $bed, 'empty' => 'Beds'],['class'=>'chosen-select-no-single']);
						echo '</div>';
			
						echo '<div class="col-md-6">';
							$bath = ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5+'=>'5+'];
							echo $this->Form->control('bath', ['options' =>  $bath, 'empty' => 'Bath'],['class'=>'chosen-select-no-single']);
						echo '</div>';
					?>
					</div>
					<!--/ Row -->

					<!-- Row -->
					<div class="row with-forms">
					<?php 
						echo '<div class="col-md-6">';
							$minprice = ['1000'=>'1000','35000'=>'35000','100000'=>'20000','500000'=>'500000','1000000'=>'1000000','5000000'=>'5000000','10000000'=>'10000000'];
							echo $this->Form->control('minprice', ['options' =>  $minprice, 'empty' => 'Any price'],['class'=>'chosen-select-no-single']);
						echo '</div>';
			
						echo '<div class="col-md-6">';
							$maxprice = ['1000'=>'1000','35000'=>'35000','100000'=>'20000','500000'=>'500000','1000000'=>'1000000','5000000'=>'5000000','10000000'=>'10000000'];
							echo $this->Form->control('maxprice', ['options' =>  $maxprice, 'empty' => 'Any price'],['class'=>'chosen-select-no-single']);
						echo '</div>';
					?>
					</div>
					<!--/ Row -->

					 <div class="clearfix"></div>
					 <?= $this->Form->button('Search',['class'=>'button fullwidth margin-top-30']) ?>
					 <?= $this->Form->end() ?>
				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->
	</div>
</div>
