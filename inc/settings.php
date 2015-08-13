<?php

class TimeToMarketSettings {

	public function __construct() {
		$this->settings = [
			'name'     => 'Name',
			'url'      => 'URL'
		];

		add_action( 'admin_menu', [&$this, 'add_page'] );
		add_action( 'admin_init', [&$this, 'register_fields'] );
	}

	public function add_page() {
		add_options_page( __( 'Company Settings', LANG_DOMAIN ), __( 'Company', LANG_DOMAIN ), 'manage_options', 'ttm_company_settings', [&$this, 'page_content'] );
	}

	public function page_content() {
		?>
		<div class="wrap">
			<h2><?php _e('Company Settings', LANG_DOMAIN ); ?></h2>
			<form action="options.php" method="POST">
				<?php settings_fields('ttm_company_settings_group'); ?>
				<?php do_settings_sections('ttm_company_settings'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	public function register_fields() {
		add_settings_section( 'section_1', NULL, NULL, 'ttm_company_settings' );

		foreach ( $this->settings as $key => $setting ) {
			$this->register_setting( $key, $setting );
		}
	}

	public function register_setting( $key, $setting ) {
		register_setting( 'ttm_company_settings_group', 'ttm_company_' . $setting, 'esc_attr' );

		$html = function () use ( $key ) {
			$value = get_option( 'ttm_company_' . $key, '' );
			echo '<input class="regular-text" type="text" id="ttm_company_' . $key . '_id" name="ttm_company_' . $key . '" value="' . esc_attr( $value ) . '" />';
		};

		add_settings_field(
			'ttm_company_' . $key . '_field',
			'<label for="ttm_company_' . $key . '_id">' . __( $setting , LANG_DOMAIN ) . '</label>',
			$html,
			'ttm_company_settings',
			'section_1'
		);
	}

}

new TimeToMarketSettings();