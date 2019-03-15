<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127406067-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127406067-1');
</script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Yulo</title>
<link rel="icon" href="/img/logo.png" type="image/x-icon"><!-- Favicon-->
  <?php 
echo $this->Html->meta('logo.png','/img/logo.png',['type' => 'icon', 'rel' => 'shortcut icon']); ?>

    <?= $this->Html->css(['bootstrap.min','bootstrap-material-datetimepicker','waitMe','bootstrap-select',
        'morris','dropzone','main_1','all-themes']) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars --> 

<!-- Morphing Search  -->
<div id="morphsearch" class="morphsearch">
   
    <!-- /morphsearch-content --> 
    <span class="morphsearch-close"></span> </div>

<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="container-fluid">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="/">Yulo Nigeria</a> </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i> <span class="label-count">7</span> </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-account-add"></i></div>
                                <div class="menu-info">
                                    <h4>12 new members joined</h4>
                                    <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-cyan"><i class="zmdi zmdi-shopping-cart-plus"></i></div>
                                <div class="menu-info">
                                    <h4>4 sales made</h4>
                                    <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-orange"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> changed name</h4>
                                    <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue-grey"><i class="zmdi zmdi-comment-alt-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> commented your post</h4>
                                    <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-green"><i class="zmdi zmdi-refresh-alt"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> updated status</h4>
                                    <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings updated</h4>
                                    <p> <i class="material-icons">access_time</i> Yesterday </p>
                                </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            <!-- #END# Notifications --> 
            <!-- Tasks -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i><span class="label-count">9</span> </a>
                <ul class="dropdown-menu">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks">
                            <li> <a href="javascript:void(0);">
                                <h4> Task 1 <small>32%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 2 <small>45%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4>Task 3 <small>54%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%"> </div>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <h4> Task 4 <small>65%</small> </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%"> </div>
                                </div>
                                </a> </li>                          
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                </ul>
            </li>
            <!-- #END# Tasks -->
            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <?=$this->html->image('/profile_pix/'.$agent->pix_url,['class'=>'img-responsive'])?></div>
            <div class="admin-action-info"> <span>Welcome</span>
                <span><?=$agent->fullname?></span>
                
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open">
                    <a href="/agents/agentdashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                
                </li>
 
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property Manager</span> </a>
                    <ul class="ml-menu">
                      <li>  <?= $this->Html->link(__(' Property List'),
		['controller'=> 'Properties','action' => 'managemyproperties'],['title'=>'list your property ']) ?>
                      </li>
            
                     <li>  <?= $this->Html->link(__(' Add Property'),
		['controller'=> 'Properties','action' => 'newproperty'],['title'=>'list your property ']) ?>
                     </li>
                     
                     <li>  <?= $this->Html->link(__(' Subscription Plans'),
		['controller'=> 'Plans','action' => 'index'],['title'=>'subscription plans']) ?>
                      </li>
     
                    </ul>
                    
                                          
                </li>
                
                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Subscriptions</span> </a>
                     <ul class="ml-menu">
                      <li>  <?= $this->Html->link(__(' Subscription Plans'),
		['controller'=> 'Plans','action' => 'index'],['title'=>'view subscription plans ']) ?>
                      </li>
            
                     <li>  <?= $this->Html->link(__(' My Subscription'),
		['controller'=> 'Plans','action' => 'mysubscriptions'],['title'=>'list your property ']) ?>
                     </li>
                     
                        
                       <li>  <?= $this->Html->link(__(' Active Subscription'),
		['controller'=> 'Plans','action' => 'activesubscription'],['title'=>'active subscription']) ?>
                     </li>
                      
                      <li>  <?= $this->Html->link(__(' My Subscriptions'),
		['controller'=> 'Plans','action' => 'mysubscriptions'],['title'=>'list your property ']) ?>
                     </li>
                        
                    </ul>
                </li>
                
                  <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>My Account</span> </a>
                     <ul class="ml-menu">
                      <li>  <?= $this->Html->link(__(' Verify My Account'),
		['controller'=> 'Agents','action' => 'verifyaccount'],['title'=>'verify my account ']) ?>
                      </li>
            
                     <li>  <?= $this->Html->link(__(' My Profile'),
		['controller'=> 'Agents','action' => 'myprofile'],['title'=>'view profile']) ?>
                     </li>
                       <li>  <?= $this->Html->link(__(' Update Profile'),
		['controller'=> 'Agents','action' => 'updateprofile',$agent->id,$this->GenerateUrl($agent->fullname)],['title'=>'update profile']) ?>
                     </li>
                        
                    </ul>
                </li>

                <li class="text-danger">  <?= $this->Html->link(__(' Logout'),
		['controller'=> 'Users','action' => 'logout'],['title'=>'logout','class'=>'zmdi zmdi-chart-donut col-red',
                    'style'=>'margin-left: 20px;']) ?></li>
          
                  </ul>
            
        </div>
        <!-- #Menu -->
    </aside>
   
</section>
<!--Side menu and right menu -->

<!-- main content -->

 
         <?= $this->Flash->render() ?>
 
        <?= $this->fetch('content') ?>
   
        
	
<!-- main content -->

<div class="color-bg"></div>


    <?= $this->Html->script(['libscripts.bundle','vendorscripts.bundle','mainscripts.bundle','autosize','moment','dropzone','bootstrap-material-datetimepicker','jquery.sparkline.min','Chart.bundle.min',
       'basic-form-elements', 'morphing','chartjs.min','index']) ?>
    <?= $this->fetch('script') ?>

</body>
</html>
