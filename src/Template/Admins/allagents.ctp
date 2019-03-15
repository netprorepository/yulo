<!-- main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="row clearfix">
			
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card property"> <?= $this->Flash->render() ?>
<div class="row clearfix">
    <?php foreach ( $all_agents as $agent) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card agent">
                    <div class="agent-avatar">
                        <a href="agent-profile.html">
                           <?=$this->html->image('/profile_pix/'.$agent->pix_url,['class'=>'img-responsive','alt'=>$agent->fullname,
                               'height'=>"100",'width'=>'220'])?>
                            
                        </a>
                    </div>
                    <div class="agent-content">
                        <div class="agent-name">
                            <h4><?= $this->Html->link(ucwords(strtolower($agent->fullname)),
                                    ['controller' => 'Admins', 'action' => 'viewagentproperties',$agent->id,$this->GenerateUrl($agent->fullname)]) ?>
                                </h4>
                            <span><?=$agent->address ?></span>
                        </div>
                        <ul class="agent-contact-details">
                            <li><i class="zmdi zmdi-phone"></i><span><?=$agent->phone ?></span></li>
                            <li><i class="zmdi zmdi-email"></i><?=$agent->user->username ?></li>
                            <li><i class="zmdi zmdi-home" title="properties"></i><?=count($agent->properties) ?></li>
                        </ul>
                        <ul class="social-icons">
                            
                           <li><a class="facebook" href="<?= h('http://'.str_replace("http://","",$agent->fb))?>"><i class="zmdi zmdi-facebook"></i></a></li>
                           <li><a class="twitter" href="<?= h('http://'.str_replace("http://","",$agent->tw))?>"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a class="gplus" href="<?= h('http://'.str_replace("http://","",$agent->gg))?>"><i class="zmdi zmdi-google-plus"></i></a></li>
                            <li><a class="linkedin" href="<?= h('http://'.str_replace("http://","",$agent->in))?>"><i class="zmdi zmdi-linkedin"></i></a></li>
                     
                        </ul>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
    
  
</div>
                   
            
          <div class="paginator pull-right">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
                </div>
		</div>
             </div>
    </div>
</section>
