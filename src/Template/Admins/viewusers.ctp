<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
<div >
    
    <?= $this->Flash->render() ?>
     <?php if (!empty($users)): ?>
    <div> <br/>        
      <table id="manage-data" class="table table-striped table-hover table-bordered table-responsive" 
             style="font-family: sans-serif">
                                   <thead>
                                   <tr>
	
          <th ><?= __('Username') ?></th>
           <th><?= __('Verification Status') ?></th>
	  <th><?= __('Account Type') ?></th>
          <th><?= __('Join Date') ?></th>
          <th>Action</th>
          
                     
        </tr>
                                   </thead>
                                   <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td>   <?= h($user->username) ?></td>
	    
            <td> <?php if($user->verificationstatus=='verified'){echo'<span class="badge bg-green"> ' .$user->verificationstatus. '</span>';}
            else{echo'<span class="badge bg-red"> Unverified</span>';}?> 
            </td>
            <td><?= h($user->accounttype)?></td>
            
             <td>
       <?= h(date("d-M-Y h:i",strtotime($user->createdon)))?> 
             </td> 
             <td>
                 <?= $this->Form->postLink(__('Delete'), ['action' => 'deleteuser', $user->id], 
                         ['confirm' => __('Are you sure you want to delete # {0}?', $user->username),
                             'class'=>'btn  btn-raised btn-danger waves-effect']) ?> 
                             
                             <?php if($user->verificationstatus != "verified"){ echo '| '. $this->Html->link(__(' Verify'), ['action' => 'verifyuser', $user->id,'verify-user-account'],
                             ['confirm' => __('Are you sure you want to verify # {0}?', $user->username),'title'=>'verify '.$user->username,'class'=>'btn  btn-raised btn-info waves-effect']);} ?>
             </td>
               
        </tr>

        <?php endforeach; ?>
                                 
                                   </tbody>
                                  </table>   
       </div><br/>  <br/>  
    <?php endif; ?>
    
    </div>
<!--                    <div class="paginator pull-right">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
                   
                </div>
		</div>
             </div>
    </div>
</section>

