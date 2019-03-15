<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Receipt For Banner Ad Payment</h2>
           
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
                                    <strong><?=$advert->trnxref?></strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">                                                
                                <div class="pull-left mt-20">
                                    <address>
                                      <strong>Netpro Int. ltd.</strong><br>
                                      29 Umary Dikko Street Jabi<br>
                                      Abuja Nigeria<br>
                                      <abbr title="Phone">P:</abbr> (123) 456-34636
                                      </address>
                                </div>
                                <div class="pull-right mt-20">
                                    <p><strong>Payment Date: </strong> <?= h(date("D-M-Y",strtotime($advert->uploaddate)))?></p>
                                    <p class="m-t-10"><strong>Subscription Status: </strong> <span class="badge bg-green">Active</span></p>
                                    <p class="m-t-10"><strong>Subscription ID: </strong> #<?=$advert->trnxref?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-40"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                        <thead>
                                            
                                            <th>Product Name</th>
                                            <th>Cost(₦)</th>
                                            <th>Transaction Date</th>
                                            <th>Description</th>
                                            <th>Payment Status</th>
                                           
                                        </tr></thead>
                                        <tbody>
                                            <tr>
                                              
                                                <td>Banner Ad</td>
                                                <td><?= number_format($advert->amount/100) ?></td>
                                                <td><?= h(date("d-M-Y",strtotime($advert->uploaddate)))?></td>
                                                <td>Payment for placement of banner ad on Yulo.ng for a period of <?=$advert->duration?> months</td>
                                                <td><?= h($advert->trnxstatus)?></td>
                                                
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
