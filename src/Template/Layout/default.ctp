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
<?= $this->Html->charset() ?>
<!-- Basic Page Needs
================================================== -->
<title itemprop='name'> <?php echo (!isset($title))? $this->fetch("title") : $title; ?> | Yulo Nigeria</title>
<link rel="icon" href="/img/YULO LOGO 262X262 PIXELS.png" type="image/x-icon">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--  facebook and twitter cards    -->
<?php 
$decription = "";
if(isset($property->listing_description)){
    //url for facebook graph
    $url = "https://yulo.ng/properties/display/$property->id.'/'".$this->GenerateUrl($title);
    $ampurl = "https://yulo.ng/properties/ampdisplay/$property->id.'/'".$this->GenerateUrl($title);
    $count = 0;
foreach ($property->images as $propertyImages){
    if(!empty($propertyImages->imageurl)){
      $share_image =   $propertyImages->imageurl;
       $count++; 
    }
    if($count >=1){break;}
}
    $decription =$property->listing_description; }
else{$decription = "Yulo is an online property market wher you can buy, rent, lease or sell your properties";
$url = "https://yulo.ng";
}

?>
<meta name="original-source" content="<?=$url?>" />
<link rel="canonical" href="<?=$url?>" />
<link rel="publisher" href="https://www.facebook.com/yulonaija/"/>
<link rel="amphtml" href="<?=$ampurl?>">

<?php if(isset($share_image)){$share = "https://www.yulo.ng/property_images/".$share_image;}else{$share = "https://www.yulo.ng/img/logo.png";}  ?>
<meta property="og:title" content="<?=$title?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?=$url?>" />
<meta property="og:image" content="<?=$share ?>" />
<meta property="og:description" content="<?= substr($decription,0,200)?>." />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?= substr($decription,0,200)?>" />
<meta name="twitter:site" content="@yulonaija" />
<meta name="twitter:title" content="<?=$title ?>" />
<meta name="twitter:image" content="<?=$share ?>" />
<!-- CSS
================================================== -->


<?= $this->Html->css('style.css') ?>
<?= $this->Html->css('main.css') ?>
<?= $this->Html->css('custom.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>


</head>

<body>

    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!-- Wrapper -->
<div id="wrapper">


<!-- Header Container
================================================== -->
<header id="header-container" class="header-style-2">
<?php 
	$userdata = $this->request->session()->read('userdetails');
?>
	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo" class="margin-top-10">
					<a href="/"><?=$this->Html->image('logo.png')?></a>
					<!-- Logo for Sticky Header -->
					<a href="/" class="sticky-logo"><?=$this->Html->image('logo.png')?></a>
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
			<div class="right-side hidden-xs">
				<ul class="header-widget">
					<li>
						<i class="sl sl-icon-call-in"></i>
						<div class="widget-content">
							<span class="title">Questions?</span>
							<span class="data">(0705) 360-0036 </span>
						</div>
					</li>

					<li>
						<i class="sl sl-icon-location"></i>
						<div class="widget-content">
							<span class="title">Email</span>
							<span class="data">ask@yulo.ng</span>
						</div>
					</li>

					<li class="with-btn"><a href="" class="button border">Submit Property</a></li>
				</ul>
			</div>
			<!-- Right Side Content / End -->

		</div>

		<!-- Main Navigation -->
		<nav id="navigation" class="style-2">
			<div class="container">
					<ul id="responsive">

						<li>
							<!--a class="current" href="#">For Sale</a-->
							<?= $this->Html->link(__(' For Sale'), ['controller'=>'properties','action' => 'propertiesforsale']) ?>
						</li>

						<li>
							<?= $this->Html->link(__(' To Rent'), ['controller'=>'properties','action' => 'propertiestorent']) ?>
						</li>

						<li><!--a href="#">Agent</a-->
							<?= $this->Html->link(__(' Agent'), ['controller'=>'agents','action' => 'displayagents']) ?>
						</li>

						<li><!--a href="#">Hostel</a-->
						<?= $this->Html->link(__(' Hostel'), ['controller'=>'properties','action' => 'hostels']) ?>
						</li>
						<?php 
							if($userdata['id'] == NULL || $userdata['id'] == ""){
						?>		
                                                <li class="right-side-menu-item">
    						<?= $this->Html->link(__(' Log In / Register'), ['controller'=>'users','action' => 'login'],['class'=>'fa fa-user','style'=>'font-size: 15px;']) ?>                       
                        </li>
						<?php		
							}else{
						?>
							<li class="right-side-menu-item">
								<!--?= $this->Html->link(__(' Account'), ['controller'=>'users','action' => 'login'],['class'=>'fa fa-user']) ?--> 
								<a href=""><i class="fa fa-user"></i> <?=$userdata['username']?></a>      
								<ul>
									<li>
										<?= $this->Html->link(__(' Bookmarks'), ['controller'=>'users','action' => 'bookmark']) ?>
									</li>
									<li>
										<?= $this->Html->link(__(' Change Password'), ['controller'=>'users','action' => 'changepassword']) ?>
									</li>
									<li>
										<!--a href="elements.html">Log out</a-->
										<?= $this->Html->link(__(' Log Out'), ['controller'=>'users','action' => 'logout']) ?>  
									</li>
								</ul>                    
							</li>
						<?php 
							}
						?>
					</ul>
			</div>
		</nav>
		<div class="clearfix"></div>
		<!-- Main Navigation / End -->
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->



    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

<div class="clearfix"></div>
    <!-- Footer
================================================== -->
<div id="footer" class="dark hidden-xs">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<?=$this->Html->Image('logo.png',['class'=>'footer-logo'])?>
				<br><br>
				<p>What use is a house if can't find it? Yulo, Houses, Hostels, Lodges, Land and Properties Market.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><?= $this->Html->link(__(' Log In / Register'), ['controller'=>'users','action' => 'login'])?></li>
					<!--li><a href="#">Add Property</a></li-->
					<!--li><?= $this->Html->link(__(' pricing'), ['controller'=>'plans','action' => 'showplans'])?></li-->
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><?= $this->Html->link(__(' FAQ'), ['controller'=>'plans','action' => 'faq']) ?></li>
					<li><?= $this->Html->link(__(' Our Agents'), ['controller'=>'agents','action' => 'displayagents']) ?></li>
					<li><?= $this->Html->link(__(' How it works'), ['controller'=>'plans','action' => 'howitworks']) ?></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<!--span>29 Umaru dikko street, Jabi, Abuja</span> <br-->
					Phone: <span>(0705) 360-0036 </span><br>
					E-Mail:<span> <a href="#">ask@yulo.ng</a> </span><br>
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
				<div class="copyrights" style="margin-top: 1px;">© <?php echo date("Y");?> Yulo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->

<div id="footer" class="dark visible-xs">
	<!-- Main -->
	<div class="container">
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights" style="margin-top: 1px;">© <?php echo date("Y");?> Yulo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
</div>

<!-- Scripts
================================================== -->
<?= $this->Html->script(
	[
		'jquery-2.2.0.min','chosen.min','magnific-popup.min',
		'owl.carousel.min','rangeSlider','sticky-kit.min','slick.min',
		'mmenu.min','tooltips.min','masonry.min','custom','myfunctions','bootstrap.min'
	]
) ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyChfU36iC8IZuyEb-ai9Y-ZIzrESoszy-Q"></script>

<?= $this->Html->script(['infobox.min','markerclusterer','maps'])?>
  <?= $this->fetch('script') ?>
<script>
    var geocoder = new google.maps.Geocoder();
	var address = "<?=$property->listing_address?>";
	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			$('propertyMap').attr('data-latitude', latitude);
			$('propertyMap').attr('data-longitude', longitude);
			document.getElementById('propertyMap').setAttribute("data-latitude", latitude);
			document.getElementById('propertyMap').setAttribute("data-longitude", longitude);
		} 
	}); 


	/*----------------------------------------------------*/
/*  save bookmark
/*----------------------------------------------------*/
function saveBookmark2(userid, listingid) {
    
    var span = $("#bm").hasClass("liked");
    
    if (userid == "NULL" || userid == "") {
        alert("You have to log in for this property to br added to your bookmark");
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
        alert("You have to log in for this property to br added to your bookmark");
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
                //console.log(response);
                //location.href = redirect;
            }
        });
    }
}


function getCategoryType(categoryid){
	console.log(categoryid);
}
	
</script>
<!--Start of Tawk.to Script--> 
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b2babfbeba8cd3125e30ebb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
