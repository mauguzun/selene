
<? if (isset($message) && $message != "") :?>
<div class="alert alert-info alert-dismissible"  role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="ion-android-close">
            </i>
        </span>
    </button>
    <i class="fa fa-exclamation-circle fa-2x">
    </i>     <?php echo $message;?>
</div>
<? endif ;?>

<!-- Checkout -->
<div class="checkout-form">

    <div class="row">
        <div class="col-sm-6">
         <div class="heading-block left-head text-left">
                
          </div>
        <?= isset($additional) ? $additional  : NULL ; ?>
        
      
        </div>
        <div class="col-sm-6">
            <div class="heading-block left-head text-left">
                <h6>
                    <?= $title ?>
                </h6>
            </div>
            <form action="<?= $form_url?>" method="post">
                <ul class="row">

                    <?
                    foreach ($controls as $control):?>
                    <li class="col-sm-12">
                        <label>
                            <?= $control ?>
                        </label>
                    </li>
                    <? endforeach;?>




                </ul>
            </form>
        </div>
    </div>
</div>


