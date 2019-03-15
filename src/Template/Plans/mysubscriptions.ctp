
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Subscriptions History</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
                                    
   <table  id="manage-j"  class="table table-striped table-hover table-bordered table-responsive" 
             style="font-family: sans-serif; ">
                                   <thead>
            
				       <tr>
		
       <th >Plan</th>
           <th>Cost(₦)</th>
	   <th>Subscription Date</th>
	   <th>Expiration Date</th>
           <th>Status</th>
	   <th>Available Properties</th>
           <th>Uploaded Properties</th>
	            
        </tr>
                                   </thead>
                                   <tbody>
                                        
        <?php 
	foreach ($subscriptions as $subscription): ?>
        <tr>
	    <td>
                <?= h($subscription->plan->name) ?>
            </td>
	    
            <td>
      <?= h($subscription->plan->amount) ?>
             </td>
	     <td>
                 <?= h(date("d-M-Y",strtotime($subscription->startdate)))?>
             </td>
	     
	     <td>
                <?php if(strtotime($subscription->enddate)< (strtotime(date("d-M-Y")))){  ?>
 <span class="badge bg-red">  <?= h(date("d-M-Y",strtotime($subscription->enddate)))?> </span>                               
       <?php }
       
       else {echo '<span class="badge bg-green">'.date("d-M-Y",strtotime($subscription->enddate)).'</span>'; }
       ?>
             </td>
             
             <td>  <?= h($subscription->sub_status) ?> </td>
             
	     <td>
                 <?= $this->Number->format($subscription->no_of_properties_available) ?>
             </td>
	     <td>
               <?= $this->Number->format($subscription->no_of_properties_uploaded) ?>
             </td>  
	      </tr>

        <?php endforeach; ?>
                                   
                                   </tbody>
                                  </table>                        
                                    
                                    
                                    
                                    
                                    		</div>
			</div>
		</div>       
    </div>
</section>
