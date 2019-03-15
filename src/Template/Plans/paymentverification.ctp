<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Subscription Receipt</h2>
           
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Invoice Detail</h2>
                       
                    </div>
                    <div class="body">
                        <div class="clearfix">
                            <div class="pull-left"> 
                                <h4 class="text-right"><?=$this->html->image('logo.png',['width'=>'70','alt'=>'subscription invoice'])?></h4>                                                
                            </div>
                            <div class="pull-right">
                                <h4>Reference No # <br>
                                    <strong><?=$subscription->reference?></strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">                                                
                                <div class="pull-left mt-20">
                                    <address>
                                      <strong>Netpro Int. ltd.</strong><br>
                                      29 Umaru Diko Street Jabi<br>
                                      Abuja Nigeria<br>
                                      <abbr title="Phone">P:</abbr> +234705 360-0036
                                      </address>
                                </div>
                                <div class="pull-right mt-20">
                                    <p><strong>Subscription Date: </strong> <?= h(date("D-M-Y",strtotime($subscription->transaction_date)))?></p>
                                    <p class="m-t-10"><strong>Subscription Status: </strong> <span class="badge bg-green">Active</span></p>
                                    <p class="m-t-10"><strong>Subscription ID: </strong> #<?=$subscription->id?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-40"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                        <thead>
                                            
                                            <th>Plan Name</th>
                                            <th>Cost(₦)</th>
                                            <th>Transaction Date</th>
                                            <th>Description</th>
                                            <th>Payment Status</th>
                                           
                                        </tr></thead>
                                        <tbody>
                                            <tr>
                                              
                                                <td><?php if($plan_id==2){echo'Extended';
                                                
                                                }
                                                elseif($plan_id==3){
                                                    echo'Professional';
                                                }
                                                elseif($plan_id==4){
                                                    echo 'Ultimate';
                                                }
                                                
                                                ?></td>
                                                <td><?= number_format($subscription->amount/100) ?></td>
                                                <td><?= h(date("d-M-Y",strtotime($subscription->transaction_date)))?></td>
                                                <td><?= h($subscription->description)?>.</td>
                                                <td><?= h($subscription->gateway_response)?></td>
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                      
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content -->
