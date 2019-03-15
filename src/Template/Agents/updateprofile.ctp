<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Update Account</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
				<?= $this->Form->create($agent,['type'=>'file']) ?><?= $this->Flash->render() ?>	
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" value="<?=$agent->title ?>" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="fullname" value="<?=$agent->fullname ?>" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="phone" value="<?=$agent->phone ?>" class="form-control" placeholder="Phone No.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
<!--                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Date of Birth">
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="addres" value="<?=$agent->addres ?>" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group drop-custum">
                                    <select name="gender" class="form-control show-tick">
                                        <option value="">-- Gender --</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="street" value="<?=$agent->street ?>" class="form-control" placeholder="Street">
                                    </div>
                                </div>
                            </div>

  <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="locality" value="<?=$agent->locality ?>" class="form-control" placeholder="locality">
                                    </div>
                                </div>
                            </div>
 <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                     <input type="text" name="fb" value="<?=$agent->fb ?>" class="form-control" placeholder="facebook url">
                                    </div>
                                </div>
                            </div>

 <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                     <input type="text" name="tw" value="<?=$agent->tw ?>" class="form-control" placeholder="twittwr url">
                                    </div>
                                </div>
                            </div>


 <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                     <input type="text" name="gg" value="<?=$agent->gg ?>" class="form-control" placeholder="g+ url">
                                    </div>
                                </div>
                            </div>


 <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                     <input type="text" name="in" value="<?=$agent->in ?>" class="form-control" placeholder="Linkedin url">
                                    </div>
                                </div>
                            </div>
                        </div>
                                            
                                            <div class="row clearfix">                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="about" value="<?=$agent->about ?>" class="form-control no-resize" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                                            
                                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                      <?= $this->Form->control('state_id', ['label'=>'STATE','options' => $states, 'empty' => 'select state']);?>
                                    </div>
                                </div>
                            </div>
                                            
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                                                             </div>
                                    <div class="fallback">
                                        <input class="form-control" name="pix_url" type="file" />
                                    </div>
                               
                            </div>
                        </div>
                        
                    </div>
      <?= $this->Form->button('Submit',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
<br /><br />
				</div>
    			</div>
		</div>
               
    </div>
</section>

