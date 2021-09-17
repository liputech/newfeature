<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\newfeature\Customizer\Settings;

use radiustheme\newfeature\Customizer\NewfeatureTheme_Customizer;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NewfeatureTheme_Error_Settings extends NewfeatureTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
        // Error Page Banner Title
        $wp_customize->add_setting( 'error_title',
            array(
                'default' => $this->defaults['error_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_title',
            array(
                'label' => __( 'Page Title', 'newfeature' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_bodybg', 
            array(
                'default' => $this->defaults['error_bodybg'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bodybg',
            array(
                'label' => esc_html__('Body Background Color', 'newfeature'),
                'section' => 'error_section', 
            )
        ));
		// Bckground Image
        $wp_customize->add_setting( 'error_bg',
            array(
                'default' => $this->defaults['error_bg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_bg',
            array(
                'label' => __( 'Body Background Image', 'newfeature' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'newfeature' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'newfeature' ),
                    'change' => __( 'Change File', 'newfeature' ),
                    'default' => __( 'Default', 'newfeature' ),
                    'remove' => __( 'Remove', 'newfeature' ),
                    'placeholder' => __( 'No file selected', 'newfeature' ),
                    'frame_title' => __( 'Select File', 'newfeature' ),
                    'frame_button' => __( 'Choose File', 'newfeature' ),
                )
            )
        ) );
		// Body Image 1
        $wp_customize->add_setting( 'error_image1',
            array(
                'default' => $this->defaults['error_image1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image1',
            array(
                'label' => __( 'Body Image 1', 'newfeature' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'newfeature' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'newfeature' ),
                    'change' => __( 'Change File', 'newfeature' ),
                    'default' => __( 'Default', 'newfeature' ),
                    'remove' => __( 'Remove', 'newfeature' ),
                    'placeholder' => __( 'No file selected', 'newfeature' ),
                    'frame_title' => __( 'Select File', 'newfeature' ),
                    'frame_button' => __( 'Choose File', 'newfeature' ),
                )
            )
        ) );
        // Body Image 2
        $wp_customize->add_setting( 'error_image2',
            array(
                'default' => $this->defaults['error_image2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image2',
            array(
                'label' => __( 'Body Image 2', 'newfeature' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'newfeature' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'newfeature' ),
                    'change' => __( 'Change File', 'newfeature' ),
                    'default' => __( 'Default', 'newfeature' ),
                    'remove' => __( 'Remove', 'newfeature' ),
                    'placeholder' => __( 'No file selected', 'newfeature' ),
                    'frame_title' => __( 'Select File', 'newfeature' ),
                    'frame_button' => __( 'Choose File', 'newfeature' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Text 1', 'newfeature' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text 2', 'newfeature' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'newfeature' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Text 1 Color', 'newfeature'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text 2 Color', 'newfeature'),
                'section' => 'error_section', 
            )
        ));
		
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NewfeatureTheme_Error_Settings();
}
