<?php $plugin_path = plugin_dir_url( __FILE__ );?>
<div class="shadow">
<div class="col-md-12">
  <div class="row class_row2">
            <div class="col-12 col-md-2">
                  <img class="user-img" src="<?php echo "$obj->profile_picture" ?>"
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'">
            </div>

            <div class="col-12 col-md-10">
            <div class="row class_row1">

            <div class="col-md-8">
          <div class="user_information">
            <span
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    class="username"><?php echo $obj->user_app->name ?></span>
                  <h6
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    class="segments"><?php echo $obj->segments?></h6>
                    </div>
                    </div>

            <div class="col-md-4">

                  <button
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    type="button" class="btn budget-button">
                    Solicitar orçamento
                  </button>
            </div>
            </div>

            </div>
    </div>
  </div>

  <div>
    <img class="main_picture"
      src="https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/<?php echo "$obj->backgroundImage" ?>">
  </div>
</div>