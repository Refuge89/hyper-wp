<?php

require_once HWP_PATH_MODULES . 'tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'hyper_wp_register_required_plugins' );

function hyper_wp_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array();

	/*
	array(
		'name'               => 'TGM Example Plugin', // The plugin name.
		'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
		'source'             => dirname( __FILE__ ) . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
		'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	),*/

    $plgCore= array(
		array(
			'name'      => 'JetPack',
			'slug'      => 'jetpack',
			'required'  => true,
		),
		array(
			'name'      => 'WP Super Cache',
			'slug'      => 'wp-super-cache',
			'required'  => false,
		),
		array(
			'name'      => 'Advanced Access Manager',
			'slug'      => 'advanced-access-manager',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Maintenance',
			'slug'      => 'maintenance',
			'required'  => false,
		),
		array(
			'name'      => 'Wordfence Security',
			'slug'      => 'wordfence',
			'required'  => false,
		),
		array(
			'name'      => 'WP Mail SMTP',
			'slug'      => 'wp-mail-smtp',
			'required'  => false,
		),
		array(
			'name'      => 'User Role Editor',
			'slug'      => 'user-role-editor',
			'required'  => false,
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),
	);

	$plgCommunity = array(
		array(
			'name'      => 'WP ULike',
			'slug'      => 'wp-ulike',
			'source'    => 'https://github.com/hyperweb2/wp-ulike/archive/master.zip',
			'required'  => 'false',
			'external_url' => 'https://github.com/hyperweb2/wp-ulike/'
		),
		array(
			'name'		=> 'BuddyPress',
			'slug'		=> 'buddypress',
			'required'	=> 'false',
		),
		array(
			'name'		=> 'BBPress',
			'slug'		=> 'bbpress',
			'required'	=> 'false',
		),
		array(
			'name'		=> 'WP-Polls',
			'slug'      => 'wp-polls',
			'required'  => false,
		),
	);

	$plgFullFeaturedWebSite = array(
		array(
			'name'      => 'qTranslate X',
			'slug'      => 'qtranslate-x',
			'required'  => false,
		),
		array(
			'name'		=> 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form DB',
			'slug'      => 'contact-form-7-to-database-extension',
			'required'  => false,
		),
	);

	$plugins=array_merge($plugins,$plgCore);

	switch (HWP_INSTALL_MODE) {
		case "community":
			$plugins=array_merge($plugins,$plgCommunity);
		break;
		case "full":
			$plugins=array_merge($plugins,
				$plgCommunity,
				$plgFullFeaturedWebSite
			);
		break;
	}



	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'hyper-wp',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'hyper-wp' ),
			'menu_title'                      => __( 'Install Plugins', 'hyper-wp' ),
			'installing'                      => __( 'Installing Plugin: %s', 'hyper-wp' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'hyper-wp' ),
			'notice_can_install_required'     => _n_noop(
				'This plugin requires the following plugin: %1$s.',
				'This plugin requires the following plugins: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This plugin recommends the following plugin: %1$s.',
				'This plugin recommends the following plugins: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this plugin: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this plugin: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'hyper-wp'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'hyper-wp'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'hyper-wp'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'hyper-wp'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'hyper-wp' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'hyper-wp' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'hyper-wp' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'hyper-wp' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this plugin. Please update the plugin.', 'hyper-wp' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'hyper-wp' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'hyper-wp' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}
