<?php
class Eablender_Image_Resume {
	public $backgroundImage;
	public $profile_picture;
	public $segments;
	public $user_app;

	function __construct($backgroundImage, $profile_picture, $segments, $user_app) {
		$this->backgroundImage = $backgroundImage;
		$this->profile_picture = $profile_picture;
		$this->segments = $segments;
		$this->user_app = $user_app;
	}
}
?>