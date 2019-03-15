<!DOCTYPE html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127406067-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127406067-1');
</script>
<!-- Basic Page Needs
================================================== -->
<title>Yulo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php 
echo $this->Html->meta('logo.png','/img/logo.png',['type' => 'icon', 'rel' => 'shortcut icon']); ?>

<?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap','bootstrap.min','custom','icons','style','main']) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<!-- Compare Properties Widget
================================================== -->
<div class="compare-slide-menu">

	<div class="csm-trigger"></div>

	<div class="csm-content">
		<h4>Compare Properties <div class="csm-mobile-trigger"></div></h4>

		<div class="csm-properties">
			 
			<!-- Property -->
			<div class="listing-item compact">
				<a href="single-property-page-2.html" class="listing-img-container">
					<div class="remove-from-compare"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
						<span>For Sale</span>
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
					</div>
					<img src="images/listing-01.jpg" alt="">
				</a>
			</div>
			
			<!-- Property -->
			<div class="listing-item compact">
				<a href="single-property-page-2.html" class="listing-img-container">
					<div class="remove-from-compare"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
						<span>For Sale</span>
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
					</div>
					<img src="images/listing-03.jpg" alt="">
				</a>
			</div>
			
			<!-- Property -->
			<div class="listing-item compact">
				<a href="single-property-page-2.html" class="listing-img-container">
					<div class="remove-from-compare"><i class="fa fa-close"></i></div>
					<div class="listing-badges">
						<span>For Sale</span>
					</div>
					<div class="listing-img-content">
						<span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
					</div>
					<img src="images/listing-05.jpg" alt="">
				</a>
			</div>

		</div>

		<div class="csm-buttons">
			<a href="compare-properties.html" class="button">Compare</a>
			<a href="#" class="button reset">Reset</a>
		</div>
	</div>

</div>
<!-- Compare Properties Widget / End -->


<!-- Header Container
================================================== -->
<header id="header-container" class="header-style-2">
    <div class="clearfix"></div>
	<!-- Topbar / End -->


	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo" class="margin-top-10">
					 <a class="navbar-brand" href="/" >
               <?php echo $this->Html->image('logo.png',['alt'=>'Yulo',  'itemprop'=>'image'
          ,'height'=>'31','width'=>'230']);?>
               </a>
 </div>


				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
                                    <li>
						<i class="sl sl-icon-call-in"></i>
						<div class="widget-content">
							<span class="title">Questions?</span>
							<span class="data">+234 8034500616</span>
						</div>
					</li>

					<li>
						<i class="sl sl-icon-location"></i>
						<div class="widget-content">
							<span class="title">Email</span>
							<span class="data">info@yulo.ng</span>
						</div>
					</li>
    <li>                                  
                                              
<?= $this->Html->link(__(' Advertise My Property'),['controller'=> 'Users','action' => 'login'],['title'=>'list my properies','class'=>'button border']) ?>
				</li>	
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->
<div class="clearfix"></div> 
</header> 
<!-- Header Container / End -->


	<!-- Topbar -->
	<nav id="navigation" class="style-2">
			<div class="container">
					<ul id="responsive">
 <li> <?= $this->Html->link(__('For Sale'),
		['controller'=> 'Properties','action' => 'index'],['title'=>'Properties for sale ']) ?> </li>
<li> <?= $this->Html->link(__('To Rent'),['controller'=> 'Properties','action' => 'index'],['title'=>'Properties for sale ']) ?></li>
     <li><?= $this->Html->link(__('Agent'),['controller'=> 'Properties','action' => 'index'],['title'=>'Properties for sale ']) ?></li>
  <li><?= $this->Html->link(__('Hostel'),['controller'=> 'Properties','action' => 'index'],['title'=>'Properties for sale ']) ?></li>
					
				
  <li><?= $this->Html->link(__(' Login/Register'),
		['controller'=> 'Users','action' => 'login'],['title'=>'login to your account','class'=>'fa fa-user']) ?></li>
					
				</ul>

			</div>
			<!-- Left Side Content / End -->

		
	</nav>
	<div class="clearfix"></div>

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
 <?= $this->Form->create(null,[ 'url' => ['controller' => 'Properties', 'action' => 'searchproperties'],'class'=>'main-search-form']); ?> 
			
	<!-- Type -->
	<div class="search-type">
            <label class="active"><input class="first-tab" name="tab" checked="checked" value="any" type="radio">Any Status</label>
        <label><input name="tab" type="radio" value="for sale">For Sale</label>
        <label><input name="tab" type="radio" value="for rent">For Rent</label>
        <label><input name="tab" type="radio" value="hostel">Hostel</label>
	<div class="search-type-arrow"></div>
	</div>
	
							<!-- Box -->
       <div class="main-search-box">
								
								<!-- Main Search Input -->
      <div class="main-search-input larger-input">
         
   <input type="text" class="ico-01" placeholder="Enter address e.g. street, city and state or zip" name="address"/>
      <button class="button hidden-sm hidden-xs">Search</button>
      </div>

								<!-- Row -->
     <div class="row with-forms">

     <div class="col-md-4">
         <select data-placeholder="Any Type" class="chosen-select-no-single" name="housetype" >
	<option>Any Type</option>	
	<option>Flats</option>
	<option>Houses</option>
	<option>Land</option>
											
	</select>
	</div>

       <div class="col-md-4">
										
      <div class="select-input">
          <input type="text" placeholder="Min Price" data-unit="₦" name="minprice">
     </div>
	<!-- Select Input / End -->
     </div>

<!-- Max Price -->
    <div class="col-md-4">
										
	<!-- Select Input -->
   <div class="select-input">
       <input type="text" placeholder="Max Price" data-unit="₦" name="maxprice">
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

    <div class="col-md-6">
												
	<!-- Select Input -->
   <div class="select-input">
       <input type="text" placeholder="Min Area" data-unit="Sq Ft" name="minarea">
   </div>
 <!-- Select Input / End -->

	</div>

<!-- Max Price -->
   <div class="col-md-6">
												
	<!-- Select Input -->
    <div class="select-input">
        <input type="text" placeholder="Max Area" data-unit="Sq Ft" name="maxarea">
    </div>
   <!-- Select Input / End -->

  </div>

 </div>
<!-- Row / End -->


<!-- Row -->
  <div class="row with-forms">

 <!-- Min Area -->
    <div class="col-md-6">
    <select data-placeholder="Beds" class="chosen-select-no-single" >
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
	<select data-placeholder="Baths" class="chosen-select-no-single" >
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
			

<!-- Checkboxes -->
<div class="checkboxes in-row">
									
<input id="check-2" type="checkbox" name="check">
<label for="check-2">Air Conditioning</label>
<input id="check-3" type="checkbox" name="check">
<label for="check-3">Swimming Pool</label>

<input id="check-4" type="checkbox" name="check" >
<label for="check-4">Central Heating</label>
<input id="check-5" type="checkbox" name="check">
<label for="check-5">Laundry Room</label>	
<input id="check-6" type="checkbox" name="check">
<label for="check-6">Gym</label>

<input id="check-7" type="checkbox" name="check">
<label for="check-7">Alarm</label>

<input id="check-8" type="checkbox" name="check">
<label for="check-8">Window Covering</label>
									
</div>
<!-- Checkboxes / End -->

</div>
</div>
<!-- More Search Options / End -->

<button class="button visible-sm visible-xs pull-right">Search</button>
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


<div class="clearfix"></div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
<!-- Content
================================================== -->
<!--<div class="container">
	<div class="row">
	
		<div class="col-md-12">
			<h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
		</div>
		
		 Carousel 
		<div class="col-md-12">
			<div class="carousel">
				
				 Listing Item 
					<div class="carousel-item">
					<div class="listing-item">

						<a href="single-property-page-1.html" class="listing-img-container">

							<div class="listing-badges">
								<span class="featured">Featured</span>
								<span>For Sale</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">$275,000 <i>$520 / sq ft</i></span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>

							<div class="listing-carousel">
								<div><img src="images/listing-01.jpg" alt=""></div>
								<div><img src="images/listing-01b.jpg" alt=""></div>
								<div><img src="images/listing-01c.jpg" alt=""></div>
							</div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="single-property-page-1.html">Eagle Apartments</a></h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									9364 School St. Lynchburg, NY
								</a>
							</div>

							<ul class="listing-features">
								<li>Area <span>530 sq ft</span></li>
								<li>Bedrooms <span>2</span></li>
								<li>Bathrooms <span>1</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> David Strozier</a>
								<span><i class="fa fa-calendar-o"></i> 1 day ago</span>
							</div>

						</div>

					</div>
				</div>
				 Listing Item / End 


				 Listing Item 
				<div class="carousel-item">
					<div class="listing-item">

						<a href="single-property-page-2.html" class="listing-img-container">

							<div class="listing-badges">
								<span>For Rent</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">$900 <i>monthly</i></span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>

							<img src="images/listing-02.jpg" alt="">

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="single-property-page-2.html">Serene Uptown</a></h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									6 Bishop Ave. Perkasie, PA
								</a>
							</div>

							<ul class="listing-features">
								<li>Area <span>440 sq ft</span></li>
								<li>Bedrooms <span>2</span></li>
								<li>Bathrooms <span>1</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> Harriette Clark</a>
								<span><i class="fa fa-calendar-o"></i> 2 days ago</span>
							</div>

						</div>

					</div>
				</div>
				 Listing Item / End 


				 Listing Item 
				<div class="carousel-item">
					<div class="listing-item">

						<a href="single-property-page-1.html" class="listing-img-container">

							<div class="listing-badges">
								<span class="featured">Featured</span>
								<span>For Rent</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">$1700 <i>monthly</i></span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>

							<img src="images/listing-03.jpg" alt="">

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="single-property-page-1.html">Meridian Villas</a></h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									778 Country St. Panama City, FL
								</a>
							</div>

							<ul class="listing-features">
								<li>Area <span>1450 sq ft</span></li>
								<li>Bedrooms <span>2</span></li>
								<li>Bathrooms <span>3</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> Chester Miller</a>
								<span><i class="fa fa-calendar-o"></i> 4 days ago</span>
							</div>

						</div>
						 Listing Item / End 

					</div>
				</div>
				 Listing Item / End 


				 Listing Item 
				<div class="carousel-item">
					<div class="listing-item">


						<a href="single-property-page-3.html" class="listing-img-container">

							<div class="listing-badges">
								<span>For Sale</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">$420,000 <i>$770 / sq ft</i></span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>

							<div class="listing-carousel">
								<div><img src="images/listing-04.jpg" alt=""></div>
								<div><img src="images/listing-04b.jpg" alt=""></div>
							</div>

						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="single-property-page-3.html">Selway Apartments</a></h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									33 William St. Northbrook, IL
								</a>
							</div>

							<ul class="listing-features">
								<li>Area <span>540 sq ft</span></li>
								<li>Bedrooms <span>2</span></li>
								<li>Bathrooms <span>2</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> Kristen Berry</a>
								<span><i class="fa fa-calendar-o"></i> 3 days ago</span>
							</div>

						</div>
						 Listing Item / End 

					</div>
				</div>
				 Listing Item / End 


				 Listing Item 
				<div class="carousel-item">
					<div class="listing-item">


						<a href="single-property-page-1.html" class="listing-img-container">
							<div class="listing-badges">
								<span>For Sale</span>
							</div>

							<div class="listing-img-content">
								<span class="listing-price">$535,000 <i>$640 / sq ft</i></span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>

							<img src="images/listing-05.jpg" alt="">
						</a>
						
						<div class="listing-content">

							<div class="listing-title">
								<h4><a href="single-property-page-1.html">Oak Tree Villas</a></h4>
								<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
									<i class="fa fa-map-marker"></i>
									71 Lower River Dr. Bronx, NY
								</a>
							</div>

							<ul class="listing-features">
								<li>Area <span>350 sq ft</span></li>
								<li>Bedrooms <span>2</span></li>
								<li>Bathrooms <span>1</span></li>
							</ul>

							<div class="listing-footer">
								<a href="#"><i class="fa fa-user"></i> Mabel Gagnon</a>
								<span><i class="fa fa-calendar-o"></i> 4 days ago</span>
							</div>

						</div>
						 Listing Item / End 

					</div>
				</div>
				 Listing Item / End 



			</div>
		</div>
		 Carousel / End 

	</div>
</div>-->



<!-- Fullwidth Section -->
<section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

	<!-- Box Headline -->
	<h3 class="headline-box">What are you looking for?</h3>
	
	<!-- Content -->
	<div class="container">
		<div class="row">

			<div class="col-md-3 col-sm-6">
				<!-- Icon Box -->
				<div class="icon-box-1">

					<div class="icon-container">
						<i class="im im-icon-Office"></i>
						<div class="icon-links">
							<a href="listings-grid-standard-with-sidebar.html">69</a>
							<a href="listings-grid-standard-with-sidebar.html">Apartments For Sale</a>
						</div>
					</div>

					<h3>Apartments</h3>
					<p>Properties for Sale.</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<!-- Icon Box -->
				<div class="icon-box-1">

					<div class="icon-container">
						<i class="im im-icon-Home-2"></i>
						<div class="icon-links">
							<a href="listings-grid-standard-with-sidebar.html">300</a>
							<a href="listings-grid-standard-with-sidebar.html">Apartments For Rent</a>
						</div>
					</div>

					<h3>Apartments</h3>
					<p>Properties For Rent.</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<!-- Icon Box -->
				<div class="icon-box-1">

					<div class="icon-container">
						<i class="im im-icon-Car-3"></i>
						<div class="icon-links">
                                                   <a href="listings-grid-standard-with-sidebar.html">60</a>
							<a href="listings-grid-standard-with-sidebar.html">Agents</a>
							
						</div>
					</div>

					<h3>Agents</h3>
					<p>Agents With Registered Properties.</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<!-- Icon Box -->
				<div class="icon-box-1">

					<div class="icon-container">
						<i class="im im-icon-Clothing-Store"></i>
						<div class="icon-links">
							<a href="listings-grid-standard-with-sidebar.html">6</a>
							<a href="listings-grid-standard-with-sidebar.html">Hostels For Rent</a>
						</div>
					</div>

					<h3>Hostels</h3>
					<p>Hostels for Rent.</p>
				</div>
			</div>

		</div>
	</div>
</section>



<!-- Flip banner -->
<a href="listings-half-map-grid-standard.html" class="flip-banner parallax" data-background="img/Banner.jpg" data-color="#274abb" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
	<div class="flip-banner-content">
		<h2 class="flip-visible">We help people and homes find each other</h2>
		<h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->




<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="img/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Property</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Agents</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>+2348034500616 </span><br>
					E-Mail:<span> <a href="#">info@yulo.ng</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="https://www.facebook.com/yulonaija/"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="https://twitter.com/yulonaija"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="https://www.instagram.com/yulonaija/"><i class="icon-instagram"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date("Y");?> NetPro. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>




</div>
<!-- Wrapper / End -->

 
    <?= $this->Html->script(['jquery-2.2.0.min','chosen.min','magnific-popup.min','owl.carousel.min','rangeSlider',
        'sticky-kit.min','slick.min','masonry.min','mmenu.min','tooltips.min','custom']) ?>
    <?= $this->fetch('script') ?>
</body>
</html>
