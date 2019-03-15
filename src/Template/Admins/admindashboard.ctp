<!-- main content -->
<?php   $all = 0; $for_rent = 0; $for_sale = 0; $short_let = 0; $hostel = 0; $short_lease = 0; 
$live = 0; $aproval_status = 0; $pending = 0;
foreach ($allproperties as $property){
    $all++;
    if($property->category->category_name =='For Rent'){
       $for_rent++; 
    }
     if($property->listing_status=='approved'){
       $live++; 
    }
    
    if($property->category->category_name =='For Sale'){
       $for_sale++; 
    }
    if($property->category->category_name =='Short Lease'){
       $short_lease++; 
    }
    if($property->category->category_name =='Hostel'){
       $hostel++; 
    }
    if($property->category->category_name =='Short Let'){
       $short_let++; 
    }
    
     if($property->listing_status !='aproved'){
       $aproval_status++; 
    }
     if(($property->listing_display_status=='true')&&($property->listing_market_status=='Available')&&
          ($property->listing_status!='approved')){
       $pending++; 
    }
}
$verified_users = 0;
foreach ($users as $user){
    if($user->verificationstatus =='verified'){$verified_users++;}
    
}

?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
            
        </div>
        
        <div class="row clearfix top-report"> <?= $this->Flash->render() ?>
           
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?=$allproperties->count()?></h3>
                        <p class="text-muted">All Properties on Site</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=$live ?>" type="success">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$live ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$live ?>%;"></div>
                        </div>
                        <span class="text-small">Live :<?=$live?></span> </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?= $for_rent?></h3>
                        <p class="text-muted">Properties for Rent</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?= $for_rent?>" type="danger">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $for_rent?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $for_rent?>%;"></div>
                        </div>
                        <span class="text-small"><?= $for_rent?></span> </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?= $for_sale?></h3>
                       <p class="text-muted">Properties for Sale</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?= $for_sale?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?= $for_sale?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $for_sale?>%;"></div>
                        </div>
                        <span class="text-small"><?= $for_sale?></span> </div>
                </div>
            </div> 
            
             <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?=  $hostel?></h3>
                       <p class="text-muted">Hostels </p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=  $hostel?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=  $hostel?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=  $hostel?>%;"></div>
                        </div>
                        <span class="text-small"><?=  $hostel?></span> </div>
                </div>
            </div> 
            
             <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?= $short_lease?></h3>
                       <p class="text-muted">Properties For Short Lease </p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=$short_lease?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$short_lease?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $short_lease?>%;"></div>
                        </div>
                        <span class="text-small"><?= $short_lease?></span> </div>
                </div>
            </div> 
            
               <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?=$short_let?></h3>
                       <p class="text-muted">Properties For Short Letting </p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=$short_let?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$short_let?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $short_let?>%;"></div>
                        </div>
                        <span class="text-small"><?= $short_let?></span> </div>
                </div>
            </div>
            
            
              <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?= $pending?></h3>
                       <p class="text-muted"> <?= $this->Html->link('Pending Properties', ['controller' => 'Admins', 'action' => 'pendingproperties'],
                               ['title'=>'pending properties']) ?> </p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=$pending?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$pending?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $pending?>%;"></div>
                        </div>
                        <span class="text-small"><?= $pending?></span> </div>
                </div>
            </div>
            
             <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="panel-body">
                        <h3><?= $users->count()?></h3>
                       <p class="text-muted"> All Users </p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="<?=$users->count()?>" type="warning">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$users->count()?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $users->count()?>%;"></div>
                        </div>
                        <span class="text-small">Verified : <?= $verified_users?></span> </div>
                </div>
            </div>
            
        </div>                
      
	</div>
</section>
<!-- main content -->


