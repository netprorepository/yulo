<!doctype html>
<html amp lang="en">
  <head>
      <script async src="https://cdn.ampproject.org/v0.js"></script>
       <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
         <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1.0">
     <?=$this->Html->image('logo.png')?>

    <title><?= h(ucwords($title)) ?></title>
    <style amp-custom>
        
body {
  width: auto;
  margin: 0;
  padding: 0;
}

header {
  background: Tomato;
  color: white;
  font-size: 2em;
  text-align: center;
}

h1 {
  margin: 0;
  padding: 0.5em;
  background: white;
  box-shadow: 0px 3px 5px grey;
}

p {
  padding: 0.5em;
  margin: 0.5em;
}

   amp-social-share.custom-style {
      background-color: #008080;
      background-image: url('https://raw.githubusercontent.com/google/material-design-icons/master/social/1x_web/ic_share_white_48dp.png');
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
    }

    amp-social-share.rounded {
      border-radius: 50%;
      background-size: 60%;
    }
 </style>
 <!--  facebook and twitter cards    -->
<?php 
$decription = "";
if(isset($property->listing_description)){
    //url for facebook graph
    $url = "https://yulo.ng/properties/display/$property->id.'/'".$this->GenerateUrl($title);
    $count = 0;
foreach ($property->images as $propertyImages){
    if(!empty($propertyImages->imageurl)){
      $share_image =   $propertyImages->imageurl;
       $count++; 
    }
    if($count >=1){break;}
}
    $decription =$property->listing_description; }
else{$decription = "Yulo is an online property market wher you can buy, rent, lease or sell your properties";
$url = "https://yulo.ng";
}

?>
<?php if(isset($share_image)){$share = "https://www.yulo.ng/property_images/".$share_image;}else{$share = "https://www.yulo.ng/img/logo.png";}  ?>
<meta property="og:title" content="<?=$title?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?=$url?>" />
<meta property="og:image" content="<?=$share ?>" />
<meta property="og:description" content="<?= substr($decription,0,200)?>." />

<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?= substr($decription,0,200)?>" />
<meta name="twitter:site" content="@yulonaija" />
<meta name="twitter:title" content="<?=$title ?>" />
<meta name="twitter:image" content="<?=$share ?>" />

<link rel="canonical" href="<?=$url?>">
   
  
  <script type="application/ld+json">
{
 "@context": "http://schema.org",
 "@type": "NewsArticle",
 "mainEntityOfPage":{
   "@type":"WebPage",
   "@id":"https://awarenessng.com/news/details/<?=$news->id.'/'.$this->GenerateUrl($news->news_title)?>"
 },
 "headline": "<?=$news->news_title ?>",
 "image": {
   "@type": "ImageObject",
   "url": "https://awarenessng.com/news_images/<?=$dimage?>",
   "height": 800,
   "width": 800
 },
  "datePublished": "<?= h(Date('d,M Y h:i A', strtotime($news->postedon)))?>",
  "dateModified": "<?= h(Date('d,M Y h:i A', strtotime($news->postedon)))?>",
  "author": {
    "@type": "Person",
    "name": "Aniegboka Chukwudi"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Yulo Nigeria",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.awarenessng.com/img/iam_logo.jpg",
      "width": 600,
      "height": 60
    }
  },
  "description": "<?=substr($news->details,0,400)?>"
}
</script>
 <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
 
  </head>
    
    <body>
    <amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
  "vars" : {
    "gtag_id": "UA-127406067-1",
    "config" : {
      "UA-127406067-1": { "groups": "default" }
    }
  }
}
</script>
</amp-analytics>
    <header>
     Yulo Nigeria
         
    </header>
   <?= $this->Flash->render() ?>
  
           <?= $this->fetch('content') ?>
 
   </body>
 </html>
