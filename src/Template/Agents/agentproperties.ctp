<!-- Titlebar
================================================== -->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><?= $agent->fullname ?></h2>
				<span><?= $agent->addres ?></span>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
	<div class="col-md-12">
			    <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Report Listing</h5>
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
		<div class="col-lg-8 col-md-8">

			<h4 class="headline">My Listings</h4>

			<!-- Main Search Input -->
			<div class="main-search-input margin-bottom-35">
				<input type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip" value=""/>
				<button class="button">Search</button>
			</div>

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

			
			<!-- Listings -->
			<div class="listings-container list-layout">

				<!-- Listing Item -->
                <?php foreach ($agentproperties as $yuloListing): ?>
				<div class="listing-item">

					<a href="" class="listing-img-container">

						<div class="listing-badges">
							<?php if($yuloListing->listing_premium != 0){ ?>
								<span class="featured">Featured</span>
							<?php 	} ?>
							<span><?= $yuloListing->category->category_name ?></span>
						</div>
						<?php 
                            $userdata = $this->request->session()->read('userdetails');
                        ?>
						<div class="listing-img-content">
							<span class="listing-price">
								<?=number_format($yuloListing->listing_price)?>
							</span>
							<span onclick="saveBookmark2('<?=$userdata['id']?>','<?=$yuloListing->id?>')" class="like-icon" data-tip-content="Add to Bookmarks"></span>
						</div>

						<div class="listing-carousel">
                            <?php foreach ($yuloListing->images as $propertyImage): ?>
								<div><?=$this->html->image('/property_images/'.$propertyImage->imageurl)?></div>
                            <?php endforeach;  ?>
						</div>
					</a>
					
					<div class="listing-content">

						<div class="listing-title">
							<h4><a href=""><?= mb_strimwidth($yuloListing->listing_title, 0, 20, "...") ?></a></h4>
							<a href="" class="listing-address popup-gmaps">
								<i class="fa fa-map-marker"></i>
								<?= mb_strimwidth($yuloListing->listing_address.', '.$yuloListing->state->name, 0, 27, "...") ?>
							</a>

							<?= $this->Html->link(__('Details'), ['controller' => 'Properties', 'action' => 'display',$yuloListing->id],['class'=>'details button border']) ?>
						</div>

						<ul class="listing-details">
							<li>Area <span><?php if(!empty($yuloListing->listing_square_area))
                                                {
                                            echo $yuloListing->listing_square_area.' sq ft';}
                                            else{
                                                echo ' NA';
                                                
                                            }
									?></span></li>
							<li>Bedrooms <span><?=$yuloListing->listing_bedrooms?></span></li>
							<li>Bathrooms <span><?=$yuloListing->listing_bathrooms?></span></li>
								
						</ul>

						<div class="listing-footer">
							<a href="#"><i class="fa fa-user"></i> <?=$yuloListing->agent->fullname?></a>
							<span><i class="fa fa-calendar-o"></i> <?php 
										$olddate = $yuloListing->listing_date_added;
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
									?></span>
						</div>

					</div>

				</div>
                                <?php endforeach; ?>
				<!-- Listing Item / End -->
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
                        

		</div>


		<!-- Sidebar -->
		<div class="col-lg-4 col-md-4">
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
</div>
<script>
    
	/*----------------------------------------------------*/
/*  save bookmark
/*----------------------------------------------------*/
function saveBookmark2(userid, listingid) {
    
    var span = $("#bm").hasClass("liked");
    
    if (userid == "NULL" || userid == "") {
        //alert("You have to log in for this property to br added to your bookmark");
		$("#loginRegisterModal").modal();
    } else {
        $.ajax({
           url: '../../bookmarks/add/'+userid+'/'+listingid,
            method: 'POST',
            dataType: 'text',
            data: {
                bookMark: 1,
                userid: userid,
                listingid: listingid,
            },
            success: function(response) {
                //console.log(response);
                //location.href = redirect;
            }
        });
    }
}

function saveBookmark22(userid, listingid) {
    
    var span = $("#bm").hasClass("liked");
    
    if (userid == "NULL" || userid == "") {
        //alert("You have to log in for this property to br added to your bookmark");
		$("#loginRegisterModal").modal();
    } else {
        $.ajax({
           url: '../bookmarks/add/'+userid+'/'+listingid,
            method: 'POST',
            dataType: 'text',
            data: {
                bookMark: 1,
                userid: userid,
                listingid: listingid,
            },
            success: function(response) {
                alert('the property has been bookmarked');
                //console.log(response);
                //location.href = redirect;
            }
        });
    }
}

	
</script>


