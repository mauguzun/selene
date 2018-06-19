<div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2> <?=  isset($title) ? $title : NULL; ?> </h2>
        </div>
        <fieldset class="col2-set">
          
          <div class="col-2 registered-users"><strong><?=  isset($more) ? $more : NULL; ?></strong>
            <div class="content">
              <p><?php echo $message;?></p>
              
              <?php echo form_open($form_url);?>

              
              <ul class="form-list">
                <? foreach($controls  as $key=>$control):?>
                <li>
            		
					<?= $control ?>
                </li>
                <? endforeach;?>
              </ul>
             <?php echo form_close();?>
            </div>
          </div>
        </fieldset>
      </div>
    
    </div>
    
    <div id="myModal" class="modal fade in" style="display: block;">
  <div class="modal-dialog newsletter-popup">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-body">
        <h4 class="modal-title">Error</h4>
          <div class="content-subscribe">
            <div class="form-subscribe-header">
              <label>For all the latest news, products, collection...</label>
              <label>Subscribe now to get 20% off</label>
           
      
      </div>
    </div>
  </div>
</div>