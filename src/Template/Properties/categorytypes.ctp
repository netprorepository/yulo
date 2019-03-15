<?php 
    echo '<div class="col-md-12">';
        //$categorytype = ['1'=>'Apartments','2'=>'House','3'=>'Garage'];
        echo $this->Form->control(
            'categorytype', 
            ['options' =>  $categoriestypes, 'empty' => 'Any Types'],
            ['class'=>'chosen-select-no-single']
        );
    echo '</div>';
?>