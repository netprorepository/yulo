
<section class="content">
    <div class="container-fluid">
        <div class="block-header"><?= $this->Flash->render() ?>
            <h2>Only Government Issued Means Of Identifications are Acceptable(Voter Card, Drivers License, National ID etc)</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">  
<?= $this->Form->create(null,['type'=>'file']) ?>
                                    <fieldset>
<?php
 echo '<div class="col-sm-4 col-xs-12">
 <div class="">
              <div class="fallback"><br />';
            echo $this->Form->control('verificationfile', ['label'=>'Upload Image',
                'placeholder'=>'upload a government issued ID','type'=>'file','multiple']);
            echo '</div></div></div>';
            
            
                ?>
    </fieldset>
    <?= $this->Form->button('Submit',['class'=>'btn btn-raised g-bg-blue','style'=>'margin-right: 20px;']) ?>
                                        
    <?= $this->Form->end() ?>  
     <br />   <br /> <br />   <br /><br />          
                        <div class="clearfix"></div>
				</div>
			</div>
		</div>       
    </div>
</section>

