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
      <a id="atendimento_email" href="#" data-toggle="modal" data-target="#atendimentoporemailmodal">
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
      href="#" data-toggle="modal" data-target="#atendimentoporwhatsmodal">
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
<section id="formsfloater">
  <!-- no main.js em iniciaAtendimentoPorEmailTrigger()
  tem de setar o input[name='redirect_to'] do form para o redirect -->
  <div class="modal fade" tabindex="-1" role="dialog" id="atendimentoporemailmodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div role="main" id="atendimento-por-e-mail-8789164923009fd9d62d"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>
  <script type="text/javascript"> new RDStationForms('atendimento-por-e-mail-8789164923009fd9d62d', 'UA-100759079-1').createForm();</script>
  
  <!-- atendimento por whats redireciona sozinho pelo rd -->
  <div class="modal fade" tabindex="-1" role="dialog" id="atendimentoporwhatsmodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div role="main" id="atendimento-whatsapp-23a3548a6afd73c43d7e"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>
  <script type="text/javascript"> new RDStationForms('atendimento-whatsapp-23a3548a6afd73c43d7e', 'UA-100759079-1').createForm();</script>
</section>