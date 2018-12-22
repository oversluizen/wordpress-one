<?php
namespace ElementorPro\Modules\ThemeBuilder\Widgets;

use Elementor\Widget_Image;
use ElementorPro\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Post_Featured_Image extends Widget_Image {

	public function get_name() {
		// `theme` prefix is to avoid conflicts with a dynamic-tag with same name.
		return 'theme-post-featured-image';
	}

	public function get_title() {
		return __( 'Featured Image', 'elementor-pro' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return [ 'theme-elements' ];
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->update_control(
			'image',
			[
				'dynamic' => [
					'default' => Plugin::elementor()->dynamic_tags->tag_data_to_tag_text( null, 'post-featured-image' ),
				],
			],
			[
				'recursive' => true,
			]
		);
	}
}
