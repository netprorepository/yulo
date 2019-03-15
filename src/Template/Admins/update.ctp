<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update Property</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                           <?= $this->Form->create($property,['type'=>'file']) ?>
                        <div class="row clearfix"><?= $this->Flash->render() ?>
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_title" value="<?=$property->listing_title ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_address" value="<?=$property->listing_address ?>">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" 
                                                  name="listing_description" value="<?=$property->listing_description ?>" >
                                    </div>
                                </div>
                            </div>
                            
                                 <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('category_id', ['options' => $categories,'empty' => true,'required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-lg-3 col-md-3" id="cat_type">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('categorytype_id', ['label'=>'Category Type','options' => $category_types,'empty' => true,'required'],
                                           ['class'=>'form-control show-tick','id'=>'cat_type'])?>
                                   
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('categorysubtype_id', ['label'=>'Category SubType','options' => $categorysubtypes,'empty' => true,'required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                            
                                <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('state_id', ['label'=>'State','options' => $states,'empty' => true,'required','onChange'=>'getCities(this.value)'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-lg-3 col-md-3" id="chosencities">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('city_id', ['label'=>'City','options' => $cities,'empty' => true,'required'],
                                           ['class'=>'form-control show-tick','id'=>'chosencities'])?>
                                   
                                </div>
                            </div>
                           
                         <div class="col-xs-12 col-lg-8 col-md-8"><br />
                                <h2 class="card-inside-title">Property Market Status</h2>
                                <div class="demo-radio-button">
                                    <input name="listing_market_status" type="radio" id="radio_1" value="Available" checked class="radio-col-light-blue"  />
                                    <label for="radio_1">Available</label>
                                    <input name="listing_market_status" type="radio" id="radio_2" value="Sold" class="radio-col-light-blue" />
                                    <label for="radio_2">Sold</label>
                                    <input name="listing_market_status" type="radio" id="radio_3" value="Rented" class="radio-col-light-blue" />
                                    <label for="radio_3">Rented</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="listing_price" value="<?=$property->listing_price?>">
                                        <label class="form-label"> Property Price</label>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Property Address"></textarea>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="row clearfix">
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_rooms" value="<?=$property->listing_rooms ?>">
                                        <label class="form-label"> Rooms</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_square_area" value="<?=$property->listing_square_area ?>">
                                        <label class="form-label">Square ft </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_zip" value="<?=$property->listing_zip ?>">
                                        <label class="form-label">Zip Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_age" value="<?=$property->listing_age ?>">
                                        <label class="form-label">Property Age</label>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_bathrooms" value="<?=$property->listing_bathrooms ?>">
                                        <label class="form-label">Number of Bathrooms</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_parking" value="<?=$property->listing_parking ?>">
                                        <label class="form-label">Parking Space</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_toilet" value="<?=$property->listing_toilet ?>">
                                        <label class="form-label">No of Toilets</label>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_video_link" value="<?=$property->listing_video_link ?>">
                                        <label class="form-label">Video Link</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_service_status" value="<?=$property->listing_service_status ?>">
                                        <label class="form-label">Service Status</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_other_features" value="<?=$property->listing_other_features ?>">
                                        <label class="form-label">Other Features</label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_premium" value="<?=$property->listing_premium ?>">
                                        <label class="form-label">Premium Status</label>
                                    </div>
                                </div>
                            </div>
                            
                          
            
                        </div>
                     <div class="col-xs-12 col-md-3 col-sm-6">
                         
                                        <input name="listing_images" type="file" multiple />
                                              <label class="form-label">Upload An Image</label>
                                    </div>
                                      
                                            
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                 <?= $this->Form->button('Update Property',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                        
    
                            </div>
                        </div>
                                            <?= $this->Form->end() ?> 
                    </div>
				</div>
			</div>
		</div>  
    </div>
</section>
<script type="text/javascript">
    function getCities(cityid){
 //alert('am called');
    $.ajax({
        url: '/yulo/properties/getcities/'+cityid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
          //  console.log(response); return;
            document.getElementById('chosencities').innerHTML = "";
            document.getElementById('chosencities').innerHTML = response;
            //location.href = redirect;
        }
    });

}

    function getcattypes(catyid){
 //alert('am called');
    $.ajax({
        url: '/yulo/properties/getcategorytypes/'+catyid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
           console.log(response); return;
           document.getElementById('cat_type').innerHTML = "";
           document.getElementById('cat_type').innerHTML = response;
            //location.href = redirect;
        }
    });

}

    </script>
