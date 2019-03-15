<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add New Property</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
                                    
                                   <?= $this->Form->create($property,['type'=>'file']) ?>
    <fieldset><?= $this->Flash->render() ?>
       
        <?php
        echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_title', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Enter Property Title', 'required']);
            echo '</div></div></div>';
            
              echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_description', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Describe your property','required']);
            echo '</div></div></div>';
            
             $property_status = ['Available'=>'Available','Rented'=>'Rented','Sold'=>'Sold'];
        
          echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_status', ['options' =>  $property_status,'empty' => true,'required']);
             echo '</div></div></div>';    
        
           // echo $this->Form->control('listing_display_status');
            
           // echo $this->Form->control('listing_market_status');
         echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('category_id', ['options' => $categories,'empty' => true,'required']);
             echo '</div></div></div>';
            
            echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('categorytype_id', ['options' => $category_types, 'empty' => true]);
            echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('categorysubtype_id', ['options' =>  $categorysubtypes, 'empty' => true]);
            echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_price', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Price', 'required']);
            echo '</div></div></div>';
            
            echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_square_area', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Property square area(sq ft)', 'required']);
            echo '</div></div></div>';
            
            echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_rooms', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'number of rooms', 'required']);
            echo '</div></div></div>';
            
            echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_address', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'property address', 'required']);
            echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('state_id', ['options' => $states, 'empty' => true]);
             echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
             echo '</div></div></div>';
            
            
            echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_area', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'square area', 'required']);
            echo '</div></div></div>';
            
           echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_zip', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'zip (optional)']);
            echo '</div></div></div>';
            
           echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_age', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'property age (optional)']);
            echo '</div></div></div>';
            
          echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_bedrooms', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'number of bedrooms (optional)']);
            echo '</div></div></div>';
            
              echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_bathrooms', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'number of bathrooms (optional)']);
            echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_parking', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'is there a parcking lot? (optional)']);
            echo '</div></div></div>';
            
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_toilet', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'number of toilets (optional)']);
            echo '</div></div></div>';
            
              echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_video_link', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'any video link? (optional)']);
            echo '</div></div></div>';
            
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_service_status', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'service status? (optional)']);
            echo '</div></div></div>';
            
                       
             echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_other_features', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'Other unique features? (optional)']);
            echo '</div></div></div>';
            
              echo '<div class="col-sm-4 col-xs-12">
              <div class="form-group">
              <div class="form-line">';
            echo $this->Form->control('listing_premium', ['label'=>false,'class'=>'form-control',
                'placeholder'=>'listing premium (optional)']);
            echo '</div></div></div>'; 
            
             echo '<div class="col-sm-4 col-xs-12">
              
              <div class="">
              <div class="fallback">';
            echo $this->Form->control('listing_images', ['label'=>'Upload Image',
                'placeholder'=>'upload images','type'=>'file']);
            echo '</div></div></div>';
            
            
                ?>
    </fieldset>
    <?= $this->Form->button('Add Property',['class'=>'btn btn-raised g-bg-blue pull-right','style'=>'margin-right: 20px;']) ?>
                                        
    <?= $this->Form->end() ?>  
                        <br />   <br /> <br />   <br /><br />          
                        <div class="clearfix"></div>
				</div>
			</div>
		</div>       
    </div>
</section>
