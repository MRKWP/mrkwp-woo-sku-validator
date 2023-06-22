<?php
/**
 * Admin UI for SKU Checker.
 *
 * Page will run over the database and check all skus. Lists only invalid SKU values.
 *
 * @package  Woo_Sku_Validator
 */

namespace Woo_Sku_Validator\Pages;

/**
 * Admin Page for SKU Checker.
 */
class SkuChecker {

	/**
	 * Register Page for Admin Menu.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'admin_menu', array( $this, 'setup_menu' ) );
	}

	/**
	 * Admin Page Arguments and registration of function for callback.
	 *
	 * @return void
	 */
	public function setup_menu() {

		add_menu_page(
			'SKU Validator',
			'SKU Validator',
			'manage_options',
			'woo-sku-validator',
			array( $this, 'start_sku_callback' ),
		);
	}

	/**
	 * Call back to show the sku data table and any SKU values that are invalid.
	 *
	 * @return void
	 */
	public function start_sku_callback() {

		global $wpdb;

		$skus = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT *
				FROM `wp_postmeta`
				WHERE `meta_key` = %s AND meta_value REGEXP("[^a-zA-Z0-9-_/.]")',
				'_sku'
			)
		);

		do_action( 'qm/debug', $skus );

		?>
			<div class="wrap">
				<h1>SKU Validator.</h1>
				<p>Showing all SKUs that are invalid with a link to the specific product.</p>
			</div>
		<?php

		print( '<table class="wp-list-table widefat fixed striped table-view-list posts">
		<thead>
			<th>Id</th>
			<th>SKU</th>
			<th>Product Name</th>
		</thead>
		<tbody>' );

		foreach ( $skus as $sku ) {
			printf(
				'<tr>
				<td width="fit-content">%s</td>
				<td width="fit-content">%s</td>
				<td width="fit-content"><a href="%s" target="_blank">%s</a></td>
				</tr>',
				$sku->post_id,
				$sku->meta_value,
				esc_url( get_permalink( $sku->post_id ) ),
				esc_html( get_the_title( $sku->post_id ) ),
			);
		}
		echo '</tbody></table>';
	}
}