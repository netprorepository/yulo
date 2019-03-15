<?php

namespace App\Controller;

use Cake\Network\Email\Email;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\I18n\Time;
use Cake\Network\Response;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[] paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController {

    //check if device is mobile
    public function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $properties = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories', 'Cities', 'Categorysubtypes', 'Categorytypes'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC', 'listing_date_added' => 'DESC'])
                ->order('rand()')
                ->limit(60);
        // $properties = $this->paginate($properties);
        if ($this->isMobile()) {
            $this->set('device', 'mobile');
        } else {
            $this->set('device', 'desktop');
        }
        //ads to be on home page
        $adverts_table = TableRegistry::get('Adverts');
        $adverts = $adverts_table->find()->where(['status' => 'Aproved', 'enddate >=' => 'date(y-m-d)'])->limit(1);
        $this->set('adverts', $adverts);
        $this->set('title', 'Houses,Hostels,Lodges,Lands and Properties Market');
        $this->set('properties', $this->paginate($properties));
        $this->set('_serialize', ['properties']);
        //debug(json_encode($properties, JSON_PRETTY_PRINT)); exit;
        // $this->viewBuilder()->layout('propertyhome');
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function display($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => ['Agents', 'Images', 'States', 'Categories', 'Cities', 'Categorysubtypes', 'Categorytypes',
                'Agents.Users']
        ]);
        if ($property->listing_status != "approved") {
            $this->Flash->error(__('Sorry, the property you are looking for has either been rented or sold '
                            . 'and therefore no longer available'));
            return $this->redirect(['action' => 'index']);
        }
        $category_id = $property->category->id;
        $property->view_count++;
        $this->Properties->save($property);
        $featuredproperties = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC', 'listing_date_added' => 'DESC'])
                ->limit(6);
        $this->set('featuredproperties', $featuredproperties);
        $this->set('property', $property);
        $this->set('_serialize', ['property']);

        if ($this->isMobile()) {
            $this->set('device', 'mobile');
        } else {
            $this->set('device', 'desktop');
        }
        //ads to be on home page
        $adverts_table = TableRegistry::get('Adverts');
        $adverts = $adverts_table->find()->where(['status' => 'Aproved', 'enddate >=' => 'date(y-m-d)'])->limit(1);
        $this->set('adverts', $adverts);


        $similarproperties = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->andwhere(['category_id' => $category_id])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC', 'listing_date_added' => 'DESC'])
                ->limit(6);
        // debug(json_encode($similarproperties , JSON_PRETTY_PRINT)); exit;
        $this->set('similarproperties', $similarproperties);
        $this->set('title', $property->listing_title);
    }

    
    
    //AMP page 
      public function ampdisplay($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => ['Agents', 'Images', 'States', 'Categories', 'Cities', 'Categorysubtypes', 'Categorytypes',
                'Agents.Users']
        ]);
        if ($property->listing_status != "approved") {
            $this->Flash->error(__('Sorry, the property you are looking for has either been rented or sold '
                            . 'and therefore no longer available'));
            return $this->redirect(['action' => 'index']);
        }
        $category_id = $property->category->id;
        $property->view_count++;
        $this->Properties->save($property);
        $featuredproperties = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC', 'listing_date_added' => 'DESC'])
                ->limit(6);
        $this->set('featuredproperties', $featuredproperties);
        $this->set('property', $property);
        $this->set('_serialize', ['property']);

        if ($this->isMobile()) {
            $this->set('device', 'mobile');
        } else {
            $this->set('device', 'desktop');
        }
        //ads to be on home page
        $adverts_table = TableRegistry::get('Adverts');
        $adverts = $adverts_table->find()->where(['status' => 'Aproved', 'enddate >=' => 'date(y-m-d)'])->limit(1);
        $this->set('adverts', $adverts);


        $similarproperties = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->andwhere(['category_id' => $category_id])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC', 'listing_date_added' => 'DESC'])
                ->limit(6);
        // debug(json_encode($similarproperties , JSON_PRETTY_PRINT)); exit;
        $this->set('similarproperties', $similarproperties);
        $this->set('title', $property->listing_title);
         $this->viewBuilder()->setLayout('ampback');
    }
    
    
    
    //function for adding image to a property
    public function addimage($property_id) {
        $agents_table = TableRegistry::get('Agents');
        $images_stable = TableRegistry::get('Images');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $new_image = $images_stable->newEntity();
        if ($this->request->is('post')) {
            $file_error = '';
            $error = [];
            $extension = array("jpeg", "jpg", "png", "gif");
            //  debug(json_encode( $this->request->data(), JSON_PRETTY_PRINT)); exit;
            foreach ($this->request->data() as $tmp_name) {

                foreach ($tmp_name as $data) { //debug(json_encode( $data, JSON_PRETTY_PRINT)); exit;
                    $size = \getimagesize($data['tmp_name']);
                    // $mimetype = stripslashes($size['mime']); 
                    if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
                        $this->Flash->error(__('this is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb .'));
                        return $this->redirect(['action' => 'addimage', $property_id]);
                        // throw new \Exception('this is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb .');
                    }
//              $finfo = new \finfo(FILEINFO_MIME_TYPE);
//     //$filename = "company_staff_ids/".$staff_id;
//     $file_type =  $finfo->file(h($this->request->data['upload']['tmp_name']),FILEINFO_MIME_TYPE);
//    
//   // echo $file_type; exit;
//     if(($file_type == "image/gif")||($file_type == "image/png")|| ($file_type== "image/jpeg")||
//             ($file_type=="image/pjpeg")||($file_type=="image/x-png")){} 

                    $file_name = $data['name'];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

                    if (in_array($ext, $extension)) {
                        $file_name = md5(uniqid($data['name'], true)) . time();

                        if (!file_exists("property_images/" . $file_name)) {
                            $file_name = $file_name . '.' . $ext;
                            //  $this->resizeimage($data["tmp_name"]);

                            move_uploaded_file($data["tmp_name"], "property_images/" . $file_name);
                            ;
                            $this->customizeimage($file_name);
                            chmod("property_images/" . $file_name, 0644);
                            $new_image = $images_stable->newEntity();
                            $new_image->property_id = $property_id;
                            $new_image->imageurl = $file_name;
                            $images_stable->save($new_image);
                            //  $this->Flash->success(__('Image uploaded successfully. '.$file_error));
                        } else {
                            $filename = basename($file_name, $ext);
                            $newFileName = $filename . time() . "." . $ext;
                            move_uploaded_file($data["tmp_name"], "property_images/" . $newFileName);
                            $this->customizeimage($newFileName);
                            chmod("property_images/" . $newFileName, 0644);
                            $new_image = $images_stable->newEntity();
                            $new_image->property_id = $property_id;
                            $new_image->imageurl = $newFileName;
                            $images_stable->save($new_image);
                            // $this->Flash->success(__('Image uploaded successfully. '.$file_error));
                            //return $this->redirect(['action' => 'managemyproperties']);
                        }
                    } else {
                        array_push($error, "$file_name, ");
                        $this->Flash->error(__('Unable to upload image, please ensure you are uploading a jpg,png,gif or Jpeg file. ' . $file_error));
                        // debug(json_encode( $error, JSON_PRETTY_PRINT)); exit;
                    }
                }
                $this->Flash->success(__('Images uploaded successfully. ' . $file_error));
                return $this->redirect(['action' => 'managemyproperties']);
            }
        }
        $this->set('new_image', $new_image);
        $this->viewBuilder()->layout('userbackend');
    }

    //function that resizes images
    public function resizeimage($file) {
        # Get image width/height to resize properly
        $size = \GetImageSize($file);
        $img_width = $size[0];
        $img_height = $size[1];
        $height = 1040;
        $width = 780;
        $quality = 99;

        # In this part, we are calculating proper size for new image
        if ($img_width > $img_height) {
            $new_y = ceil(($width * $img_height) / $img_width);
            $new_x = $height;
        } else {
            $new_y = ceil(($height * $img_width) / $img_height);
            $new_x = $width;
        }

        # Create image with properly size for new sized image
        $image_p = imagecreatetruecolor($new_x, $new_y);
        $image = imagecreatefromjpeg($file);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_x, $new_y, $img_width, $img_height);

        # finally, outout image file with correct header mime-type
        Header("Content-type: image/jpeg");
        imagejpeg($image_p, null, $quality);
    }

    //function for water marking images
    public function customizeimage($image_name) {
        header('Content-type: image/png');
        //the image to be watermarked
        $image = $image_name;
        $url = "property_images/";
        /*
         * set the watermark font size
         * possible values 1,2,3,4, and 5
         * where 5 is the biggest
         */
        $fontSize = 85;

        //set the watermark text
        $text = "Yulo.ng";

        /*
         * position the watermark
         * 10 pixels from the left
         * and 10 pixels from the top
         */
        $xPosition = 170;
        $yPosition = 170;

        //create a new image
        $newImg = imagecreatefromjpeg($url . $image);

        //set the watermark font color to red
        $fontColor = imagecolorallocate($newImg, 205, 250, 055);

        //write the watermark on the created image
        imagestring($newImg, $fontSize, $xPosition, $yPosition, $text, $fontColor);

        //output the new image with a watermark to a file
        //  imagejpeg($newImg,"add-a-text-watermark-to-an-image-with-php_01.jpg",100);
        /*
         * PNG file appeared to have
         * a better quality than the JPG
         */
        imagepng($newImg, $url . $image_name);

        /*
         * destroy the image to free
         * any memory associated with it
         */
        imagedestroy($newImg);
        return;
    }

    public function watermark() {
        require '../vendor/autoload.php';
        // Create image
        $image = new \NMC\ImageWithText\Image('img/listing-01.jpg');

// Add text to image
        $text1 = new \NMC\ImageWithText\Text('Thanks for using our image text PHP library!', 3, 25);
        $text1->align = 'left';
        $text1->color = 'FFFFFF';
        $text1->font = 'fonts/Ubuntu-Medium.ttf';
        $text1->lineHeight = 36;
        $text1->size = 24;
        $text1->startX = 40;
        $text1->startY = 40;
        $image->addText($text1);

// Add more text to image
        $text2 = new \NMC\ImageWithText\Text('No, really, thanks!', 1, 30);
        $text2->align = 'left';
        $text2->color = '000000';
        $text2->font = 'fonts/Ubuntu-Medium.ttf';
        $text2->lineHeight = 20;
        $text2->size = 14;
        $text2->startX = 40;
        $text2->startY = 140;
        $image->addText($text2);

// Render image
        $image->render('destination.jpg');
    }

    public function propertiesforsale() {
        //$listing_category_name = "For Sale";
        $propertiesforsales = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->where(['category_id' => '2'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC']);
        $this->set('propertiesforsales', $this->paginate($propertiesforsales));
        // $this->set('propertiesforsales', $propertiesforsales);
        //debug(json_encode( $propertiesforsales, JSON_PRETTY_PRINT)); exit;

        $agents_table = TableRegistry::get('Agents');
        $states = $agents_table->States
                ->find('list')
                ->where(['country_id' => 160]);
        $this->set(compact('states'));

        $categoriestable = TableRegistry::get('Categories');
        $categories = $categoriestable->find('list');
        $this->set(compact('categories'));

        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list');
        $this->set(compact('categoriestypes'));

        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list', ['limit' => 500]);
        $this->set(compact('cities'));
        //debug(json_encode( $categories, JSON_PRETTY_PRINT)); exit;
        if ($this->isMobile()) {
            $this->set('device', 'mobile');
        } else {
            $this->set('device', 'desktop');
        }
        $this->set('adverts', $this->getads());
    }

    //function that gets all the ads
    public function getads() {
        //ads to be on home page
        $adverts_table = TableRegistry::get('Adverts');
        $adverts = $adverts_table->find()->where(['status' => 'Aproved', 'enddate >=' => 'date(y-m-d)'])->limit(5);
        return $adverts;
    }

    public function propertiestorent() {
        //$listing_category_name = "For Rent";
        $propertiestorent = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->where(['category_id' => 1]);
        $this->set('propertiestorent', $this->paginate($propertiestorent));
        $this->set('propertiestorent', $propertiestorent);

        $agents_table = TableRegistry::get('Agents');
        $states = $agents_table->States
                ->find('list')
                ->where(['country_id' => 160]);
        $this->set(compact('states'));

        $categoriestable = TableRegistry::get('Categories');
        $categories = $categoriestable->find('list');
        $this->set(compact('categories'));

        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list');
        $this->set(compact('categoriestypes'));

        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list', ['limit' => 500]);
        $this->set(compact('cities'));
        //debug(json_encode( $categories, JSON_PRETTY_PRINT)); exit;
        if ($this->isMobile()) {
            $this->set('device', 'mobile');
        } else {
            $this->set('device', 'desktop');
        }
        $this->set('adverts', $this->getads());
    }

    public function hostels() {
        $hostels = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC'])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->where(['category_id' => 6]);
        $this->set('hostels', $this->paginate($hostels));
        $this->set('hostels', $hostels);

        $agents_table = TableRegistry::get('Agents');
        $states = $agents_table->States
                ->find('list')
                ->where(['country_id' => 160]);
        $this->set(compact('states'));

        $categoriestable = TableRegistry::get('Categories');
        $categories = $categoriestable->find('list');
        $this->set(compact('categories'));

        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list');
        $this->set(compact('categoriestypes'));

        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list', ['limit' => 500]);
        $this->set(compact('cities'));
        //debug(json_encode( $hostels, JSON_PRETTY_PRINT)); exit;
    }

    public function filterhostel($text = null) {
        $hostels = $this->Properties->find()
                ->contain(['Images', 'Agents', 'States', 'Categories'])
                ->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC'])
                ->where(['category_id' => 6])
                ->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved'])
                ->where(['listing_address like ' => '%' . $text . '%']);
        $this->set('hostels', $this->paginate($hostels));
        $this->set('hostels', $hostels);
        //$this->render('hostels');
        //debug(json_encode( $hostels, JSON_PRETTY_PRINT)); exit;
    }

    public function categorysearch() {
        if ($this->request->is('post')) {
            // debug(json_encode( $this->request->getData(), JSON_PRETTY_PRINT)); exit;
            $category_id = $this->request->getData(['tab']);
            $category_type = $this->request->getData(['categorytype']);
            $state = $this->request->getData(['state']);
            $city = $this->request->getData(['city']);
            $bedrooms = $this->request->getData(['bed']);
            $bath = $this->request->getData(['bath']);
            $minprice = $this->request->getData(['minprice']);
            $maxprice = $this->request->getData(['maxprice']);
            $address = $this->request->getData(['address']);

            // start here...
            $categorysearchroperties = $this->Properties->find()
                    ->contain(['Images', 'Agents', 'States', 'Categories']);
            if ($category_id != 'on' && !empty($category_id)) {
                $categorysearchroperties->where(['category_id' => $category_id]);
            }

            if (!empty($category_type)) {
                $categorysearchroperties->where(['categorytype_id' => $category_type]);
            }

            if (!empty($state)) {
                $categorysearchroperties->where(['Properties.state_id' => $state]);
            }

            if (!empty($city)) {
                $categorysearchroperties->where(['Properties.city_id' => $city]);
            }

            if (!empty($bedrooms)) {
                $categorysearchroperties->where(['listing_bedrooms' => $bedrooms]);
            }

            if (!empty($bath)) {
                $categorysearchroperties->where(['listing_bathrooms' => $bath]);
            }

            if (!empty($minprice) && !empty($maxprice)) {
                $categorysearchroperties->where(['listing_price >=' => $minprice, 'listing_price <=' => $maxprice]);
            } elseif (!empty($minprice) && empty($maxprice)) {
                $categorysearchroperties->where(['listing_price >=' => $minprice]);
            } elseif (empty($minprice) && !empty($maxprice)) {
                $categorysearchroperties->where(['listing_price <=' => $maxprice]);
            }

            if (!empty($address)) {
                $categorysearchroperties->where(['listing_address like' => '%' . $address . '%']);
            }
        }//end post request
        else{
            //find the latest properties
             $categorysearchroperties = $this->Properties->find()
                    ->contain(['Images', 'Agents', 'States', 'Categories']);
        }
        
        
            // end here....
            $categorysearchroperties->where(['listing_display_status' => 'true', 'listing_market_status' => 'Available', 'listing_status' => 'approved']);
            $categorysearchroperties->order(['push_up_date' => 'DESC', 'listing_premium' => 'DESC']);

            $this->set('categorysearchroperties', $this->paginate($categorysearchroperties));
            $this->set('categorysearchroperties', $categorysearchroperties);
            //debug(json_encode( $categorysearchroperties, JSON_PRETTY_PRINT)); exit;

            $agents_table = TableRegistry::get('Agents');
            $states = $agents_table->States->find('list')
                    ->where(['country_id' => 160]);
            $this->set(compact('states'));

            $categoriestable = TableRegistry::get('Categories');
            $categories = $categoriestable->find('list');
            $this->set(compact('categories'));

            $categorytypestable = TableRegistry::get('Categorytypes');
            $categoriestypes = $categorytypestable->find('list');
            $this->set(compact('categoriestypes'));

            $citiestable = TableRegistry::get('Cities');
            $cities = $citiestable->find('list', ['limit' => 500]);
            $this->set(compact('cities'));
            //ads
            if ($this->isMobile()) {
                $this->set('device', 'mobile');
            } else {
                $this->set('device', 'desktop');
            }
            $this->set('adverts', $this->getads());
        
    }

    public function categorytypes($id) {
        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list')
                ->where(['category_id' => $id]);
        $this->set(compact('categoriestypes'));
        //debug(json_encode( $categoriestypes, JSON_PRETTY_PRINT)); exit;
    }

    public function categorytypes2($id) {
        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list')
                ->where(['category_id' => $id]);
        $this->set(compact('categoriestypes'));
        //debug(json_encode( $categoriestypes, JSON_PRETTY_PRINT)); exit;
    }

    public function getcategorytypes($id) {
        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list')
                ->where(['category_id' => $id]);
        $this->set(compact('categoriestypes'));
        //debug(json_encode( $categoriestypes, JSON_PRETTY_PRINT)); exit;
    }

    //agent's method for changing the display status of his property
    public function changedisplaystatus($id = null) {
        $property = $this->Properties->get($id);
        if ($property) {
            $property->listing_display_status = 'false';
            $this->Properties->save($property);
            $this->Flash->success(__('The propery status has been changed and would no longer be visible on all pages'));
            return $this->redirect(['action' => 'managemyproperties']);
        } else {
            $this->Flash->error(__('Unable to change status, property not found. '));
            return $this->redirect(['action' => 'managemyproperties']);
        }
        return $this->redirect(['action' => 'managemyproperties']);
    }

    //agents method for marking a property as availbale after it was marked as sold
    public function makeavailable($id = null) {
        $property = $this->Properties->get($id);
        if ($property) {
            $property->listing_display_status = 'true';
            $this->Properties->save($property);
            $this->Flash->success(__('The propery status has been changed and will once again show on all pages'));
            return $this->redirect(['action' => 'managemyproperties']);
        } else {
            $this->Flash->error(__('Unable to change status, property not found. '));
            return $this->redirect(['action' => 'managemyproperties']);
        }
        return $this->redirect(['action' => 'managemyproperties']);
    }

    public function cities($id) {
        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list')
                ->where(['state_id' => $id]);
        $this->set(compact('cities'));
        // debug(json_encode( $cities, JSON_PRETTY_PRINT)); exit;
    }

    public function getcities($id) {
        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list')
                ->where(['state_id' => $id]);
        $this->set(compact('cities'));
        //debug(json_encode( $cities, JSON_PRETTY_PRINT)); exit;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addproperty() {
        // echo $this->request->getData('location');
        //echo "am here...";exit;
        //ensure this user is logged in

        $category_subtypes_stable = TableRegistry::get('Categorysubtypes');
        $category_types_table = TableRegistry::get('Categorytypes');
        $agents_table = TableRegistry::get('Agents');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $property = $this->Properties->newEntity();
        $image_name = '';
        $extension = '';
        if ($this->request->is('post')) {

            //  $size = getimagesize($this->request->data['listing_images']['tmp_name']);
            // $mimetype = stripslashes($size['mime']); 
//if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
//    throw new \Exception('this is unacceptable!.');
//            }

            $extension = strrchr($this->request->data['listing_images']['name'], '.');

            if (!empty($this->request->data['listing_images']['tmp_name']) && is_uploaded_file($this->request->data['listing_images']['tmp_name']) && ($this->request->data['listing_images']['size'] < 1000000) && (
                    ($this->request->data['listing_images']['type'] == "image/gif") || ($this->request->data['listing_images']['type'] == "image/png") || ($this->request->data['listing_images']['type'] == "image/jpeg") || ($this->request->data['listing_images']['type'] == "image/pjpeg") || ($extension === '.pdf') || ($this->request->data['staff_identity']['type'] == "image/x-png"))) {
                // encripts the username to be saved as logo name in the db
                $image_name = md5($this->request->data['listing_images']['name']) . time();
                $extension = strrchr($this->request->data['listing_images']['name'], '.');
                $image_name = $image_name . $extension;
                //  if(move_uploaded_file($this->request->data['staff_identity']['tmp_name'], "company_staff_ids/" . $staff_id)){

                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                //$filename = "company_staff_ids/".$staff_id;
                $file_type = $finfo->file(h($this->request->data['listing_images']['tmp_name']), FILEINFO_MIME_TYPE);

                // echo $file_type; exit;
                if (($file_type == "image/gif") || ($file_type == "image/png") || ($file_type == "image/jpeg") ||
                        ($file_type == "image/pjpeg") || ($file_type == "image/x-png")) {
//check for old document and delete it
                    if (file_exists("property_images/" . $image_name) && (($image_name != "none.png"))) {
                        unlink("property_images/" . $image_name);
                        // $file_error = 'Current document has been deleted';
                    } //upload new one
                    move_uploaded_file(h($this->request->data['listing_images']['tmp_name']), "property_images/" . $image_name);
                    chmod("property_images/" . $image_name, 0644);
                    $file_error = 'Image uploaded successfully';
                } else { //unlink("company_staff_ids/".$staff_id); 
                    $file_error = 'wrong file format,file deleted';
                }
            } else {

                $file_error = "Unfortunately, we could not upload your image. Image size must be less than 1MB and either of type jpeg, png, gif or x-jpeg or pdf";
            }

            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $property->agent_id = $agent->id;
            // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
            if ($this->Properties->save($property)) {

                $images_stable = TableRegistry::get('Images');
                $new_image = $images_stable->newEntity();
                $new_image->property_id = $property->id;
                $new_image->imageurl = $image_name;
                $images_stable->save($new_image);
                $this->Flash->success(__('The property has been saved. ' . $file_error));

                return $this->redirect(['action' => 'managemyproperties']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again. ' . $file_error));
        }
        $categories = $this->Properties->Categories->find('list', ['limit' => 200]);
        $categorysubtypes = $category_subtypes_stable->find('list', ['limit' => 200]);
        $category_types = $category_types_table->find('list', ['limit' => 200]);
        $states = $this->Properties->States->find('list', ['limit' => 200]);
        $cities = $this->Properties->Cities->find('list', ['limit' => 200]);
        // $agents = $this->Properties->Agents->find('list', ['limit' => 200]);
        // $images = $this->Properties->Images->find('list', ['limit' => 200]);
        $this->set(compact('property', 'categories', 'states', 'cities', 'agents', 'images', 'categorysubtypes', 'category_types'));
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('userbackend');
    }

    //user method for managing his properties
    public function managemyproperties() {
        //ensure this user is logged in
        $agents_table = TableRegistry::get('Agents');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])
                ->contain(['Subscriptions.Plans', 'Subscriptions' => function($q) {
                        return $q->where(['date(enddate) >' => date('Y-m-d'), 'sub_status' => 'active']);
                    }])
                ->first();

        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->set('agent', $agent);
        $myproperties = $this->Properties->find()->contain(['States', 'Cities', 'Images', 'Categories', 'Categorysubtypes', 'Categorytypes'])
                ->where(['agent_id' => $agent->id])
                ->order(['listing_date_added' => 'DESC']);
        $this->set('myproperties', $this->paginate($myproperties));
        //debug(json_encode( $myproperties, JSON_PRETTY_PRINT)); exit;
        $this->viewBuilder()->layout('userbackend');
    }

    //method that handles push up
    public function pushupproperty($property_id, $subscription_id) {
        $subscriptions_table = TableRegistry::get('Subscriptions');
        $property = $this->Properties->get($property_id);
        $property->push_up_status = 'pushed_up';
        $property->push_up_date = date("Y-m-d H:i:s");
        $this->Properties->save($property);

        $subscription = $subscriptions_table->get($subscription_id);
        $subscription->pushed_ups += 1;
        // debug(json_encode(  $subscription, JSON_PRETTY_PRINT)); exit;
        if ($subscriptions_table->save($subscription)) {
            $this->Flash->success('The property has been pushed up and will now show up tops on all pages.');
            return $this->redirect(['action' => 'managemyproperties']);
        } else {
            $this->Flash->error('Sorry, unable to push up property, ensure you still have a slot for push up in your current plan.');
            return $this->redirect(['action' => 'managemyproperties']);
        }
    }

    //agent method for previewing their properties
    public function preview($id = null) {
        //ensure this user is logged in
        $agents_table = TableRegistry::get('Agents');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $property = $this->Properties->get($id, [
            'contain' => ['Categories', 'States', 'Cities', 'Images', 'Agents']
        ]);

        $this->set('property', $property);
        $this->set('_serialize', ['property']);
        // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
        $this->viewBuilder()->layout('userbackend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function update($id = null) {
        //ensure this user is logged in
        $agents_table = TableRegistry::get('Agents');
        $category_subtypes_stable = TableRegistry::get('Categorysubtypes');
        $category_types_table = TableRegistry::get('Categorytypes');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $property = $this->Properties->get($id, ['contain' => ['Agents', 'Images', 'States', 'Categories', 'Cities', 'Categorysubtypes', 'Categorytypes']]);
        //make the owner of the property is the one editing it
        if ($property->agent_id != $agent->id) {
            $this->Flash->error(__('Sorry, you do not have the right to edit that property.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug(json_encode( $this->request->getData(), JSON_PRETTY_PRINT)); exit;
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been updated.'));

                return $this->redirect(['action' => 'managemyproperties']);
            }
            $this->Flash->error(__('The property could not be updated. Please, try again.'));
        }
        $categories = $this->Properties->Categories->find('list', ['limit' => 200]);
        $states = $this->Properties->States->find('list', ['limit' => 200])
                ->where(['country_id' => 160]);
        $cities = $this->Properties->Cities->find('list', ['limit' => 200])->where(['state_id' => $property->state->id]);
        $categorysubtypes = $category_subtypes_stable->find('list', ['limit' => 200]);
        $category_types = $category_types_table->find('list', ['limit' => 200]);
        // $agents = $this->Properties->Agents->find('list', ['limit' => 200]);
        $this->set(compact('property', 'categories', 'categorysubtypes', 'states', 'cities', 'category_types', 'agents'));
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('userbackend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //function that chechks for a valid subscription before allowing an agent upload a property
    public function getsubscription($agent_id) {
        //$agents_table = TableRegistry::get('Agents');
        $subscriptions_table = TableRegistry::get('Subscriptions');
        $active_subscription = $subscriptions_table->find()
                        ->where(['agent_id' => $agent_id, 'date(enddate) >' => date('Y-m-d'), 'sub_status' => 'active'])
                        ->contain(['Plans'])->first();
        if (is_null($active_subscription)) {
            $userController = new UsersController();
            $userController->createbasicplan($agent_id);
            return 5;
        } elseif (!empty(array_filter($active_subscription->toArray()))) {
            return $active_subscription->no_of_properties_available - $active_subscription->no_of_properties_uploaded;
        } else {
            return 'Sorry, you have exusted the property uploads in this plan, please renew or upgrade your '
                    . 'subscription plan to upload more properties';
        }
        //debug(json_encode($active_subscription, JSON_PRETTY_PRINT)); exit;
    }

    public function newproperty() {
        // echo $this->request->getData('location');
        //echo "am here...";exit;
        //ensure this user is logged in

        $category_subtypes_stable = TableRegistry::get('Categorysubtypes');
        $category_types_table = TableRegistry::get('Categorytypes');
        $agents_table = TableRegistry::get('Agents');
        $agent = $agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])
                ->contain(['Subscriptions' => function($q) {
                        return $q->where(['date(enddate) >' => date('Y-m-d'), 'sub_status' => 'active']);
                    }])
                ->first();
        // debug(json_encode($agent->subscriptions, JSON_PRETTY_PRINT)); exit;
        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        //check for active subscription
        $active_subscription = $this->getsubscription($agent->id);
        if (is_numeric($active_subscription) && ($active_subscription > 0)) {
            $property = $this->Properties->newEntity();
            $image_name = '';
            $extension = '';
            if ($this->request->is('post')) {
                $subscriptions_table = TableRegistry::get('Subscriptions');
                $size = getimagesize($this->request->data['listing_images']['tmp_name']);
                // $mimetype = stripslashes($size['mime']); 
                if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
                    throw new \Exception('this is unacceptable! image must be of type : gif, jpeg, png or jpg and less than 2mb .');
                }

                $extension = strrchr($this->request->data['listing_images']['name'], '.');

                if (!empty($this->request->data['listing_images']['tmp_name']) && is_uploaded_file($this->request->data['listing_images']['tmp_name']) && ($this->request->data['listing_images']['size'] < 2000000) && (
                        ($this->request->data['listing_images']['type'] == "image/gif") || ($this->request->data['listing_images']['type'] == "image/png") || ($this->request->data['listing_images']['type'] == "image/jpeg") || ($this->request->data['listing_images']['type'] == "image/pjpeg") || ($extension === '.pdf') || ($this->request->data['listing_images']['type'] == "image/x-png"))) {
                    // encripts the username to be saved as logo name in the db
                    $image_name = md5($this->request->data['listing_images']['name']) . time();
                    $extension = strrchr($this->request->data['listing_images']['name'], '.');
                    $image_name = $image_name . $extension;
                    //  if(move_uploaded_file($this->request->data['staff_identity']['tmp_name'], "company_staff_ids/" . $staff_id)){

                    $finfo = new \finfo(FILEINFO_MIME_TYPE);
                    //$filename = "company_staff_ids/".$staff_id;
                    $file_type = $finfo->file(h($this->request->data['listing_images']['tmp_name']), FILEINFO_MIME_TYPE);

                    // echo $file_type; exit;
                    if (($file_type == "image/gif") || ($file_type == "image/png") || ($file_type == "image/jpeg") ||
                            ($file_type == "image/pjpeg") || ($file_type == "image/x-png")) {
                        //check for old document and delete it
                        if (file_exists("property_images/" . $image_name) && (($image_name != "none.png"))) {
                            unlink("property_images/" . $image_name);
                            // $file_error = 'Current document has been deleted';
                        } //upload new one
                        move_uploaded_file(h($this->request->data['listing_images']['tmp_name']), "property_images/" . $image_name);
                        $this->customizeimage($image_name);
                        chmod("property_images/" . $image_name, 0644);
                        $file_error = 'Image uploaded successfully';
                    } else { //unlink("company_staff_ids/".$staff_id); 
                        $file_error = 'wrong file format,file deleted';
                    }
                } else {

                    $file_error = "Unfortunately, we could not upload your image. Image size must be less than 1MB and either of type jpeg,"
                            . " png, gif or x-jpeg or pdf";
                }

                $property = $this->Properties->patchEntity($property, $this->request->getData());
                $property->agent_id = $agent->id;
                // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
                if ($this->Properties->save($property)) {

                    $images_stable = TableRegistry::get('Images');
                    $new_image = $images_stable->newEntity();
                    $new_image->property_id = $property->id;
                    $new_image->imageurl = $image_name;
                    $images_stable->save($new_image);
                    //increament the number of uploaded properties on the subscription
                    foreach ($agent->subscriptions as $subscription) {
                        $subscription->no_of_properties_uploaded ++;
                        $subscriptions_table->save($subscription);
                    }

                    $this->Flash->success(__('The property has been saved(Would go live once verified by our admin).'
                                    . ' Now please upload more images of this properties ' . $file_error));

                    return $this->redirect(['action' => 'addimage', $property->id]);
                }
                $this->Flash->error(__('The property could not be saved. Please, try again. ' . $file_error));
            }
        } else {
            $this->Flash->success($active_subscription);
            return $this->redirect(['action' => 'managemyproperties']);
        }

        $categories = $this->Properties->Categories->find('list', ['limit' => 200]);
        $categorysubtypes = $category_subtypes_stable->find('list', ['limit' => 200]);
        $category_types = $category_types_table->find('list', ['limit' => 200]);
        $states = $this->Properties->States->find('list', ['limit' => 200])->where(['country_id' => 160]);
        $cities = $this->Properties->Cities->find('list', ['limit' => 200]);
        // $agents = $this->Properties->Agents->find('list', ['limit' => 200]);
        // $images = $this->Properties->Images->find('list', ['limit' => 200]);
        $this->set(compact('property', 'categories', 'states', 'cities', 'agents', 'images', 'categorysubtypes', 'category_types'));
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('userbackend');
    }

    //agents method for deleting a property's image
    public function viewimages($property_id) {
        $Agents_table = TableRegistry::get('Agents');
        $agent = $Agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $property = $this->Properties->get($property_id, ['contain' => ['Images']]);
        //ensure he owns this property
        if ($property->agent_id != $agent->id) {
            $this->Flash->error('Sorry, you do not have such privilage.');
            return $this->redirect(['action' => 'managemyproperties']);
        }
        $this->set('property', $property);
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('userbackend');
    }

//method that deletes a property's image
    public function deleteimage($image_id) {
        //ensure agane is loggedin
        $Agents_table = TableRegistry::get('Agents');
        $agent = $Agents_table->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        if (!$agent) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('agent', $agent);
        $images_table = TableRegistry::get('Images');
        $this->request->allowMethod(['post', 'delete']);
        $image = $images_table->get($image_id);
        if ($images_table->delete($image)) {
            if (file_exists("property_images/" . $image->imageurl)) {
                @unlink("property_images/" . $image->imageurl);
                // $file_error = 'Current document has been deleted';
            }
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'viewimages', $image->property_id]);
    }

    // allow unrestricted pages
    public function beforeFilter(Event $event) {
        $this->Auth->allow(
                [
                    'index',
                    'display',
                    'verifyaccount',
                    'propertiesforsale',
                    'propertiestorent',
                    'categorysearch',
                    'categorytypes',
                    'cities',
                    'hostels',
                    'ampdisplay',
                    'categorytypes2',
                    'filterhostel',
                    'watermark'
                ]
        );
    }

}
