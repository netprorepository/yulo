<!-- main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card property">
					<div class="header">
						<h2><?=ucwords(strtolower($agent->fullname)) ?>'s Property List</h2>
                       
					</div> <?= $this->Flash->render() ?>
                  
					<div class="body">
                                            <?php foreach ($agent_properties as $property):  ?>
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
                                            <a href="#" title="Display status"><i class="zmdi zmdi-settings"></i><span>Display status : <?=$property->listing_display_status?>
                                                </span></a>
                                           
                                            <?php if($property->listing_status=="aproved"){echo $this->Html->link(__('Disaprove'), 
                                                    ['action' => 'disapproveproperty',$property->id,$this->GenerateUrl($property->listing_title)],
                                            ['title'=>'disapprove this property','class'=>'btn btn-raised btn-danger waves-effect',
                                                'confirm' => __('Are you sure you want to aprove this property # {0}?', $property->listing_title)]);}
                                                        else {
                                                   echo $this->Html->link(__('Aprove'), 
                                                    ['action' => 'approveproperty',$property->id,$this->GenerateUrl($property->listing_title)],
                                            ['title'=>'disaprove this property','class'=>'btn btn-raised btn-info waves-effect',
                                                'confirm' => __('Are you sure you want to disaprove this property # {0}?', $property->listing_title)]);         
                                            }?> 
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
                    
              
        
				</div>
            </div>
		</div>
    </div>
</section>



