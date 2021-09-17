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
class NewfeatureTheme_Case_Post_Settings extends NewfeatureTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_case_post_controls' ) );
	}

    /**
     * Case Post Controls
     */
    public function register_case_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'case_archive_style',
            array(
                'default' => $this->defaults['case_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'case_archive_style',
            array(
                'label' => __( 'Case Archive Layout', 'newfeature' ),
                'description' => esc_html__( 'Select the case layout for case page', 'newfeature' ),
                'section' => 'rttheme_case_settings',
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

		$wp_customize->add_setting( 'case_ar_category',
            array(
                'default' => $this->defaults['case_ar_category'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'case_ar_category',
            array(
                'label' => __( 'Show Category', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));
		
		// Single Case Post
		$wp_customize->add_setting('case_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'case_single_heading', array(
            'label' => __( 'Single Case Settings', 'newfeature' ),
            'section' => 'rttheme_case_settings',
        )));

        /*case date*/
        $wp_customize->add_setting( 'show_case_date',
            array(
                'default' => $this->defaults['show_case_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_date',
            array(
                'label' => __( 'Show Single Date', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));

        /*case category*/
        $wp_customize->add_setting( 'show_case_cat',
            array(
                'default' => $this->defaults['show_case_cat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_cat',
            array(
                'label' => __( 'Show Single Category', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));

        /*case view*/
        $wp_customize->add_setting( 'show_case_view',
            array(
                'default' => $this->defaults['show_case_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_view',
            array(
                'label' => __( 'Show Single View', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));

        /*case social*/
        $wp_customize->add_setting( 'show_case_social',
            array(
                'default' => $this->defaults['show_case_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_social',
            array(
                'label' => __( 'Show Single Social', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));

        /*case like*/
        $wp_customize->add_setting( 'show_case_like',
            array(
                'default' => $this->defaults['show_case_like'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_like',
            array(
                'label' => __( 'Show Single Like', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));

        /*case pagination*/
        $wp_customize->add_setting( 'show_case_pagination',
            array(
                'default' => $this->defaults['show_case_pagination'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_case_pagination',
            array(
                'label' => __( 'Show Single Pagination', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));
		
		$wp_customize->add_setting( 'show_related_case',
            array(
                'default' => $this->defaults['show_related_case'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_case',
            array(
                'label' => __( 'Show Related Case', 'newfeature' ),
                'section' => 'rttheme_case_settings',
            )
        ));
		
		$wp_customize->add_setting( 'case_related_title',
            array(
                'default' => $this->defaults['case_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'case_related_title',
            array(
                'label' => __( 'Related Title', 'newfeature' ),
                'section' => 'rttheme_case_settings',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_related_case_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_case_number',
            array(
                'default' => $this->defaults['related_case_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_case_number',
            array(
                'label' => __( 'Related Case Post', 'newfeature' ),
                'section' => 'rttheme_case_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_case_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_case_title_limit',
            array(
                'default' => $this->defaults['related_case_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_case_title_limit',
            array(
                'label' => __( 'Related Title Limit', 'newfeature' ),
                'section' => 'rttheme_case_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_case_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new NewfeatureTheme_Case_Post_Settings();
}
