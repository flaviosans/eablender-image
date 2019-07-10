<?php $plugin_path = plugin_dir_url( __FILE__ );

$image = $response->content->productShowcase->userApp->userAppDetails;
$productShowcaseImage = $response->content->path;
$name = $response->content->productShowcase->userApp->name;

if ($image->cover) {
  $image = "https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/" .$image->cover;
}

else {
  $image = $plugin_path ."avatar.jpeg";
}

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="card.css">

<style>.user-img {
  height: 70px;
  width: 70px;
  margin-top: 20px;
  border-radius: 50px;
  object-fit: cover;
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
}

</style>

<div>
  <div>
    <img class="productShowcase-img"
      src="https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/<?php echo "$productShowcaseImage" ?>">
  </div>

  <footer style="background-color: #0579FF;">
    <div class="row" style="align-items: center; padding-bottom: 10px;">

      <div class="col-3" style="text-align: center;">
        <img class="user-img" src="<?php echo "$image" ?>">
      </div>

      <div class="col-9">
        <h4 style="text-align: left; color: white; line-height: 0.9em;"><?php echo "$name" ?></h4>
        <span style="text-align: left; color: white;">Engenheiro, decorador</span>
        <div>

          <div class="col-12" style="text-align: right;">
            <button type="button" class="btn btn-template budget-button">
              <a href="https://app.entendaantes.com.br/peca-seu-orcamento">Solicitar orçamento</a>
            </button>
          </div>

        </div>
  </footer>
</div>