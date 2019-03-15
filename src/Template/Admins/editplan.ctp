<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update Plan</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                            <?= $this->Flash->render() ?>
                                            <?= $this->Form->create($plan) ?>
    <fieldset>
     

           <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="name" value="<?=$plan->name?>">
                                        <label class="form-label"> Name</label>
                                    </div>
                                </div>
                            </div>
        
        <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="amount" value="<?=$plan->amount?>">
                                        <label class="form-label"> Price</label>
                                    </div>
                                </div>
                            </div>
           <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="premium_listing" value="<?=$plan->premium_listing?>">
                                        <label class="form-label"> No. Of Premium Properties</label>
                                    </div>
                                </div>
                            </div>
        
         <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="number_of_properties" value="<?=$plan->number_of_properties?>">
                                        <label class="form-label"> No. Of Properties</label>
                                    </div>
                                </div>
                            </div>
        
          <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="property_availability" value="<?=$plan->property_availability?>">
                                        <label class="form-label"> Duration(days)</label>
                                    </div>
                                </div>
                            </div>
        
        <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" type="number" name="status" value="<?=$plan->status?>">
                                        <label class="form-label"> Status</label>
                                    </div>
                                </div>
                            </div>
        
        
           <div class="col-lg-12 col-md-12  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="properties" value="<?=$plan->properties?>">
                                        <label class="form-label"> Properties</label>
                                    </div>
                                </div>
                            </div>
        
           <div class="col-lg-12 col-md-12  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="description" value="<?=$plan->description?>">
                                        <label class="form-label"> Description</label>
                                    </div>
                                </div>
                            </div>
         <div class="col-lg-12 col-md-12  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="push_ups" value="<?=$plan->push_ups?>">
                                        <label class="form-label"> No. of PushUps</label>
                                    </div>
                                </div>
                            </div>
      
        
    </fieldset>
    <?= $this->Form->button('Update Plan',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                <br /> 
    <?= $this->Form->end() ?>
                                            
                            <br /> <br />              
                                            
                                             </div>
				</div>
			</div>
		</div>  
    </div>
</section>
