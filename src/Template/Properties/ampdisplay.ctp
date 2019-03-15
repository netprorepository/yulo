 <?php  //structured data image
   foreach ($property->images as $propertyImages){
    if(!empty($propertyImages->imageurl)){?>
        
      <amp-img
    src="<?=$this->html->image('/property_images/'.$propertyImages->imageurl)?>"
    srcset="<?=$this->html->image('/property_images/'.$propertyImages->imageurl)?> 240w,
           <?=$this->html->image('/property_images/'.$propertyImages->imageurl)?> 220w"
    width="250"
    height="291"
    layout="responsive"
    alt="Yulo Nigeria">
</amp-img> 
   <?php }
   
}?>
<article>
      <h1><?= h(ucwords($property->listing_title)) ?></h1>

      <p><?=$property->listing_address.', '.$property->state->name  ?> </p>
      <p><?=number_format($property->listing_price)  ?></p>
      <p> <?php if(!empty($property->listing_square_area))
							{
						echo $property->listing_square_area.' sq ft';}
						else{
							echo 'NA';
							
						}
						?></p>
      <p> Rooms <?= $property->listing_rooms ?>
					<p>Bedrooms <span><?= $property->listing_rooms ?></p>
					<p>Bathrooms <?= $property->listing_bathrooms ?></p>
      <p> <?= $this->Text->autoParagraph($property->listing_description); ?></p>
      
  
      <amp-social-share class="rounded"
      type="email"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="facebook"
      data-param-app_id="594662074298565"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="gplus"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="linkedin"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="pinterest"
      data-param-media="https://ampbyexample.com/img/amp.jpg"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="tumblr"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="twitter"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="whatsapp"
      width="36"
      height="36"></amp-social-share>
    <amp-social-share class="rounded"
      type="line"
      width="36"
      height="36"></amp-social-share>
    </article>
 


