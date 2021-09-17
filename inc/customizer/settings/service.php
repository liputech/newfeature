<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\newfeature\Customizer\Settings;

use radiustheme\newfeature\Customizer\NewfeatureTheme_Customizer;
use radiustheme\newfeature\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\newfeature\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\newfeature\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\newfeature\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NewfeatureTheme_Service_Post_Settings extends NewfeatureTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_service_post_controls' ) );
	}

    /**
     * Service Post Controls
     */
    public function register_service_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'services_style',
            array(
                'default' => $this->defaults['services_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'services_style',
            array(
                'label' => __( 'Service Archive Layout', 'newfeature' ),
                'description' => esc_html__( 'Select the Service layout for gallery page', 'newfeature' ),
                'section' => 'rttheme_service_settings',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'newfeature' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 2', 'newfeature' )
                    ),
                )
            )
        ) );

        // Service option
        $wp_customize->add_setting( 'service_excerpt_limit',
            array(
                'default' => $this->defaults['service_excerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'service_excerpt_limit',
            array(
                'label' => __( 'Service Content Limit', 'newfeature' ),
                'section' => 'rttheme_service_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'service_ar_button',
            array(
                'default' => $this->defaults['service_ar_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'service_ar_button',
            array(
                'label' => __( 'Service Button', 'newfeature' ),
                'section' => 'rttheme_service_settings',
            )
        ));
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NewfeatureTheme_Service_Post_Settings();
}
