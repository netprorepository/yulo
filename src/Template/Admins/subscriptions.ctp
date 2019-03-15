<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
<div >
    
    <?= $this->Flash->render() ?>
     <?php if (!empty($subscriptions)): ?>
    <div> <br/>        
      <table id="manage-data" class="table table-striped table-hover table-bordered table-responsive" 
             style="font-family: sans-serif">
                                   <thead>
                                   <tr>
	
          <th ><?= __('Agent') ?></th>
           <th><?= __('Plan') ?></th>
           <th><?= __('Cost(₦)') ?></th>
	  <th><?= __('Subscription Date') ?></th>
          <th><?= __('Expiry Date') ?></th>
          <th><?= __('Assigned Properties') ?></th>
          <th><?= __('Uploaded') ?></th>
          <th><?= __('Status') ?></th>
          <th>Action</th>
          
                     
        </tr>
                                   </thead>
                                   <tbody>
        <?php foreach ($subscriptions as $user): ?>
        <tr>
            <td>   <?= h($user->agent->fullname) ?></td>
            <td>   <?= h($user->plan->name) ?></td> 
            <td>   <?= h($user->plan->amount) ?></td>
            <td>    <?= h(date("d-M-Y",strtotime($user->startdate)))?> </td>
	    
            <td> <?php if(strtotime(date("d-M-Y",strtotime($user->enddate)))>strtotime((date("d-M-Y"))))
                    {echo'<span class="badge bg-green"> ' .date("d-M-Y",strtotime($user->enddate)). '</span>';}
            else{echo'<span class="badge bg-red">'.date("d-M-Y",strtotime($user->enddate)).' </span>';}?> 
            </td>
            <td><?= h($user->no_of_properties_available)?></td>
            <td><?= h($user->no_of_properties_uploaded)?></td>
            <td><?= h($user->sub_status)?></td>
            <td>
                 <?= $this->Html->link(__('Edit'), ['controller'=>'Admins','action' => 'editsubscription',
                     $user->id,$user->agent->fullname]) ?>
                 
             </td>
               
        </tr>

        <?php endforeach; ?>
                                 
                                   </tbody>
                                  </table>   
       </div><br/>  <br/>  
    <?php endif; ?>
    
    </div>
                   
                </div>
		</div>
             </div>
    </div>
</section>


