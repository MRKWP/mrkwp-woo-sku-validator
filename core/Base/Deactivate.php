<?php
/**
 * Simple Deactivation Class.
 *
 * @package Woo_Sku_Validator
 */

namespace Woo_Sku_Validator\Base;

/**
 * Deactivate Class
 */
class Deactivate {
	/**
	 * Static function for Deactivate.
	 *
	 * @return void
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
