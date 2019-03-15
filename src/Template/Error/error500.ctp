<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')) :
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<h2><?= __d('yulo', 'An Internal Error Has Occurred') ?></h2>

<body class=" login-page authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">        
        <h1 class="title"><span>Yulo Nigeria</span>Error 500 <div class="msg">Something's broken :-(</div></h1>
        <div class="col-md-12 text-center">
            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-search"></i> </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="search" placeholder="Search..." required>                    
                </div>
            </div>
             <div> <a class="btn btn-raised g-bg-blue waves-effect" href="index.html">GO TO HOMEPAGE</a> </div>           
        </div>
    </div>    
</div>

    <p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= h($message) ?>
</p>

<div class="theme-bg"></div>


