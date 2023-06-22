<?php
/**
 * Simple Activation Class.
 *
 * @package Woo_Sku_Validator
 */

namespace Woo_Sku_Validator\Base;

/**
 * Activate Class.
 */
class Activate {
	/**
	 * Hooked for Activate inside Plugin.
	 *
	 * @return void
	 */
	public static function activate() {
		flush_rewrite_rules();
	}
}
