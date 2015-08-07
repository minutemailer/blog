<?php

class TimeToMarket_Customize {

	public static function register( $wp_customize ) {

		/** Add brand section */
		$wp_customize->add_section(
			'minutemailer_brand_options',
			[
				'title'    => __( 'Brand options', LANG_DOMAIN ),
				'priority' => 201
			]
		);

		/** Add logo setting */
		$wp_customize->add_setting( 'minutemailer_logo', [
			'default' => WEBROOT . 'img/logo.svg'
		] );

		/** Custom logo */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'logo',
				[
					'label'      => __( 'Upload a logo', LANG_DOMAIN ),
					'section'    => 'minutemailer_brand_options',
					'settings'   => 'minutemailer_logo',
					'context'    => 'minutemailer_options' 
				]
			)
		);

	}

}

add_action( 'customize_register', ['TimeToMarket_Customize', 'register'] );