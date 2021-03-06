<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\newfeature\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class NewfeatureTheme_Customizer {
	// Get our default values
	protected $defaults;
    protected static $instance = null;

	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'add_customizer_panels' ) );
		// Register sections
		add_action( 'customize_register', array( $this, 'add_customizer_sections' ) );
	}

    public static function instance() {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function populated_default_data() {
        $this->defaults = rttheme_generate_defaults();
    }

	/**
	 * Customizer Panels
	 */
	public function add_customizer_panels( $wp_customize ) {

	    // Add Layput Panel
		$wp_customize->add_panel( 'rttheme_layouts_defaults',
		 	array(
				'title' => __( 'Layout Settings', 'newfeature' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'newfeature' ),
				'priority' => 5,
			)
		);

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_blog_settings',
            array(
                'title' => __( 'Blog Settings', 'newfeature' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'newfeature' ),
                'priority' => 6,
            )
        );
		
		// Add General Panel
        $wp_customize->add_panel( 'rttheme_cpt_settings',
            array(
                'title' => __( 'Custom Posts', 'newfeature' ),
                'description' => esc_html__( 'All custom posts settings here.', 'newfeature' ),
                'priority' => 7,
            )
        );
		
	}

    /**
    * Customizer sections
    */
	public function add_customizer_sections( $wp_customize ) {

		// Rename the default Colors section
		$wp_customize->get_section( 'colors' )->title = 'Background';

		// Move the default Colors section to our new Colors Panel
		$wp_customize->get_section( 'colors' )->panel = 'colors_panel';

		// Change the Priority of the default Colors section so it's at the top of our Panel
		$wp_customize->get_section( 'colors' )->priority = 10;

		// Add General Section
		$wp_customize->add_section( 'general_section',
			array(
				'title' => __( 'General', 'newfeature' ),
				'priority' => 1,
			)
		);
		
		// Add Color Section
		$wp_customize->add_section( 'color_section',
			array(
				'title' => __( 'Color', 'newfeature' ),
				'priority' => 2,
			)
		);

		// Add Header Main Section
		$wp_customize->add_section( 'header_section',
			array(
				'title' => __( 'Header', 'newfeature' ),
				'priority' => 3,
			)
		);

        // Add Footer Section
        $wp_customize->add_section( 'footer_section',
            array(
                'title' => __( 'Footer', 'newfeature' ),
                'priority' => 4,
            )
        );
		
		// Add Footer Section
        $wp_customize->add_section( 'banner_section',
            array(
                'title' => __( 'Banner', 'newfeature' ),
                'priority' => 5,
            )
        );
		
        // Add Pages Slug Section		
		$wp_customize->add_section( 'slug_layout_section',
            array(
                'title' => __( 'Post Type Slug', 'newfeature' ),
                'priority' => 1,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		// Add Pages Layout Section	
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => __( 'Pages Layout', 'newfeature' ),
                'priority' => 2,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Blog Archive Layout Section
        $wp_customize->add_section( 'blog_layout_section',
            array(
                'title' => __( 'Blog Archive Layout', 'newfeature' ),
                'priority' => 3,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Blog Single Layout Section
        $wp_customize->add_section( 'post_single_layout_section',
            array(
                'title' => __( 'Post Single Layout', 'newfeature' ),
                'priority' => 4,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Service Archive Layout Section
        $wp_customize->add_section( 'service_layout_section',
            array(
                'title' => __( 'Service Archive Layout', 'newfeature' ),
                'priority' => 5,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Service Single Layout Section
        $wp_customize->add_section( 'service_single_layout_section',
            array(
                'title' => __( 'Service Single Layout', 'newfeature' ),
                'priority' => 6,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Case Archive Layout Section
        $wp_customize->add_section( 'case_layout_section',
            array(
                'title' => __( 'Case Archive Layout', 'newfeature' ),
                'priority' => 7,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Case Single Layout Section
        $wp_customize->add_section( 'case_single_layout_section',
            array(
                'title' => __( 'Case Single Layout', 'newfeature' ),
                'priority' => 8,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Team Archive Layout Section
        $wp_customize->add_section( 'team_layout_section',
            array(
                'title' => __( 'Team Archive Layout', 'newfeature' ),
                'priority' => 9,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Team Single Layout Section
        $wp_customize->add_section( 'team_single_layout_section',
            array(
                'title' => __( 'Team Single Layout', 'newfeature' ),
                'priority' => 10,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Search Layout Section
        $wp_customize->add_section( 'search_layout_section',
            array(
                'title' => __( 'Search Layout', 'newfeature' ),
                'priority' => 11,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Error Layout Section
        $wp_customize->add_section( 'error_layout_section',
            array(
                'title' => __( 'Error Layout', 'newfeature' ),
                'priority' => 12,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Archive Layout Section
        $wp_customize->add_section( 'wc_shop_layout_section',
            array(
                'title' => __( 'Shop Archive Layout', 'newfeature' ),
                'priority' => 13,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Single Layout Section
        $wp_customize->add_section( 'wc_product_layout_section',
            array(
                'title' => __( 'Product Single Layout', 'newfeature' ),
                'priority' => 14,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
        // Add Blog Settings Section -------------------------
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => __( 'Blog Settings', 'newfeature' ),
                'priority' => 7,
                'panel' => 'rttheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => __( 'Post Settings', 'newfeature' ),
                'priority' => 8,
                'panel' => 'rttheme_blog_settings',
            )
        );
		// Add Single Share Settings Section
        $wp_customize->add_section( 'single_post_share_section',
            array(
                'title' => __( 'Post Share', 'newfeature' ),
                'priority' => 9,
                'panel' => 'rttheme_blog_settings',
            )
        );
		
		// Add Case Section
        $wp_customize->add_section( 'rttheme_case_settings',
            array(
                'title' => __( 'Case Setting', 'newfeature' ),
                'priority' => 10,
				'panel' => 'rttheme_cpt_settings',
            )
        );
		
		// Add Team Section
        $wp_customize->add_section( 'rttheme_team_settings',
            array(
                'title' => __( 'Team Setting', 'newfeature' ),
                'priority' => 11,
				'panel' => 'rttheme_cpt_settings',
            )
        );
		// Add Service Section
        $wp_customize->add_section( 'rttheme_service_settings',
            array(
                'title' => __( 'Service Setting', 'newfeature' ),
                'priority' => 12,
				'panel' => 'rttheme_cpt_settings',
            )
        ); 
        
        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => __( 'Error Page', 'newfeature' ),
                'priority' => 13,
            )
        );

	}

}
