<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Create Subscription</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                           <?= $this->Form->create($subscription) ?>
                       
                          <?= $this->Flash->render() ?>
                         
                        <div class="row clearfix">
                          
                         
                              <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('plan_id', ['label'=>'Plans','options' => $plans,'empty' => 'Select Plan','required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                            
                                <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('agent_id', ['label'=>'State','options' => $agents,'empty' => 'Select Agent','required'],['class'=>'form-control show-tick'])?>
                                   
                                </div>
                            </div>
                            
                             <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datetimepicker form-control" name="startdate" value="<?= date("Y-m-d",strtotime($subscription->startdate)) ?>">
                                       <label class="form-label">Subscription Start Date</label>
                                    </div>  
                                </div>
                            </div>
                            
                              <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datetimepicker form-control"
                                               name="enddate" value="<?= date("Y-m-d",strtotime($subscription->enddate)) ?>" >
                                       <label class="form-label">Subscription End Date</label>
                                    </div> 
                                </div>
                            </div>
                        
                            
                            
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="amountpaid">
                                        <label class="form-label"> Amount Paid</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_of_properties_available" >
                                        <label class="form-label"> Available Properties</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_of_properties_uploaded" >
                                        <label class="form-label">Properties Uploaded </label>
                                    </div>
                                </div>
                            </div>
             
                        </div>
                  <div class="row clearfix">
                            <div class="col-xs-12">
                                 <?= $this->Form->button('Submit',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                        
    
                            </div>
                        </div>
                                            <?= $this->Form->end() ?> 
                    </div>
				</div>
			</div>
		</div>  
    </div>
</section>

