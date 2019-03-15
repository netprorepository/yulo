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
            <div class="admin-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3><?= ucwords($admin->name)?></h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>                    
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a data-placement="bottom" title="Full Screen" href="sign-in.html" ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="/yulo/admins/admindashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email"></i><span>Mail Box</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="mail-inbox.html">Inbox</a></li>
                    </ul>
                </li>
                <li><a href="events.html"><i class="zmdi zmdi-calendar-check"></i><span>Events</span> </a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property</span> </a>
                    <ul class="ml-menu">
                        <li><a href="property-list.html">Property List</a></li>
                        <li><a href="property-list3.html">3 Column</a></li>
                        <li><a href="property-list4.html">4 Column</a></li>                        
                        <li><a href="add-property.html">Add Property</a></li>
                        <li><a href="property-detail.html">Property Detail</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Types</span> </a>
                    <ul class="ml-menu">
                        <li><a href="apartment.html">Apartment</a></li>
                        <li><a href="office.html">Office</a></li>
                        <li><a href="shop.html">Shop</a></li>                        
                        <li><a href="villa.html">Villa</a></li>
                    </ul>
                </li><li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Agents</span> </a>
                    <ul class="ml-menu">
                        <li><a href="agent.html">All Agents</a></li>
                        <li><a href="add-agent.html">Add Agent</a></li>                       
                        <li><a href="agent-profile.html">Agent Profile</a></li>
                        <li><a href="agent-invoice.html">Agent Invoice</a></li>
                    </ul>
                </li>
                <li><a href="map.html"><i class="zmdi zmdi-pin"></i><span>Map</span></a></li>
                <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
                <li><a href="widgets.html"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blogger</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="blog.html">Blog List</a></li>
                        <li> <a href="blog-details.html">Blog Single</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Extra Pages</span> </a>
                    <ul class="ml-menu">
                        <li><a href="sign-in.html">Sign In</a> </li>
                        <li><a href="sign-up.html">Sign Up</a> </li>
                        <li><a href="forgot-password.html">Forgot Password</a> </li>
                        <li><a href="404.html">Page 404</a> </li>
                        <li><a href="500.html">Page 500</a> </li>
                        <li><a href="page-offline.html">Page Offline</a> </li>
                        <li><a href="locked.html">Locked Screen</a> </li>
                        <li><a href="blank.html">Blank Page</a> </li>
                        <li><a href="contact.html">Contact Us</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="basic-form-elements.html">Basic Form Elements</a> </li>
                        <li> <a href="advanced-form-elements.html">Advanced Form Elements</a> </li>
                        <li> <a href="form-examples.html">Form Examples</a> </li>
                        <li> <a href="form-validation.html">Form Validation</a> </li>
                        <li> <a href="form-wizard.html">Form Wizard</a> </li>
                        <li> <a href="editors.html">Editors</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                    <ul class="ml-menu">
                        <li><a href="typography.html">Typography</a> </li>
                        <li><a href="helper-classes.html">Helper Classes</a></li>
                        <li><a href="alerts.html">Alerts</a> </li>
                        <li><a href="animations.html">Animations</a> </li>
                        <li><a href="badges.html">Badges</a> </li>
                        <li><a href="breadcrumbs.html">Breadcrumbs</a> </li>
                        <li><a href="buttons.html">Buttons</a> </li>
                        <li><a href="collapse.html">Collapse</a> </li>
                        <li><a href="colors.html">Colors</a> </li>
                        <li><a href="dialogs.html">Dialogs</a> </li>
                        <li><a href="icons.html">Icons</a> </li>
                        <li><a href="labels.html">Labels</a> </li>
                        <li><a href="list-group.html">List Group</a> </li>
                        <li><a href="media-object.html">Media Object</a> </li>
                        <li><a href="modals.html">Modals</a> </li>
                        <li><a href="notifications.html">Notifications</a> </li>
                        <li><a href="pagination.html">Pagination</a> </li>
                        <li><a href="preloaders.html">Preloaders</a> </li>
                        <li><a href="progressbars.html">Progress Bars</a> </li>
                        <li><a href="range-sliders.html">Range Sliders</a> </li>
                        <li><a href="sortable-nestable.html">Sortable & Nestable</a> </li>
                        <li><a href="tabs.html">Tabs</a> </li>
                        <li><a href="thumbnails.html">Thumbnails</a> </li>
                        <li><a href="tooltips-popovers.html">Tooltips & Popovers</a> </li>
                        <li><a href="waves.html">Waves</a> </li>
                    </ul>
                </li>
                <li class="header">LABELS</li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>Important</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Warning</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Skins</a></li>
            <li role="presentation"><a href="#chat" data-toggle="tab">Chat</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue" class="active">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span> </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="chat">
                <div class="demo-settings">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul>
                        <li class="online">
                            <div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar4.jpg" alt=""> </a>
                                <div class="media-body"> <span class="name">Claire Sassu</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span> </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar5.jpg" alt=""> </a>
                                <div class="media-body">
                                    <div class="media-body"> <span class="name">Maggie jackson</span> <span class="message">Can you share the...</span> <span class="badge badge-outline status"></span> </div>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar3.jpg" alt=""> </a>
                                <div class="media-body">
                                    <div class="media-body"> <span class="name">Joel King</span> <span class="message">Ready for the meeti...</span> <span class="badge badge-outline status"></span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h6>Contacts</h6>
                    <ul>
                        <li class="offline">
                            <div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar4.jpg" alt=""> </a>
                                <div class="media-body">
                                    <div class="media-body"> <span class="name">Joel King</span> <span class="badge badge-outline status"></span> </div>
                                </div>
                            </div>
                        </li>
                        <li class="online">
                            <div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar5.jpg" alt=""> </a>
                                <div class="media-body">
                                    <div class="media-body"> <span class="name">Joel King</span> <span class="badge badge-outline status"></span> </div>
                                </div>
                            </div>
                        </li>
                        <li class="offline">
                            <div class="media"> <a class="pull-left " role="button" tabindex="0"> <img class="media-object " src="assets/images/random-avatar6.jpg" alt=""> </a>
                                <div class="media-body">
                                    <div class="media-body"> <span class="name">Joel King</span> <span class="badge badge-outline status"></span> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li> <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                        <li> <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar --> 
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

