<?php
/**
 * Plugin Name: EABlender - Image
 * Description: Imagens - A ponte entre o seu blog e o Entenda Antes
 * Version: 1.0.0
 * Author: Flávio Santos, Gleydson Parpinelli, Jonas Gabriel
 */

class EABlender_image {

	private $api;

	function __construct() {
		if ( class_exists( 'EABlender_API' ) ) {
			$this->api = EABlender_API::get_instance();
		}
		add_shortcode('eablender-image', array($this, 'eablender_image'));
	}

	public function eablender_image($atts = []){
		$value = shortcode_atts( ['id' => 'no-id'], $atts );
		$return = null;
		$response = $this->api->get_product_showcase_image( $value['id'] );

		if(!$response->status_code == 200){

			$content = $response->content;
			$return  = "É essa a imagem que você queria?<p> <img src=\"";
			$return .= "https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/";
			$return .= $content->path;
			$return .= "\"><br>";
			$return .= 'Titulo da imagem: ' . $content->title . " ";
			if(isset($content->keywords)){
				$return .= 'Tags:';
				foreach($content->meta->keywords as $keyword){
					$return .= $keyword . '|';
				}
			}
			$return .= "Título do álbum: " . $content->productShowcase->title;

			$return .= "<br>Nome do profissional:" . $content->productShowcase->userApp->name;
		} else {
			$return = $response->status_code . " " . $response->err_message;
		}
		return $return;
	}
}

$eablender_image = new EABlender_image();
