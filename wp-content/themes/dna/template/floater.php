<section id="floater">
  <div class="row no-gutters px-4">
    <div class="col ml-auto">
      <a id="ligue_agora" href="tel:42998450001">
        <div class="row no-gutters">
          <div class="icon">
            <?php echo file_get_contents("wp-content/themes/dna/svg/telephone.svg"); ?>
          </div>
          <div class="information">              
            <span class="top">Ligue agora</span>
            <span class="bottom">(42) 99845 0001</span>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a id="atendimento_online" href="javascript:window.blipClient.toogleChat();">
        <div class="row no-gutters">
          <div class="icon">
            <?php echo file_get_contents("wp-content/themes/dna/svg/support.svg"); ?>
          </div>
          <div class="information">
            <span class="top">Atendimento</span>
            <span class="bottom">Online</span>
          </div>
        </div>
      </a>
    </div>
    <div class="col">
      <a id="atendimento_email" target="_blank" href="mailto:contato@prestes.com">
        <div class="row no-gutters">
          <div class="icon">
            <?php echo file_get_contents("wp-content/themes/dna/svg/envelope.svg"); ?>
          </div>              
          <div class="information">
            <span class="top">Atendimento</span>
            <span class="bottom">Por e-mail</span>
          </div>
        </div>
      </a>
    </div>
    <?php
      if( get_post_type(  ) == 'imoveis'){
      $singleImoveis = get_the_title( );
      }
    ?>
    <div class="col">
      <a id="atendimento_whatsapp" 
      target="_blank" 
      href="https://api.whatsapp.com/send?phone=+5542998450001&l=pt_br&text=Ol%C3%A1,%20estava%20no%20site%20e%20quero%20saber%20mais%20detalhes<?php if(isset($singleImoveis)){echo" do empreendimento: ".$singleImoveis;} ?>.">
        <div class="row no-gutters">              
          <div class="icon">
            <?php echo file_get_contents("wp-content/themes/dna/svg/whatsapp.svg"); ?>
          </div>
          <div class="information">                
              <span class="top">Atendimento</span>
              <span class="bottom">Whatsapp</span>
          </div>
        </div>
      </a>
    </div>
    <div class="col mr-auto">
      <a id="atendimento_portal" target="_blank" href="https://prestesconstrutora-portalcliente.sienge.com.br/">
        <div class="row no-gutters">
          <div class="icon">
            <?php echo file_get_contents("wp-content/themes/dna/svg/house.svg"); ?>
          </div>              
          <div class="information">
            <span class="top">Portal</span>
            <span class="bottom">Já sou cliente</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>