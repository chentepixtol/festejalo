<div class="subcontent-unit-border-green">
   <div class="round-border-topleft"></div><div class="round-border-topright"></div>
   <h1 class="green">Categorias</h1>
   <form action="<?php echo url_for('categoria/filtrar')?>" method="post">
      <?php echo $form_filter?> 				
      <input type="submit" value="Filtrar" />
   </form>    
</div>