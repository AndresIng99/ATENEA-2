<?php

namespace Templately\Core;

class Maintenance {
	/**
	 * Init Maintenance
	 *
	 * @since 2.0.1
	 * @return void
	 */
	public static function init(){
		register_activation_hook( TEMPLATELY_PLUGIN_BASENAME, [ __CLASS__, 'activation' ] );
		register_uninstall_hook( TEMPLATELY_PLUGIN_BASENAME, [ __CLASS__, 'uninstall' ] );
        add_action('plugins_loaded', array(__CLASS__, 'plugin_redirect'), 90);
	}

	/**
	 * Runs on activation
	 *
	 * @since 2.0.1
	 * @return void
	 */
	public static function activation(){
		update_option('templately_do_activation_redirect', true);
	}

	/**
	 * Runs on uninstallation.
	 *
	 * @since 2.0.1
	 * @return void
	 */
	public static function uninstall(){

	}

	/**
	 * Redirect on installation.
	 *
	 * @since 2.2.7
	 * @return void
	 */
    public static function plugin_redirect(){
        if (get_option('templately_do_activation_redirect', false)) {
            delete_option('templately_do_activation_redirect');
            wp_safe_redirect(admin_url('admin.php?page=templately&path=elementor/packs'));
        }
    }
}
