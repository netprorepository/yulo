<!-- main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card property">
					<div class="header">
						<h2><?= $property->listing_title ?> Images</h2>
                       
					</div> <?= $this->Flash->render() ?>
                 
					<div class="body">
                                          
                         <div class="property-card m-b-15">
                            <div class="row">
                                
                               <?php  foreach ($property->images as $image):?>
                                <div class="col-sm-4" style="padding: 2px;">
                                    <div class="property-image" style="background: url('property_images/'<?= $image->imageurl?>) center center / cover no-repeat;">
                                        <?=$this->html->image('/property_images/'.$image->imageurl,['class'=>'property-image','height'=>'31','width'=>'330'])?>     
                                        <span class="property-label label label-danger">
                                       <?= $this->Form->postLink(' Delete', ['controller' => 'Properties', 'action' => 'deleteimage',$image->id,
                                          $this->GenerateUrl($property->listing_title)],['title'=>'delete this image',
                                              'style'=>'color: white','confirm' => __('Are you sure you want to delete this image for # {0}?', $property->listing_title)]) ?> 
                                        </span>
                                    </div>
                                     </div>
                                    <?php endforeach; ?>
                               
                              
                            </div>
                         </div>
      
                    </div>
                 
        
				</div>
            </div>
		</div>
    </div>
</section>


