<!-- Container -->
<div class="container">

	<div class="row">
	<div class="col-md-6 col-md-offset-4">

	
	<!--Tab -->
	<div class="my-account style-1 margin-top-5 margin-bottom-40">
            
           <div class="adverts form large-9 medium-8 columns content">
    
</div> 
           
<?= $this->Flash->render() ?>
		

		<div class="tabs-container alt">
                    

			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
                            
                            
                            <?= $this->Form->create($advert,['type'=>'file']) ?>
    <fieldset>
       
        <?php
            $duration = ['1'=>'One Month','3'=>'Three Months(-10%)','6'=>'Six Months(-10%)'];
            echo $this->Form->control('advert_url',['label'=>'Upload Your Ad','type'=>'file','required']);
             echo $this->Form->control('duration',['label'=>'Duration','options'=>$duration,'required',
                 'onchange'=>'calculatestandardprice(this.value);']);
             echo '<br />';
           // echo $this->Form->control('uploaddate');
              echo '<br />';
            echo $this->Form->control('amount',['id'=>'amount','value'=>50000]);
           // echo $this->Form->control('startdate');
          //  echo $this->Form->control('enddate');
           // echo $this->Form->control('status');
           // echo $this->Form->control('aprovedby');
           // echo $this->Form->control('adsize');
          //  echo $this->Form->control('adtype');
        ?>
    </fieldset>
    <?= $this->Form->button('Save And Proceed To Payment',['class'=>'button border fw margin-top-10 pull-right']) ?>    
    <?= $this->Form->end() ?>
                            
                            
                            
			</div>

			

		</div>
	</div>



	</div>
	</div>

</div>
<!-- Container / End -->



<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<!-- Wrapper / End -->


</body>
</html>

<script type="text/javascript">
    
      
     //calculates price for a plan based on chosen period
    function calculatestandardprice(obj){
	//alert(obj);
       var base_charge = 50000;
        var percentage_discount = 10;
        if((obj === '3')){
         base_charge = 150000;
           var discount = (base_charge*percentage_discount/100);
	   var charge = base_charge-discount;
          // alert(base_charge);
	   document.getElementById("amount").value = charge;
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+discount;
           document.getElementById("amount").innerHTML="AMOUNT TO PAY : ₦"+charge;
        }
        else if(obj==='6'){
       base_charge = 300000;
           var discount = (base_charge*percentage_discount/100);
	   var charge = base_charge-discount;
          // alert(base_charge);
	   document.getElementById("amount").value = charge;
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+discount;
           document.getElementById("amount").innerHTML="AMOUNT TO PAY : ₦"+charge;
        }
        
        else{
          // alert(base_charge);
	   document.getElementById("amount").value = 50000;
	   document.getElementById("discount").innerHTML="APPLICABLE DISCOUNT : ₦"+0+".00";
           document.getElementById("amount").innerHTML="AMOUNT TO PAY : ₦50000";
            
        }

    }
    
    
    </script>
    
    
