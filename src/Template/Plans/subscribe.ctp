
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Plans/Subscription Details</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
<div class="plans index large-9 medium-8 columns content">
  
    
    <div class="col-md-6 col-xs-12">
                <div class="card property">
                    <div class="property-card m-b-15">
                        <div class="row">
                          
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="property-content">
                                        <div class="listingInfo" style="font-size: 14px; padding: 10px; font-family: sans-serif">
                                            <div class="">
                                             <h4 class="m-t-0"><a href="#" class="col-blue-grey">Plan Name : <?= h($plan->name) ?></a></h4>
                                           <h4 class="text-success m-t-0">Price(₦) : <?=($plan->amount) ?>/m</h4> 
                                            </div>
                                            <div class="detail">
                                                <p class="text-muted"><i class="zmdi"></i> <b>Description</b> : <?= h($plan->desc) ?></p>
                                                <p class="text-muted m-b-0"><b>No. Of Premium Properties :</b> <?= $this->Number->format($plan->premium_listing) ?></p>
                                                <p class="text-muted m-b-0"><b>Total No. Of Properties : </b> <?= $this->Number->format($plan->number_of_properties) ?></p>
                                                <p class="text-muted m-b-0"><b>Availability/Subscription Period(days) : </b> <?= $this->Number->format($plan->property_availability) ?></p>
                                        <br />
                                                <p class="text-muted m-b-0" id="discount" style="font-weight: bold;"></p>
                                                <p class="text-muted m-b-0" id="topay" style="font-weight: bold;"> </p>   
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                      <?php if($plan->id != 1){             
       echo $this->Form->create(null,['url'=>['controller'=>'Plans','action'=>'proceedtopayment']]);
               
              echo $this->Form->input('plan_id', ['value' =>$plan->id,'type'=>'hidden']);
              echo'<br />';
            echo $this->Form->input('enddate',['label'=>'SUBSCRIPTION PERIOD :','class'=>'form-control', 
                'options'=>['1'=>'ONE MONTH','3'=>'THREE MONTHS','6'=>'SIX MONTHS','12'=>'TWELVE MONTHS'],
		'empty' => '--Choose--','required','onchange'=>'calculatestandardprice(this.value);']);
            echo $this->Form->input('amountpaid',['value'=>$plan->amount,'type'=>'hidden','class'=>' form-control','required','id'=>'amountpaid']);
	    
            
          //  echo $this->Form->control('agent_id', ['options' => $agents]);
           // echo $this->Form->control('startdate');
           // echo $this->Form->control('enddate');
        ?>
       <div  id="superpremiumplancharge" style="font-size: 20px; text-decoration: underline" class="text-info">
	
	</div>
      <center>
         
         <?= $this->Form->button('CONTINUE',['class'=>'btn btn-raised g-bg-blue pull-right'])?>
         
                                                     </center>
    <?= $this->Form->end() ?>
                                            
                      <?php }?>                          

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
                                       <br />   <br /> <br />   <br /><br />          
                        <div class="clearfix"></div>
				</div>
			</div>
		</div>       
    </div>
</section>

<script type="text/javascript">
    
      
     //calculates price for a plan based on chosen period
    function calculatestandardprice(obj){
	//alert(obj);
       var base_charge = <?=$plan->amount?>;
        var percentage_discount = 0;
        if((obj>=5) && (obj<=11)){
           percentage_discount = 5;
           var discount = (obj*base_charge*percentage_discount/100);
	   var charge = base_charge*obj-discount;
          // alert(base_charge);
	   document.getElementById("amountpaid").value = charge+"00";
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+discount+".00";
           document.getElementById("topay").innerHTML="AMOUNT TO PAY : ₦"+charge+".00";
        }
        else if(obj>11){
           percentage_discount = 10; 
           var discount = (obj*base_charge*percentage_discount/100);
	   var charge = base_charge*obj-discount;
          // alert(base_charge);
	   document.getElementById("amountpaid").value = charge+"00";
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+discount+".00";
           document.getElementById("topay").innerHTML="AMOUNT TO PAY : ₦"+charge+".00";
        }
        
         else if(obj<=4){
        
	   //percentage_discount = 1; 
           //var discount = (obj*base_charge*percentage_discount/100);
	   var charge = base_charge*obj;
            //alert(charge);
	   document.getElementById("amountpaid").value = charge+"00";
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+0+".00";
           document.getElementById("topay").innerHTML="AMOUNT TO PAY : ₦"+charge+".00";
            
        }
        
        else{
         
	   var charge = (obj*base_charge);
	   document.getElementById("amountpaid").value = charge+"00";
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+0+".00";
           document.getElementById("topay").innerHTML="AMOUNT TO PAY : ₦"+charge+".00";
            
        }

    }
    
    
    </script>
    
    
