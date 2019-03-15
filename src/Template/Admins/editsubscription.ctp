<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update Agent's Subscription</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                           <?= $this->Form->create($subscription) ?>
                        <div class="row clearfix"><?= $this->Flash->render() ?>
                            <div class="col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="agent_name" value="<?=$subscription->agent->fullname ?>">
                                       <label class="form-label">Agent Name</label>
                                        
                                    </div>
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
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datetimepicker form-control"
                                               name="enddate" value="<?= date("Y-m-d",strtotime($subscription->enddate)) ?>" >
                                       <label class="form-label">Subscription End Date</label>
                                    </div> 
                                </div>
                            </div>
                          
                            
                                 <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('amountpaid', ['label'=>'Amount Paid','required'],['class'=>'form-control'])?>
                                   
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-lg-3 col-md-3" id="cat_type">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('no_of_properties_available', ['label'=>'No Of properties','required'],
                                           ['class'=>'form-control'])?>
                                   
                                </div>
                            </div>
                            
                              <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('no_of_properties_uploaded', ['label'=>'No Of Properties Uploaded','required'],['class'=>'form-control'])?>
                                   
                                </div>
                            </div>
                            
                            
                                <div class="col-xs-12 col-lg-3 col-md-3">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('sub_status', ['label'=>'Status','required'],['class'=>'form-control'])?>
                                   
                                </div>
                            </div>
                            
                             <div class="col-xs-12 col-lg-3 col-md-3" id="chosencities">
                                <div class="form-group drop-custum">
                                   <?= $this->Form->control('pushed_ups', ['label'=>'Pushed Up Properties','required'],
                                           ['class'=>'form-control'])?>
                                   
                                </div>
                            </div>
                     
                        </div>
             
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                 <?= $this->Form->button('Update',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                        
    
                            </div>
                        </div>
                                            <?= $this->Form->end() ?> 
                    </div>
				</div>
			</div>
		</div>  
    </div>
</section>


