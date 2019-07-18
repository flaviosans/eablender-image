<?php
/**
 * Plugin Name: EABlender - Image
 * Description: Imagens - A ponte entre o seu blog e o Entenda Antes
 * Version: 1.0.0
 * Author: Flávio Santos, Gleydson Parpinelli, Jonas Gabriel
 */
require "eablender-image-resume.php";

class EABlender_image {

	private $api;

	function __construct() {
		if ( class_exists( 'EABlender_API' ) ) {
			$this->api = EABlender_API::get_instance();
		}
		add_action('wp_enqueue_scripts', array($this, 'eablender_image_css') );
		add_shortcode('eablender-image', array($this, 'eablender_image'));
	}

	public function eablender_image_css(){
		wp_enqueue_style("ea-bridge-card", plugin_dir_url( __FILE__ ) . 'card.css', null, null, false );
	}


	public function eablender_image($atts = []){
		$return = null;
		$value = shortcode_atts( ['id' => 'no-id'], $atts );
		$response = $this->api->get_product_showcase_image( $value['id'] );

		if ($response->status_code != 200) {
			$response = $this->api->get_albuns_project_image( $value['id'] );
		}

		if($response->status_code == 200){
			$obj = $this->create_card_resume($response);
			$obj->user_app->name = $this->short_it($obj->user_app->name);
			ob_start();
			include("card_image.php");
			$return = ob_get_clean();
		} else {
			$return = $response->status_code . " " . $response->err_message;
		}
		
		return $return;
	}

	public function create_card_resume($response) {
		$check_object = $this->check_object_type($response);
	  	$backgroundImage = $response->content->path;
	  	$profile_picture = $check_object->userApp->userAppDetails;
	  	$user_app = $check_object->userApp;
			  
			if ($profile_picture->avatar) {
				$profile_picture = "https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/" .$profile_picture->avatar;
			}
			
			else {
				$profile_picture = plugin_dir_url( __FILE__ ) ."avatar.jpeg";
			}
				
				if (isset($user_app->segments)) {
					$segments = $user_app->segments[0]->name;
				}
				
			return new Eablender_Image_Resume($backgroundImage, $profile_picture, $segments, $user_app);
	}

	public function check_object_type($response) {
		if (isset($response->content->albumProject)) {
			return $type = $response->content->albumProject;
		  }
		  
		  else if (isset($response->content->productShowcase)) {
			return $type = $response->content->productShowcase;
		  }
	}

	public function short_it($nome) {
		$pieces = explode(" ", $nome);

		if (strlen($nome) > 43 && count($pieces) > 4) {
			$aux = $pieces[0];

			for ($i = 1; $i <= 3 ; $i++) {
				$aux = $aux . " " . $pieces[$i];
			}
			return $aux;
		}

		else {
			return $nome;
		}
	}
}

$eablender_image = new EABlender_image();
