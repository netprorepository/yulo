
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>My Active Subscription Plan</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
<div class="plans index large-9 medium-8 columns content">
   
   
    <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="card property">
                    <div class="property-card m-b-15">
                        <div class="row">
                           
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="property-content">
                                        <div class="listingInfo">
                                            <div class="">
                                                <h4 class="text-success m-t-0">Price(₦) : <?= h(number_format($active_subscription->amountpaid)) ?></h4>
                                                <h4 class="m-t-0"><a href="#" class="col-blue-grey">Name : <?= h($active_subscription->plan->name) ?></a></h4>
                                            </div>
                                            <div class="detail">
                                                <p class="text-muted"><i class="zmdi"></i> <b>Description</b> : <?= h($active_subscription->plan->desc) ?></p>
                                                <p class="text-muted"><b>No. Of Premium Properties :</b> <?= $this->Number->format($active_subscription->plan->premium_listing) ?></p>
                                                <p class="text-muted"><b>No. Of Properties : </b> <?= $this->Number->format($active_subscription->no_of_properties_available) ?></p>
                                                <p class="text-muted"><b>Availability(days) : </b> <?= $this->Number->format($active_subscription->plan->property_availability) ?></p>
                                                
                                                
                                                <p class="text-muted"><b>Uploaded Properties : </b> <?= $this->Number->format($active_subscription->no_of_properties_uploaded) ?></p>
                                                <p class="text-muted"><b>Subscription Date : </b> <?= h(date("d-M-Y",strtotime($active_subscription->startdate)))?> </p>
                                                <p class="text-muted"><b>Expiration Date : </b> 
       
       <?php if(strtotime($active_subscription->enddate)< (strtotime(date("d-M-Y")))){  ?>
 <span class="badge bg-red">  <?= h(date("d-M-Y",strtotime($active_subscription->enddate)))?> </span>                               
       <?php }
       
       else {echo '<span class="badge bg-green">'.date("d-M-Y",strtotime($active_subscription->enddate)).'</span>'; }
       ?>
       
       </p>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
</div>
                                       <br />   <br /> <br />   <br /><br />          
                        <div class="clearfix"></div>
				</div>
			</div>
		</div>       
    </div>
</section>


