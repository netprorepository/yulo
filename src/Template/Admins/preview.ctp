<!-- main content -->
  <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Disapprove Property</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= $this->Form->create(null,[ 'url' => ['controller' => 'Admins', 'action' => 'propertydisapprovalmail']]); ?> 
						<div class="form-group">
							<p class="alert alert-info" style="display: none;" id="rel"> </p>
							
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
                                                               
                                                      echo $this->Form->control('property_id',['type'=>'hidden','value'=>$property->id]);    
                                                      echo $this->Form->control('listing_title',['type'=>'hidden','value'=>$property->listing_title]);
                                                     echo $this->Form->control('agent_name',['type'=>'hidden','value'=>$property->agent->fullname]);
                                                      echo $this->Form->control('agent_email',['type'=>'hidden','value'=>$property->agent->user->username]);
							?>	
						</div>
						
		 <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Comment"
                                                  name="comment"></textarea>
                                    </div>
                                </div>
                            </div>
					</div>
					<div class="modal-footer">
						 <?= $this->Form->button('Disapprove',['class'=>'btn btn-primary']) ?>
					</div>
					<?= $this->Form->end() ?>
					</div>
				</div>
				</div>
				<!--/modal end -->

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Property Preview</h2>
            
        </div>        
        <div class="row clearfix"> <?= $this->Flash->render() ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="card">
                    <div class="body property">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                  <?php $count = 0; foreach ($property->images as $yuloListing): ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>"></li>
                                          <?php endforeach; ?>
                            </ol>
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                 <?php  foreach ($property->images as $yuloListing): ?>
                                <div class="item active"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl,['height'=> '250'])?> </div>
                                <div class="item"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl)?>  </div>
                                <div class="item"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl)?>  </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> 
              </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                        </div>

            </div>
           
        </div>
                        <div class="property-card">
                            <div class="property-content">
                                <div class="listingInfo">
                                    <div class="">
                                        <h4 class="text-success m-t-15">₦<?=number_format($property->listing_price)?></h4>
                                        <h4 class="m-t-0"><a href="#" class="col-blue-grey"><?=$property->listing_title?></a></h4>
                                    </div>
                                    <div class="detail">                                           
                                        <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?=$property->listing_address.', '.$property->state->name?></p>
                                        <p class="m-b-0">
                                            <?=h($property->listing_description)?>
                                        </p>
                                    </div>
                                </div>
                                <div class="property-action m-t-15">
                                    <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?=$property->listing_square_area?></span></a>
                                    <a href="#" title="Bedrooms"><i class="zmdi zmdi-hotel"></i><span><?=$property->listing_bedrooms?></span></a>
                                    <a href="#" title="Car Parking space"><i class="zmdi zmdi-car-taxi"></i><span><?=$property->listing_parking?></span></a>
                                    <a href="#" title="Other features"><i class="zmdi zmdi-home"></i><span> <?= $property->listing_other_features ?></span></a>
         <a href="#" title="Availability"><i class="zmdi zmdi-settings"></i><span>Availability : <?=$property->listing_market_status?></span></a>
                      <a href="#" title="Display status"><i class="zmdi zmdi-view-dashboard"></i><span> Display Status : <?=$property->listing_display_status?></span></a>
          <button type="button" class="btn btn-raised g-bg-blue pull-right" data-toggle="modal" data-target="#exampleModal" style="background-color: blue !important;">
					Disapprove this property
					</button>
                                    
             <?php if($property->listing_status!="approved"){
                                                   echo $this->Html->link(__('Aprove'), 
                                                    ['action' => 'approveproperty',$property->id,$this->GenerateUrl($property->listing_title)],
                                            ['title'=>'disaprove this property','class'=>'btn btn-raised btn-info waves-effect',
                                                'confirm' => __('Are you sure you want to disaprove this property # {0}?', $property->listing_title)]);         
                                            }?> 
                               <br /> <br />
                                
                                </div><br /> <br />
                            </div>
                         </div><br /> <br />
                    </div>
            <br /> <br />
                </div>
       
    </div>
</section>
