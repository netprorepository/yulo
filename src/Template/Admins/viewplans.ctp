<!-- main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card property">
<div class="row clearfix">
    
    <?= $this->Flash->render() ?>
     <?php if (!empty($all_plans)): ?>
       <div   > <br/>        
      <table class="table table-striped table-hover table-bordered table-responsive" 
             style="font-family: sans-serif">
                                   <thead>
                                   <tr>
	
          <th ><?= __('Name') ?></th>
           <th><?= __('Cost') ?></th>
	  <th><?= __('Details') ?></th>
          <th><?= __('Properties') ?></th>
          <th><?= __('Premium') ?></th>
          <th><?= __('No. of Properties') ?></th>
          <th><?= __('Availability(days)') ?></th>
          <th><?= __('No of PushUps') ?></th>
           <th><?= __('ACTIONS') ?></th>
                     
        </tr>
                                   </thead>
                                   <tbody>
        <?php foreach ($all_plans as $plan): ?>
        <tr>
	 <td>   <?= h($plan->name) ?></td>
	    
            <td> <?=$plan->amount ?> </td>
            <td><?= h($plan->description)?></td>
            <td><?= h($plan->properties)?></td>
            <td><?= h($plan->premium_listing)?></td>
            <td><?= h($plan->number_of_properties)?></td>
            <td><?= h($plan->property_availability)?></td>
            <td><?= h($plan->push_ups)?></td>
             <td>
      <?= $this->Html->link(' Edit', ['controller' => 'Admins', 'action' => 'editplan',
          $plan->id,$this->GenerateUrl($plan->name)],['title'=>'edit this plan']) ?>
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
