
<? $id = uniqid() ?>


<span class="btn-group dropright">
    <a           data-toggle="collapse"
                 href="#<?= $id ?>"
                 role="button"
                 aria-expanded="false"
                 aria-controls="collapseExample"
                 class="text-muted"
                 >
        <i data-id='<?= $url ?>' style="color:<?= $this->colors->get_color($color_id) ?>" class="fa fa-circle">
       
        </i> 
    </a>

    <div class="collapse" id="<?=$id ?>" >
        <div  data-url="<?= $url ?>"  class="card card-body">

            <? foreach ($this->colors->get_colors() as $value=>$onecolor):?>
            <i data-circle="true" data-value='<?= $value?>' style="color:<?= $onecolor ?>" class="fa fa-circle ">

            </i>
            
            
            
            <? endforeach ;?>

        </div>
    </div>


</span>
