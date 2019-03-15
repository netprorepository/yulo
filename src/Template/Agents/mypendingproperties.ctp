<!-- main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card property">
					<div class="header">
						<h2>My Property List</h2>
                       
					</div> <?= $this->Flash->render() ?>
                    <?php if(!empty(array_filter($pending_properties->toArray()))){ ?>
					<div class="body">
                                            <?php foreach ($pending_properties as $property):  ?>
                         <div class="property-card m-b-15">
                            <div class="row">
                                <div class="col-sm-4">
                               <?php $count =0; foreach ($property->images as $image): $count++; ?>
                                    <div class="property-image" style="background: url('property_images/'<?= $image->imageurl?>) center center / cover no-repeat;">
                                        <?=$this->html->image('/property_images/'.$image->imageurl,['class'=>'property-image','height'=>'31','width'=>'330'])?>     
                                        <span class="property-label label label-danger"><?= $property->category->category_name ?></span>
                                    </div>
                                    <?php if ($count==1){break;} ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-sm-8">
                                    <div class="property-content">
                                        <div class="listingInfo">
                                            <div class="">
                                                <h4 class="text-success m-t-0">₦<?= number_format($property->listing_price) ?></h4>
                                                <span>
                                                
                              <?= $this->Html->link($property->listing_title, ['controller' => 'Properties', 'action' => 'preview',$property->id,$this->GenerateUrl($property->listing_title)],['class'=>'col-blue-grey']) ?> |
                               <?= $this->Html->link(' Update Property', ['controller' => 'Properties', 'action' => 'Update',$property->id,$this->GenerateUrl($property->listing_title)],['title'=>'update property details']) ?> 
                 <?php foreach ($agent->subscriptions as $sub){ 
                     if(($sub->pushed_ups <$sub->plan->push_ups)&&($property->push_up_status !='pushed_up')){ 
                         echo '| '. $this->Html->link(' Push Up', ['controller' => 'Properties', 'action' => 'pushupproperty',$property->id,$sub->id,$this->GenerateUrl($property->listing_title)],
                                 ['title'=>'push up this property so it shows tops on every search','confirm' => __('Are you sure you want to push up # {0}?', $property->listing_title)]);
                } }
                 echo ' | '.$this->Html->link(__('Delete Images'), ['controller'=>'Properties','action' => 'viewimages',$property->id,$this->GenerateUrl($property->listing_title)],
                                                    ['title'=>'view and delete images']);
                ?>
                                                </span>
                                            </div>
                                            <div class="detail">                                           
                                                <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?= $property->listing_address.','.$property->state->name ?></p>
                                                <p class="text-muted m-b-0"><?= $property->listing_description ?></p>
                                            </div>
                                        </div>
                                        <div class="property-action m-t-15">
                                            <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?= $property->listing_square_area ?></span></a>
                                            <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span><?= $property->listing_rooms ?></span></a>
                                            <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span><?= $property->listing_parking?></span></a>
                                            <a href="#" title="Other Features"><i class="zmdi zmdi-home"></i><span> <?= $property->listing_other_features ?></span></a>
                                            <a href="#" title="Display status"><i class="zmdi zmdi-calendar-check"></i><span> <?php 
                                            if($property->listing_display_status=="false"){echo 'Sold/Rented';}else{    echo 'Available';} ?>
                                                </span></a>
                                           
                                            <?php if($property->listing_display_status=="false"){echo $this->Html->link(__('Mark As Available'), 
                                                    ['action' => 'makeavailable',$property->id,$this->GenerateUrl($property->listing_title)],
                                            ['title'=>'change property status so it shows on home page','class'=>'btn btn-raised btn-info waves-effect']);}
                                                        else {
                                                   echo $this->Html->link(__('Mark As Sold/Rented'), 
                                                    ['action' => 'changedisplaystatus',$property->id,$this->GenerateUrl($property->listing_title)],
                                            ['title'=>'change property status so it does show again on home page','class'=>'btn btn-raised btn-info waves-effect']);         
                                            }?> |
                                         <?= $this->Html->link(__('+ More Images'), ['controller'=>'Properties','action' => 'addimage',$property->id,$this->GenerateUrl($property->listing_title)],
                                                    ['title'=>'upload more images','class'=>'btn btn-raised btn-primary waves-effect']) ?> 
                                                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                                            <?php endforeach; ?>
          <div class="paginator pull-right">
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
                    
                    <?php } else{
                        echo 'Sorry, you have not uploaded any property yet.';
                    }  ?>
        
				</div>
            </div>
		</div>
    </div>
</section>


