<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Agent Profile</h2>
            <small class="text-muted">Account Verification Status : <?php if($agent->verification_status==='file_uploaded')
            {echo '<span class="badge bg-red">Pending</span>';} 
            else{echo '<span class="badge bg-green">'.$agent->verification_status.'</span>';}
                ?></small> </div>
        <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="card agent">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <div class="agent-avatar"><?=$this->html->image('/profile_pix/'.$agent->pix_url,['class'=>'img-responsive','height'=>'31','width'=>'230'])?></div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                            <div class="agent-content">
                                <div class="agent-name">
                                    <h3 class="col-blush m-t-0"><?= ucfirst($agent->fullname)?></h3>
                                    <span><?= ucfirst($agent->addres)?></span>
                                    <p class="m-t-20"><?= ucfirst($agent->about)?></p>
                                   <p class="m-t-20"><?= ucfirst($agent->street.' '.$agent->state->name.' '.$agent->country)?></p>
                                    
                                </div>                                    
                                <ul class="agent-contact-details">
                                    <li><i class="zmdi zmdi-phone"></i><span><?= $agent->phone?></span></li>
                                    <li><i class="zmdi zmdi-email"></i><?= $agent->user->username?></li>
                                </ul>
                                <ul class="social-icons">
<!--                                    <a  href="<?= h('http://'.str_replace("http://","",$agent->fb))?>" target="blank"> <?= h($agent->company_website) ?></a>-->
	  
                                    <li><a class="facebook" href="<?= h('http://'.str_replace("http://","",$agent->fb))?>"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a class="twitter" href="<?= h('http://'.str_replace("http://","",$agent->tw))?>"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a class="gplus" href="<?= h('http://'.str_replace("http://","",$agent->gg))?>"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    <li><a class="linkedin" href="<?= h('http://'.str_replace("http://","",$agent->in))?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body"> 
                         Nav tabs 
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#report" data-toggle="tab" aria-expanded="false">Biography</a></li>
                            <li role="presentation" class=""><a href="#timeline" data-toggle="tab" aria-expanded="true">Activities</a></li>
                        </ul>
                        
                         Tab panes 
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="report">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <div class="post-box">
                                            
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                                        </div>
                                        <hr>
                                        <div class="post-box">
                                            <h4>Skill Set</h4>
                                            <div class="body p-l-0 p-r-0">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <div>English</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%"> <span class="sr-only">80% Complete (success)</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>Marketing</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:50%"> <span class="sr-only">50% Complete</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>Communication</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>Maths</div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:20%"> <span class="sr-only">20% Complete (danger)</span> </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Education</h4>
                                        <ul class="dis">
                                            <li>Primary School (Year 1 to 6)</li>
                                            <li>Secondary School (Year 7 to 11)</li>
                                            <li>Colleges (BCA)</li>
                                        </ul>
                                        <hr>
                                        <h4>Certification</h4>
                                        <ul class="dis">
                                            <li>Integer aesent vest .</li>
                                            <li>Praesent vestibulum dapibus nibh.</li>
                                            <li>Integer tinciaesent vest dunt.</li>
                                            <li>Praesent vestibulum dapibus nibh.</li>
                                            <li>Integer tincidunt.</li>
                                            <li>Praesent vestibulum dapibus nibh.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>It is a long established.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>There are many variations</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Contrary to popular belief </p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>vacation</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text--muted">Thu, 10 Mar</div>
                                                <p>Contrary to popular belief</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Sat, 5 Mar</div>
                                                <p>Routine Checkup</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text-small">Sun, 11 Feb</div>
                                                <p>Blood checkup test</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Thu, 17 Jan</div>
                                                <p>Admission</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>
<!-- main content -->

