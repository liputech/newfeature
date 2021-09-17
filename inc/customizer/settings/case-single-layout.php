<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\newfeature\Customizer\Settings;

use radiustheme\newfeature\Customizer\NewfeatureTheme_Customizer;
use radiustheme\newfeature\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\newfeature\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\newfeature\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NewfeatureTheme_Case_Single_Layout_Settings extends NewfeatureTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_case_single_layout_controls' ) );
	}

    public function register_case_single_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'case_layout',
            array(
                'default' => $this->defaults['case_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'case_layout',
            array(
                'label' => __( 'Layout', 'newfeature' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'newfeature' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'newfeature' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'newfeature' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'case_single_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'case_padding_top',
            array(
                'default' => $this->defaults['case_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'case_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'case_padding_bottom',
            array(
                'default' => $this->defaults['case_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'case_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'case_banner',
            array(
                'default' => $this->defaults['case_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'case_banner',
            array(
                'label' => __( 'Banner', 'newfeature' ),
                'section' => 'case_single_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'case_breadcrumb',
            array(
                'default' => $this->defaults['case_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'case_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'newfeature' ),
                'section' => 'case_single_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'case_bgtype',
            array(
                'default' => $this->defaults['case_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'case_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'newfeature' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'newfeature' ),
                    'bgcolor' => esc_html__( 'BG Color', 'newfeature' ),
                ),
            )
        );

        $wp_customize->add_setting( 'case_bgimg',
            array(
                'default' => $this->defaults['case_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'case_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'newfeature' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'newfeature' ),
                    'change' => __( 'Change File', 'newfeature' ),
                    'default' => __( 'Default', 'newfeature' ),
                    'remove' => __( 'Remove', 'newfeature' ),
                    'placeholder' => __( 'No file selected', 'newfeature' ),
                    'frame_title' => __( 'Select File', 'newfeature' ),
                    'frame_button' => __( 'Choose File', 'newfeature' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('case_bgcolor', 
            array(
                'default' => $this->defaults['case_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'case_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'newfeature'),
                'settings' => 'case_bgcolor', 
                'priority' => 10, 
                'section' => 'case_single_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'case_page_bgimg',
            array(
                'default' => $this->defaults['case_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'case_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'newfeature' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'newfeature' ),
                'section' => 'case_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'newfeature' ),
                    'change' => __( 'Change File', 'newfeature' ),
                    'default' => __( 'Default', 'newfeature' ),
                    'remove' => __( 'Remove', 'newfeature' ),
                    'placeholder' => __( 'No file selected', 'newfeature' ),
                    'frame_title' => __( 'Select File', 'newfeature' ),
                    'frame_button' => __( 'Choose File', 'newfeature' ),
                ),
            )
        ) );
		
		$wp_customize->add_setting('case_page_bgcolor', 
            array(
                'default' => $this->defaults['case_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'case_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'newfeature'),
                'settings' => 'case_page_bgcolor', 
                'section' => 'case_single_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NewfeatureTheme_Case_Single_Layout_Settings();
}
