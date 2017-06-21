<?php
new NS_Cloner_Customizer();

class NS_Cloner_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'adding_to_the_customizer' ) );
		add_action( 'admin_menu', array( $this, 'customizer_admin' ) );
		// add_action( 'network_admin_menu', array( $this, 'admin_menu_pages' ) );
	}

	/**
	 * Add the Customize link to the admin menu
	 *
	 * @return void
	 */
	public function customizer_admin() {
		add_dashboard_page( 'NS Cloner Dashboard', 'NS Cloner Dashboard', 'manage_options', 'customizer-dash.php', array( $this, 'column_based_admin_page' ) );
	}

	/**
	 * Add the Customize link to the admin menu
	 *
	 * @return void
	 */
	public function admin_menu_pages() {
		// add_submenu_page(
		// $this->ns_cloner_return( 'menu_slug' ),
		// __( 'NS Cloner V3', 'ns-cloner' ),
		// __( 'NS Cloner V3', 'ns-cloner' ),
		// $this->ns_cloner_return( 'capability' ),
		// $this->ns_cloner_return( 'menu_slug' ),
		// array( $this, 'admin_render_main_page' )
		// );
		// add_submenu_page(
		// $this->ns_cloner_return( 'menu_slug' ),
		// __( 'NS Cloner Dash', 'ns-cloner' ),
		// __( 'NS Cloner Dash', 'ns-cloner' ),
		// $this->ns_cloner_return( 'capability' ),
		// 'ns-cloner-dash.php',
		// array( $this, 'ns_cloner_dashboard' )
		// );
		add_submenu_page( $this->ns_cloner_return( 'menu_slug' ), 'NS Cloner Customiser', 'NS Cloner Customiser', $this->ns_cloner_return( 'capability' ), '../customize.php' );
	}

	/**
	 * Add the Customize link to the admin menu
	 *
	 * @return void
	 */
	public function ns_cloner_dashboard() {
	    $wid_opts = get_option( 'dashboard_widget_options' );
	    $dashboard_widgets = apply_filters( 'wp_dashboard_widgets', array() );
		global $wp_dashboard_widgets;
		echo '<div class="wrap">';

		echo $this->ns_cloner_return( 'menu_slug' );
		echo '<pre>wp_meta_boxes';
		// var_dump( $var );
		print_r( $wp_dashboard_widgets );
		echo '</pre>';

		echo '</div>';
	}

	public static function column_based_admin_page() {
	?>
		<div class="wrap">

			<h2><?php esc_attr_e( 'Column-based Admin Page', 'ns_cloner_customizer' ); ?></h2>
			<div id="col-container">

				<div id="col-right">

					<div class="col-wrap">
			<h2><?php esc_attr_e( 'Right Column', 'ns_cloner_customizer' ); ?></h2>
						<?php esc_attr_e( 'Right Header Comment area', 'ns_cloner_customizer' ); ?>
						<div class="inside">
							<p>
						<?php if ( current_user_can( 'customize' ) ) : ?>
							<h3><?php _e( 'Get Started' ); ?></h3>
							<a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo wp_customize_url(); ?>"><?php _e( 'Customize Your Site' ); ?></a>
						<?php endif; ?>
							<?php

							$this->ns_cloner_dashboard();

							esc_attr_e( 'WordPress started in 2003 with a single bit of code to enhance the typography  on millions of sites and seen by tens of millions of people every day.', 'ns_cloner_customizer' ); ?></p>
						</div>

					</div>
					<!-- /col-wrap -->

				</div>
				<!-- /col-right -->

				<div id="col-left">

					<div class="col-wrap">
			<h2><?php esc_attr_e( 'Main NS Cloner Class', 'ns_cloner_customizer' ); ?></h2>
						<div class="inside">
							<p>
								<?php

								echo '<li>Menu slug = ' . $this->ns_cloner_return( 'menu_slug' ) . '</li>';
								echo '<li>Menu slug = ' . $this->ns_cloner_return( 'capability' ) . '</li>';
								echo '<li>Menu slug = ' . gettype( $this->ns_cloner_return( 'menu_slug' ) ) . '</li>';
						?>
							</p>
							<p><?php esc_attr_e( 'Everything you see here, from the documentation to the code itself, was created by and for the com Fortune 500 web site without paying anyone a license fee and a number of other important freedoms.', 'ns_cloner_customizer' ); ?></p>
						</div>
					</div>
					<!-- /col-wrap -->

				</div>
				<!-- /col-left -->

			</div>
			<!-- /col-container -->

		</div> <!-- .wrap -->
	<?php	}


	/**
	 * Add the Customize link to the admin menu
	 *
	 * @return void
	 */
	public function ns_cloner_return( $method ) {
		$ns_cloner = new ns_cloner;
		return $ns_cloner->$method;
	}


	/**
	 * Customizing the Customizer
	 *
	 * @param WP_Customizer_Manager $customizer_additions
	 * @return void
	 */
	public function adding_to_the_customizer( $customizer_additions ) {
	    $this->panel_creation( $customizer_additions );
	    $this->new_sections( $customizer_additions );
	    $this->ns_custom_sections( $customizer_additions );
	}
	/**
	 * A section to show how you use the default customizer controls in WordPress
	 *
	 * @param Obj $customizer_additions Customizer Manager.
	 *
	 * @return Void
	 */
	private function panel_creation( $customizer_additions ) {
		$customizer_additions->add_panel(
			'ns_cloner_panel', array(
			'title'       => 'NS Cloner Panel',
			'description' => 'This is a description of this NS Cloner Customizer panel',
			'priority'    => 10,
			)
		);
		$customizer_additions->add_section(
			'ns_cloner_section1', array(
			'title'          => 'NS Cloner Section 0',
			'description'    => 'Description of the NS Cloner Customizer Section of the NS Cloner Customizer panel',
			'priority'       => 35,
			'panel'          => 'ns_cloner_panel',
			)
		);

		// Textbox control
		$customizer_additions->add_setting( 'textbox_setting1', array(
			'default'        => 'Default Value',
		) );

		$customizer_additions->add_control( 'textbox_setting1', array(
			'label'   => 'Text Setting',
			'section' => 'ns_cloner_section1',
			'type'    => 'text',
			'priority' => 1,
		) );

	}

	/**
	 * Adds a new section to use custom controls in the WordPress customiser
	 *
	 * @param  Obj $customizer_additions Customizer Manager.
	 *
	 * @return Void
	 */
	private function new_sections( $customizer_additions ) {

		$customizer_additions->add_section(
			'ns_cloner_section', array(
			'title'          => 'NS Cloner Section 1',
			'label'          => 'NS Cloner Panel',
			'description'    => 'Description of the NS Cloner Customizer Section of the NS Cloner Customizer panel',
			'priority'       => 35,
			'panel'          => 'ns_cloner_panel',
			)
		);

		// Textbox control
		$customizer_additions->add_setting( 'textbox_setting', array(
			'default'        => 'Default Value',
		) );

		$customizer_additions->add_control( 'textbox_setting', array(
			'label'   => 'Text Setting',
			'section' => 'ns_cloner_section',
			'type'    => 'text',
			'priority' => 1,
		) );

		// Radio control
		$customizer_additions->add_setting( 'radio_setting', array(
			'default'        => '1',
		) );

		$customizer_additions->add_control( 'radio_setting', array(
			'label'   => 'Radio Setting',
			'section' => 'ns_cloner_section',
			'type'    => 'radio',
			'choices' => array( '1', '2', '3' ),
			'priority' => 3,
		) );

		// Dropdown pages control
		$customizer_additions->add_setting( 'dropdown_pages_setting', array(
			'default'        => '1',
		) );

		$customizer_additions->add_control( 'dropdown_pages_setting', array(
			'label'   => 'Dropdown Pages Setting',
			'section' => 'ns_cloner_section',
			'type'    => 'dropdown-pages',
			'priority' => 5,
		) );

		// Select control
		$customizer_additions->add_setting( 'select_setting', array(
			'default'        => '1',
		) );

		$customizer_additions->add_control( 'select_setting', array(
			'label'   => 'Select Dropdown Setting',
			'section' => 'ns_cloner_section',
			'type'    => 'select',
			'choices' => array( '1', '2', '3' ),
			'priority' => 4,
		) );

		// Color control
		$customizer_additions->add_setting( 'color_setting', array(
			'default'        => '#000000',
		) );

		// WP_Customize_Background_Image_Control
		$customizer_additions->add_setting( 'background_image_setting', array(
			'default'        => '',
		) );

		$customizer_additions->add_control( new WP_Customize_Image_Control( $customizer_additions, 'background_image_setting', array(
			'label'   => 'Background Image Setting',
			'section' => 'ns_cloner_section',
			'settings'   => 'background_image_setting',
			'priority' => 9,
		) ) );
	}


	/**
	 * Adds a new section to use custom controls in the WordPress customiser
	 *
	 * @param  Obj $customizer_additions Customizer Manager.
	 *
	 * @return Void
	 */
	private function ns_custom_sections( $customizer_additions ) {
		$customizer_additions->add_section( 'ns_cloner_custom_section', array(
			'title'          => 'NS Custom Controls',
			'priority'       => 36,
			'panel'          => 'ns_cloner_panel',
		) );

		require_once dirname( __FILE__ ) . '/select/sites-dropdown-custom-control.php';
		$customizer_additions->add_setting( 'sites_dropdown_setting', array(
				'default'        => '',
		) );
		$customizer_additions->add_control( new Sites_Dropdown_Custom_Control( $customizer_additions, 'sites_dropdown_setting', array(
				'label'   => 'Site to Clone',
				'description'   => 'Select a site from the dropdown Setting',
				'section' => 'ns_cloner_custom_section',
				'settings'   => 'sites_dropdown_setting',
				'priority' => 2,
		) ) );

		$customizer_additions->add_setting( 'new_clone_title', array(
				'default'        => 'Title of new site',
		) );

		$customizer_additions->add_control( 'new_clone_title', array(
			'label'   => 'Title of new site',
			'section' => 'ns_cloner_custom_section',
			'type'    => 'text',
			'priority' => 4,
		) );

		$customizer_additions->add_setting( 'new_clone_description', array(
			'default'        => 'Description of new site',
		) );

		$customizer_additions->add_control( 'new_clone_description', array(
			'label'   => 'Description of new site',
			'description'   => 'Description of new site',
			'section' => 'ns_cloner_custom_section',
			'type'    => 'text',
			'priority' => 6,
		) );

	}
}
