<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

/**
 * Scripts and styles
 */
class WPL_WPC_Scripts_Style{

	/**
	 * Script version number
	 */
	protected $version;

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->version = '20170313';

		add_action( 'wp_enqueue_scripts', array( $this, 'wpl_wpc_scripts_style' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'wpl_wpc_admin_scripts' ) );
	}

	/**
	 * Front Scripts
	 */
	public function wpl_wpc_scripts_style() {
		// CSS Files
		wp_enqueue_style( 'slick', WPL_WPC_URL . 'assets/css/slick.css', false, $this->version );
		wp_enqueue_style( 'font-awesome', WPL_WPC_URL . 'assets/css/font-awesome.min.css', false, $this->version );
		wp_enqueue_style( 'wpl-wpc-style', WPL_WPC_URL . 'assets/css/style.css', false, $this->version );

		//JS Files
		wp_enqueue_script( 'slick-min-js', WPL_WPC_URL . 'assets/js/slick.min.js', array( 'jquery' ), $this->version, true );
	}

	/**
	 * Admin Scripts
	 */
	public function wpl_wpc_admin_scripts() {
		wp_enqueue_style( 'wpl-wpc-admin-style', WPL_WPC_URL . 'assets/css/admin.css', false, $this->version );
	}


}
new WPL_WPC_Scripts_Style();