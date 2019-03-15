<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Create Banner Ad</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                                            <?= $this->Flash->render() ?>
                                           <?= $this->Form->create($advert, ['type' => 'file']) ?>
    <fieldset>
     
         <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="web_url" value=" ">
                                        <label class="form-label"> Website url(optional)</label>
                                    </div>
                                </div>
                            </div>
        

                            <?php echo '<div class="col-lg-4 col-md-6  col-xs-12">';
                            $duration = ['1' => 'One Month', '3' => 'Three Months(-10%)', '6' => 'Six Months(-10%)'];
                            echo $this->Form->control('advert_url', ['label' => 'Upload Your Ad', 'type' => 'file', 'required'],
                                    ['class'=>'form-control']);
                            
                            echo '</div>';
                            
                            echo '<div class="col-lg-4 col-md-6  col-xs-12">';
                            echo $this->Form->control('duration', ['label' => 'Duration', 'options' => $duration, 'required',
                                'onchange' => 'calculatestandardprice(this.value);'],['class'=>'form-control']);
                             echo '</div>';
                             
//                             echo '<div class="col-lg-4 col-md-6  col-xs-12">';
//                            echo $this->Form->control('web_url', ['label' => 'Website url(optionla)', 
//                                'type' => 'url'],['class'=>'form-control']);
//                             echo '</div>';
                          
                           // echo $this->Form->control('amount', ['id' => 'amount', 'value' => 50000],['class'=>'form-control']);
                            // echo $this->Form->control('startdate');
                            //  echo $this->Form->control('enddate');
                            // echo $this->Form->control('status');
                            // echo $this->Form->control('aprovedby');
                            // echo $this->Form->control('adsize');
                            //  echo $this->Form->control('adtype');
                            ?>
                     
        
        

           <div class="col-lg-4 col-md-6  col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" id="amount" name="amount" value="<?=$advert->amount?>">
                                        <label class="form-label"> Amount</label>
                                    </div>
                                </div>
                            </div>
       
    </fieldset>
    <?= $this->Form->button('Create Ad',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                <br /> 
    <?= $this->Form->end() ?>
                                            
                            <br /> <br />              
                                            
                                             </div>
				</div>
			</div>
		</div>  
    </div>
</section>




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
    function calculatestandardprice(obj) {
        //alert(obj);
        var base_charge = 50000;
        var percentage_discount = 10;
        if ((obj === '3')) {
            base_charge = 150000;
            var discount = (base_charge * percentage_discount / 100);
            var charge = base_charge - discount;
            // alert(base_charge);
            document.getElementById("amount").value = charge;
            document.getElementById("discount").innerHTML = "APPLICABLE DISCOUNT : ₦" + discount;
            document.getElementById("amount").innerHTML = "AMOUNT TO PAY : ₦" + charge;
        } else if (obj === '6') {
            base_charge = 300000;
            var discount = (base_charge * percentage_discount / 100);
            var charge = base_charge - discount;
            // alert(base_charge);
            document.getElementById("amount").value = charge;
            document.getElementById("discount").innerHTML = "APPLICABLE DISCOUNT : ₦" + discount;
            document.getElementById("amount").innerHTML = "AMOUNT TO PAY : ₦" + charge;
        } else {
            // alert(base_charge);
            document.getElementById("amount").value = 50000;
            document.getElementById("discount").innerHTML = "APPLICABLE DISCOUNT : ₦" + 0 + ".00";
            document.getElementById("amount").innerHTML = "AMOUNT TO PAY : ₦50000";

        }

    }


</script>



