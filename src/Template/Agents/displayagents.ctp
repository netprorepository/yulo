<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Agents</h2>
				<span>List of Our Agents</span>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="/">Home</a></li>
						<li>Properties</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<!-- Main Search Input -->
			<div class="main-search-input margin-bottom-40">
				<input onkeyup="filterAgent(this.value)" type="text" class="ico-01" placeholder="Type an agent name"/>
				<!--button class="button">Search</button-->
			</div>
		</div>


		<div class="col-md-12">
			<div id="agentdiv" class="row">

				<!-- Agents Container -->
				<div class="agents-grid-container">

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

				</div>
				<!-- Agents Container / End -->

			</div>
		</div>


		<div class="col-md-12">
			<div class="clearfix"></div>
			<!-- Pagination -->
			<div class="pagination-container margin-top-20">
				<nav class="pagination">
					<ul>
						<li><a href="#" class="current-page">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
					</ul>
				</nav>

				<nav class="pagination-next-prev">
					<ul>
						<li><a href="#" class="prev">Previous</a></li>
						<li><a href="#" class="next">Next</a></li>
					</ul>
				</nav>
			</div>
			<!-- Pagination / End -->
		</div>

	</div>
</div>

