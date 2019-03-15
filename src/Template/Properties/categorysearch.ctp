<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="../../img/listings-parallax.jpg"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">

	<div id="titlebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!--h2>Listings</h2>
					<span>search result</span-->
					
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="/">Home</a></li>
							<li>Properties</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">

		<div class="col-md-8">

			<!-- Main Search Input -->
			<!--div class="main-search-input margin-bottom-35">
				<input type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip" value=""/>
				<button class="button">Search</button>
			</div-->

			<!-- Sorting / Layout Switcher -->
			<div class="row margin-bottom-15">

				<div class="col-md-6">
					<!-- Sort by -->
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

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<a href="#" class="list"><i class="fa fa-th-list"></i></a>
						<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
					</div>
				</div>
			</div>

                     
                        <!--check if something was returned -->
                        <?php if(empty($categorysearchroperties->toArray())){echo '
                        <div class="notification error closeable alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         Sorry, we could not find a property matching'
                            . ' your search criteria, please refine your search and try again.</div>';} 
                            else{?>
			<!-- Listings -->
			<div class="listings-container list-layout">
                <?php $count = 0;
                    foreach($categorysearchroperties as $propertiesforsale):
                ?>
                            
                               <?php $count++;
                            if($count==2){?>
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
                           <?php }?>
				<!-- Listing Item -->
				<div class="listing-item">

					<a class="listing-img-container">

						<div class="listing-badges">
							<?php if($propertiesforsale->listing_premium != 0){ ?>
								<span class="featured">Featured</span>
							<?php 	} ?>
							<span><?=$propertiesforsale->category->category_name?></span>
						</div>
                        <?php 
                            $userdata = $this->request->session()->read('userdetails');
                        ?>
						<div class="listing-img-content">
							<span class="listing-price">&#8358;<?=number_format($propertiesforsale->listing_price)?></span>
							<span onclick="saveBookmark22('<?=$userdata['id']?>','<?=$propertiesforsale->id?>')" class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
						</div>

						<div class="listing-carousel">
							<?php foreach ($propertiesforsale->images as $propertyImage): ?>
								<div><?=$this->html->image('/property_images/'.$propertyImage->imageurl)?></div>
							<?php endforeach; ?>
						</div>
					</a>
					
					<div class="listing-content">

						<div class="listing-title">
							<h4><a href="../properties/display/<?=$propertiesforsale->id?>"><?=$propertiesforsale->listing_title?></a></h4>
							<a href="https://maps.google.com/maps?q=<?=str_replace(' ','+', $propertiesforsale->listing_address.', '.$propertiesforsale->state->name)?>" class="listing-address popup-gmaps">
								<i class="fa fa-map-marker"></i>
								<?= mb_strimwidth($propertiesforsale->listing_address.', '.$propertiesforsale->state->name, 0, 37, "...") ?>
							</a>
							<?= $this->Html->link(__('Details'), ['controller' => 'Properties', 'action' => 'display',$propertiesforsale->id],['class'=>'details button border']) ?>
						</div>

						<ul class="listing-details">
							<li><?=$propertiesforsale->listing_square_area?> sq ft</li>
							<li><?=$propertiesforsale->listing_bedrooms?> Bedroom</li>
							<li><?=$propertiesforsale->listing_bedrooms?> Rooms</li>
							<li><?=$propertiesforsale->listing_bathrooms?> Bathroom</li>
						</ul>

						<div class="listing-footer">
                                                    <a href="#"><i class="fa fa-user"></i><?= ucwords(strtolower($propertiesforsale->agent->fullname))?></a>
							<span>
                                <i class="fa fa-calendar-o"></i> 
                                <?php 
                                    $olddate = $propertiesforsale->listing_date_added;
                                    $olddate = date_create($olddate);
                                    $olddate = date_format($olddate, 'Y-m-d');
                                    
                                    $newdate = date("Y-m-d H:i:s");
                                    $newdate = date_create($newdate);
                                    $newdate = date_format($newdate, 'Y-m-d');

                                    $start_ts = strtotime($olddate);
                                    $end_ts = strtotime($newdate);
                                    $diff = $end_ts - $start_ts;
                                    $diff = round($diff / 86400);
                                    echo $diff. " days ago";
                                ?>
                            </span>
						</div>

					</div>

				</div>
				<!-- Listing Item / End -->
                <?php 
                    endforeach;
                ?>

			</div>
			<!-- Listings Container / End -->
                          

			<div class="pagination-container margin-top-20 col-md-12">
				<nav class="pagination">
					<ul>
						<?= $this->Paginator->first('<< ' . __('first')) ?>
						<?= $this->Paginator->prev('< ' . __('prev')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('next') . ' >') ?>
						<?= $this->Paginator->last(__('last') . ' >>') ?>
					</ul>
				</nav>
				<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
			</div>
  <?php } ?>

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
									'tab', 
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



