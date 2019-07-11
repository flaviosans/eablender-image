<?php $plugin_path = plugin_dir_url( __FILE__ );

if (isset($response->content->albumProject)) {
  $check_object = $response->content->albumProject;
}

else if (isset($response->content->productShowcase)) {
  $check_object = $response->content->productShowcase;
}

    $backgroundImage = $response->content->path;
    $profile_picture = $check_object->userApp->userAppDetails;
    $user_app = $check_object->userApp;

    
    if ($profile_picture->avatar) {
      $profile_picture = "https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/" .$profile_picture->avatar;
    }
    
    else {
      $profile_picture = $plugin_path ."avatar.jpeg";
    }
    
    //Adicionando o segmento
    if ($user_app->segments) {
      $segments = $user_app->segments[0]->name;
    }

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="card.css">

<style>.user-img {
    height: 100px;
    width: 100px;
    margin-top: 20px;
    border-radius: 50px;
    object-fit: cover;
    border: 2px solid #0579FF;
}

.productShowcase-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}

.margin-left {
  margin-left: 10px;
}

.speciality {
  margin-top: -20px;
  margin-left: -155px;
}

.budget-button {
  background-color: #ff7700;
  margin: 15px 0px 15px 0px;
}

.shadow {
  -webkit-box-shadow: 4px 7px 14px -6px rgba(0,0,0,0.75);
-moz-box-shadow: 4px 7px 14px -6px rgba(0,0,0,0.75);
box-shadow: 4px 7px 14px -6px rgba(0,0,0,0.75);
}

</style>

<div class="shadow">
  <div>
    <img class="productShowcase-img"
      src="https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/<?php echo "$backgroundImage" ?>">
  </div>

  <footer style="background-color: #FFF;">
    <div class="row" style="align-items: center; padding-bottom: 10px;">

      <div class="col-4" style="text-align: center;">
        <img class="user-img" src="<?php echo "$profile_picture" ?>">
      </div>

      <div class="col-8">
        <h3 style="text-align: left; color: #606062; line-height: 0.9em;"><?php echo "$user_app->name" ?></h3>
        <span style="text-align: left; color: #606062;"><?php echo $segments?></span>
        <br/>
        <button onclick="window.location.href = 'https://app.entendaantes.com.br/site/<?php echo "$user_app->username"?>/home'"  type="button" class="btn budget-button">
         Solicitar orçamento
        </button>
      </div>

    </div>
  </footer>
</div>