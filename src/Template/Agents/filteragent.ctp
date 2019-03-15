 <?php 
                        foreach($propertiesagents as $propertiesagent):
                    ?>
					<!-- Agent -->
					<div class="grid-item col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="agent">
							<div class="agent-content">
								<div class="agent-name">
									<h4>
									<a href=""><?=ucfirst(strtolower($propertiesagent->fullname));?></a>
											<?php 
											if($propertiesagent->verification_status == 'verified'){
										?>
										<span style="float: right;"><img style="width: 50px;" src="../img/verify.png"/></span>
										<?php
										 }
										 ?>
									</h4>
									<span>Agent In
<?= mb_strimwidth($propertiesagent->state->name, 0, 16, "...") ?>
</span>
								</div>

								<ul class="agent-contact-details">
									<li><i class="sl sl-icon-call-in"></i><?=$propertiesagent->phone;?></li>
									<li><i class="fa fa-envelope-o "></i><a href=""><?=$propertiesagent->user->username;?></a></li>
								</ul>

								<ul class="social-icons">
									<li><a class="facebook" href="<?=$propertiesagent->fb;?>"><i class="icon-facebook"></i></a></li>
									<li><a class="twitter" href="<?=$propertiesagent->tw;?>"><i class="icon-twitter"></i></a></li>
									<li><a class="gplus" href="<?=$propertiesagent->gg;?>"><i class="icon-gplus"></i></a></li>
									<li><a class="linkedin" href="<?=$propertiesagent->ln;?>"><i class="icon-linkedin"></i></a></li>
								</ul>
								<div class="clearfix"></div>
                                <div class="agent-name">
									<h4>
                                                                           <?= $this->Html->link(__(' View Properties'), ['controller' => 'Agents', 'action' => 'agentproperties',$propertiesagent->id],
                                                                                   ['style'=>'margin-right: 7px;','class'=>'fa fa-angle-right']) ?> 
<!--                                                                            <a style="margin-right: 7px;" href="agentproperties">View Listing</a><i class="fa fa-angle-right"></i>-->
                                                                        </h4>
								</div>
							</div>

						</div>
					</div>
					<!-- Agent / End -->
					<?php 
                        endforeach;
                    ?>
