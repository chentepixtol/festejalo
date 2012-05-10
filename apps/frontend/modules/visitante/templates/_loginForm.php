
<?php if(!$menu):?>
   <div class="subcontent-unit-border">
      <div class="round-border-topleft"></div><div class="round-border-topright"></div>
      <h1>Login</h1>
      <div class="loginform">
          <form action="<?php echo url_for('visitante/verifica')?>" method="post">
             <?php echo $form?>
             <input type="submit" value="Enviar" />
          </form>
      </div>
      <p><a href="<?php echo url_for('visitante/registro')?>" class="tip" title="Registro de Visitante" rel="Registrese para obtener beneficios.">registro</a></p>
   </div>

<?php else: ?>
   <div class="subcontent-unit-border">
      <div class="round-border-topleft"></div><div class="round-border-topright"></div>
      <h1>Promociones</h1>
      <?php include_partial('visitante/cupones',array(
         'visitante_cupones' => $visitante_cupones,
      ))?>
   </div>
<?php endif;?>
