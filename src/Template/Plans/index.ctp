
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Subscription Plans</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
<div class="plans index large-9 medium-8 columns content">
    <h3><?= __('Plans') ?></h3>
    
    <?php foreach ($plans as $plan): ?>
    <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="card property">
                    <div class="property-card m-b-15">
                        <div class="row">
                           
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="property-content">
                                        <div class="listingInfo">
                                            <div class="">
                                                <h4 class="text-success m-t-0">Price(₦) : <?= h($plan->amount) ?>/m</h4>
                                                <h4 class="m-t-0"><a href="#" class="col-blue-grey">Name : <?= h($plan->name) ?></a></h4>
                                            </div>
                                            <div class="detail">
                                                <p class="text-muted"><i class="zmdi"></i> <b>Description</b> : <?= h($plan->desc) ?></p>
                                                <p class="text-muted m-b-0"><b>No. Of Premium Properties :</b> <?= $this->Number->format($plan->premium_listing) ?></p>
                                                <p class="text-muted m-b-0"><b>No. Of Properties : </b> <?= $this->Number->format($plan->number_of_properties) ?></p>
                                                <p class="text-muted m-b-0"><b>Availability(days) : </b> <?= $this->Number->format($plan->property_availability) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                      <?php if($plan->id != 1){ 
                          echo $this->Html->link(__('SUBSCRIBE'), ['action' => 'subscribe',$plan->id,$this->GenerateUrl('subscribe to '.$plan->name.' plan')],
                      ['class'=>'btn btn-raised g-bg-blue pull-right']);}
                      ?>
                                                   

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <?php endforeach; ?>

</div>
                                       <br />   <br /> <br />   <br /><br />          
                        <div class="clearfix"></div>
				</div>
			</div>
		</div>       
    </div>
</section>

