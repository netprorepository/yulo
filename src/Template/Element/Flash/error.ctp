<!--<div class="notification error closeable">
				<p><span>Error!</span> <?= h($message) ?>.</p>
				<a class="close" href="#"></a>
			</div>-->


<div class="notification error closeable alert alert-danger alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <?= h($message) ?>.
                        </div>