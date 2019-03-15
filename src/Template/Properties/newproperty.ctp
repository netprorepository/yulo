<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>New Property</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                           <?= $this->Form->create($property,['type'=>'file']) ?>
                                            <?= $this->Flash->render() ?>
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_title" >
                                        <label class="form-label">Property Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_address">
                                        <label class="form-label">Property Location</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Property Description"
                                                  name="listing_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                                 <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('category_id', ['options' => $categories,'empty' => true,'required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('categorytype_id', ['options' => $category_types,'empty' => true,'required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('categorysubtype_id', ['label'=>'Category SubType','options' => $categorysubtypes,'empty' => true,'required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                                  <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('state_id', ['label'=>'State','options' => $states,'empty' => true,'required','onChange'=>'getCities(this.value)'],
                                           ['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                    
                           
                            
                            <div class="col-xs-12 col-lg-3 col-md-3" id="chosencities">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('city_id', ['label'=>'City','options' => $cities,'empty' => true,'required', 'id'=>'chosencities'],
                                           ['class'=>'form-control show-tick'])?>
                                   
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
                                        <input class="form-control" name="listing_price" required>
                                        <label class="form-label">Price / Rent</label>
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
                                        <input class="form-control" name="listing_rooms">
                                        <label class="form-label">Bedrooms</label>
                                    </div>
                                </div>
                            </div>
                            
<!--                              <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="listing_bedrooms">
                                        <label class="form-label">No Of Bedrooms</label>
                                    </div>
                                </div>
                            </div>-->
                            
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_square_area">
                                        <label class="form-label">Square ft </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_zip">
                                        <label class="form-label">Zip Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_age">
                                        <label class="form-label">Property Age/Built Year</label>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_bathrooms">
                                        <label class="form-label">Number of Bathrooms(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_parking">
                                        <label class="form-label">Number of Car/Parking Space(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_toilet">
                                        <label class="form-label">Number of Toilets(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_video_link">
                                        <label class="form-label">Video Link?(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_service_status">
                                        <label class="form-label">Service Status ?(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_other_features">
                                        <label class="form-label">Any Other Special Features ?(optional)</label>
                                    </div>
                                </div>
                            </div>
                            
<!--                            
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="listing_premium">
                                        <label class="form-label">Premium Status ?(optional)</label>
                                    </div>
                                </div>
                            </div>-->
                            
                          
            
                        </div>
                     <div class="col-xs-12 col-md-3 col-sm-6">
                         
                         <input name="listing_images" type="file" multiple required/>
                                              <label class="form-label">Upload An Image</label>
                                    </div>
                                      
                                            
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                 <?= $this->Form->button('Add Property',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                        
    
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
        url: '../properties/cities/'+cityid,
        method: 'POST',
        dataType: 'text',
        success: function(response) {
           // console.log(response); return;
            document.getElementById('chosencities').innerHTML = "";
            document.getElementById('chosencities').innerHTML = response;
            //location.href = redirect;
        }
    });

}
    </script>