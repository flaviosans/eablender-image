<?php
/**
 * Plugin Name: EABlender - Image
 * Description: Imagens - A ponte entre o seu blog e o Entenda Antes
 * Version: 1.0.0
 * Author: Flávio Santos, Gleydson Parpinelli, Jonas Gabriel
 */

class EABlender_image {

	private $api;
	private $nojo = 'https://aes-entenda-antes-arquivosresized.s3.amazonaws.com';

	function __construct() {
		if ( class_exists( 'EABlender_API' ) ) {
			$this->api = EABlender_API::get_instance();
		}
		add_shortcode('eablender-image', array($this, 'eablender_image'));
	}

	public function eablender_image($atts = []){
		$value = shortcode_atts( [
			'id' => ''
		], $atts );

		$response = $this->api->get_product_showcase_image( $value['id'] );

		$return = "É essa a imagem que você queria?<p> <img src=\"";

		$return .= "https://aes-entenda-antes-arquivosresized.s3.amazonaws.com/";
			$return .= $response->path;


		$return .= "\">";

		return $return;
	}
}

$eablender_image = new EABlender_image();
