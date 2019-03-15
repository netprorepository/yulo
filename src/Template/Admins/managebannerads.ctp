<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
<div >
    
    <?= $this->Flash->render() ?>
     <?php if (!empty($adverts)): ?>
    <div> <br/>        
      <table id="manage-data" class="table table-striped table-hover table-bordered table-responsive" 
             style="font-family: sans-serif">
                                   <thead>
                                   <tr>
	
          <th ><?= __('User') ?></th>
           <th><?= __('Ad') ?></th>
           <th><?= __('Cost(₦)') ?></th>
	  <th><?= __('Subscription Date') ?></th>
          <th><?= __('Expiry Date') ?></th>
         
          <th><?= __('Status') ?></th>
          <th>Action</th>
          
                     
        </tr>
                                   </thead>
                                   <tbody>
        <?php foreach ($adverts as $advert): ?>
        <tr>
            <td>   <?= h($advert->user->username) ?></td>
            <td>   <?=$this->Html->image('../ad_images/'.$advert->advert_url,['style'=>'width:50px;height:50px;'])?></td> 
            <td>   ₦<?= h($advert->amount) ?></td>
            <td>    <?= h(date("d-M-Y",strtotime($advert->uploaddate)))?> </td>
	    
            <td> <?php $duration = $advert->duration*30;
          $expiration_date =  Date("d-M-Y", strtotime($advert->startdate."+".$duration."days"));
            if(strtotime(date("d-M-Y",strtotime($expiration_date)))>strtotime((date("d-M-Y"))))
                    {echo'<span class="badge bg-green"> ' .date("d-M-Y",strtotime($expiration_date)). '</span>';}
            else{echo'<span class="badge bg-red">'.date("d-M-Y",strtotime($expiration_date)).' </span>';}?> 
            </td>
            <td>
            <?php 
            if($advert->status=='Aproved'){
               echo'<span class="badge bg-green"> ' .h($advert->status). '</span>'; 
            }
            elseif($advert->status=='Rejected'){
              echo'<span class="badge bg-red">'.h($advert->status).' </span>';  
            }
            else{
              echo'<span class="badge bg-yellow">'.h($advert->status).' </span>';  
            }
            
            ?>
           </td>
           
           <td>
                 <?= $this->Html->link(__('Edit'), ['controller'=>'Admins','action' => 'editad',
                     $advert->id,$admin->id,$expiration_date],['style'=>'color: green']) ?> |
                <?php if($advert->status =='aproved'){
                    echo $this->Html->link(__('Reject'), ['controller'=>'Admins','action' => 'rejectad',
                     $advert->id,$admin->id,$expiration_date],
                            ['confirm' => __('Are you sure you want to reject this ad by # {0}?', $advert->user->username),
                                'style'=>'color: yellow']);
                    
                }
                else{
                    echo $this->Html->link(__('Aprove'), ['controller'=>'Admins','action' => 'approvead',
                     $advert->id,$admin->id,$expiration_date],
                            ['confirm' => __('Are you sure you want to aprove this ad by # {0}?', $advert->user->username),
                                'style'=>'color: blue']);
                }
                
                ?> |
               <?= $this->Form->postLink(__('Delete'), ['controller'=>'Admins','action' => 'deletead',
                     $advert->id,$admin->id,$expiration_date],
                        ['confirm' => __('Are you sure you want to delete this ad by # {0}?', $advert->user->username),
                          'style'=>'color: red']) ?>
                 
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



