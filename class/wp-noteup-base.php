<?php

class WP_NoteUp_Base {
	public $plugin_file;
	public $text_domain;
	public $version;
	public $plugin_headers;
	public $plugin_dir;

	function __construct() {

		// Plugin information.
		$this->set_plugin_file( dirname( __FILE__ ) . '/../wp-noteup.php' );
		$this->set_plugin_info();

		// Set the name and version based on headers.
		$this->text_domain = $this->get_plugin_info( 'Text Domain' );
		$this->version = $this->get_plugin_info( 'Version' );
	}

	/**
	 * Set the plugin header info.
	 *
	 * @return void
	 */
	function set_plugin_info() {
		$this->plugin_headers = get_file_data( $this->plugin_file, array(
			'Plugin Name' => 'Plugin Name',
			'Plugin URI' => 'Plugin URI',
			'Version' => 'Version',
			'Description' => 'Description',
			'Author' => 'Author',
			'Author URI' => 'Author URI',
			'Text Domain' => 'Text Domain',
			'Domain Path' => 'Domain Path',
		), 'plugin' );
	}

	/**
	 * Get a particular header value.
	 *
	 * @param  string $key The value of the plugin header.
	 *
	 * @return void
	 */
	function get_plugin_info( $key ) {
		return $this->plugin_headers[ $key ];
	}

	function set_plugin_file( $file ) {
		$this->plugin_file = $file;
		$this->plugin_dir = dirname( $file );
	}
}
