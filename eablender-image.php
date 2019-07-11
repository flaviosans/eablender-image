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
		$return = null;
		$value = shortcode_atts( ['id' => 'no-id'], $atts );
		$response = $this->api->get_product_showcase_image( $value['id'] );

		if ($response->status_code != 200) {
			$response = $this->api->get_albuns_project_image( $value['id'] );
		}

		if($response->status_code == 200){
			ob_start();
			include("card_image.php");
			$return = ob_get_clean();
		} else {
			$return = $response->status_code . " " . $response->err_message;
		}
		return $return;
	}

}

$eablender_image = new EABlender_image();
