<div class="subcontent-unit-border">
   <div class="round-border-topleft"></div><div class="round-border-topright"></div>
   <h1>Ultimas Noticias</h1>   
   <dl class="nav3-bullet">
         <?php foreach($noticias as $noticia):?>
             <dt class="noticia">
                <a href="<?php echo url_for('show_noticia',$noticia)?>">
                    <?php echo $noticia->getTitulo()?>
                 </a>
             </dt>
         <?php endforeach;?>
    </dl>
</div>