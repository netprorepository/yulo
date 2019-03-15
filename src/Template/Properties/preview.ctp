<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Property Preview</h2>
            
        </div>        
        <div class="row clearfix"> <?= $this->Flash->render() ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="card">
                    <div class="body property">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                  <?php $count = 0; foreach ($property->images as $yuloListing): ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$count?>"></li>
                                          <?php endforeach; ?>
                            </ol>
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                 <?php  foreach ($property->images as $yuloListing): ?>
                                <div class="item active"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl,['height'=> '250'])?> </div>
                                <div class="item"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl)?>  </div>
                                <div class="item"> <?=$this->html->image('/property_images/'.$yuloListing->imageurl)?>  </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> 
              </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                        </div>

            </div>
           
        </div>
                        <div class="property-card">
                            <div class="property-content">
                                <div class="listingInfo">
                                    <div class="">
                                        <h4 class="text-success m-t-15">₦<?=number_format($property->listing_price)?></h4>
                                        <h4 class="m-t-0"><a href="#" class="col-blue-grey"><?=$property->listing_title?></a></h4>
                                    </div>
                                    <div class="detail">                                           
                                        <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?=$property->listing_address.', '.$property->state->name?></p>
                                        <p class="m-b-0">
                                            <?=h($property->listing_description)?>
                                        </p>
                                    </div>
                                </div>
                                <div class="property-action m-t-15">
                                    <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?=$property->listing_square_area?></span></a>
                                    <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span><?=$property->listing_bedrooms?></span></a>
                                    <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span><?=$property->listing_parking?></span></a>
                                    <a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> <?= $property->listing_other_features ?></span></a>
                               <br /> <br />
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
       
    </div>
</section>
