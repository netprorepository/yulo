<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>


<body class=" login-page authentication">
      <h1 class="title"><span>Yulo Nigeria</span></h1>
<div class="container">
    <div class="card-top"></div>
    <div class="card">        
      
        <h2><?= h($message) ?></h2>
        <div class="col-md-12 text-center">
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-search"></i> </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="search" placeholder="Search..." required>                    
                </div>
            </div>
             <div> <a class="btn btn-raised g-bg-blue waves-effect" href="/">GO TO HOMEPAGE</a> </div>           
        </div>
    </div>    
</div>


      <p class="error">
    
    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
</p>
<div class="theme-bg"></div>



</body>