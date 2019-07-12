<?php $plugin_path = plugin_dir_url( __FILE__ );?>
<div class="shadow">
<div class="col-md-12">
  <div class="row class_row1">
            <div class="col-md-6">
                  <img class="user-img" src="<?php echo "$obj->profile_picture" ?>"
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'">

                  <span
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    class="username"><?php echo $obj->user_app->name ?></span>
                  <span
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    class="segments"><?php echo $obj->segments?></span>
            </div>

            <div class="col-md-6">

                  <button
                    onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo $obj->user_app->username?>/home'"
                    type="button" class="btn budget-button">
                    Solicitar orçamento
                  </button>
            </div>

    </div>
  </div>

  <div>
    <img class="main_picture"
      src="https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/<?php echo "$obj->backgroundImage" ?>">
  </div>
</div>