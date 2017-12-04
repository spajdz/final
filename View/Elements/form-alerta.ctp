<? if ( $flash = $this->Session->flash('flash') ) : ?>

    <? if ( ! empty($enviado) ){ ?>

        <script>

        if(((location.href.match(/rtrk\.com/i) !== null || location.href.match(/rtrk\.cl/i) !== null){

            ga('send', 'pageview', '/gracias-reachlocal');
        }else{
            ga('send', 'pageview', '/gracias');
            
        }
        </script>

        <div class="validacion"><?= $flash; ?></div>
        
    <? }else{ ?> 

        <div class="validacion"><?= $flash; ?></div>

    <? }?> 


<? endif; ?>


