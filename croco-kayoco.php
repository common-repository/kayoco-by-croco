<?php
/**
 * Plugin main file.
 *
 * @package   Croco\Kayoco
 * @copyright 2022 Croco Inc
 * @license   https://opensource.org/licenses/MIT
 * @link      https://kayo-co.biz-samurai.com/
 *
 * @wordpress-plugin
 * Plugin Name: Kayoco by CROCO
 * Plugin URI:  https://kayo-co.biz-samurai.com
 * Description: kayoco plugin
 * Version:     1.0.0
 * Author:      CROCO
 * Author URI:  https://kayo-co.biz-samurai.com
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: corco_kayoco
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Autoloaderの設定
 */
spl_autoload_register( function( $className ) {
    $prefix = 'Croco\\';
    $length = strlen( $prefix );
    if ( 0 !== strncmp( $prefix, $className, $length ) ) {
        return false;
    }
    $file = str_replace( '\\', \DIRECTORY_SEPARATOR, $className );
    $filename = plugin_dir_path( __FILE__ ) . 'src' . \DIRECTORY_SEPARATOR . $file . '.php';
    if ( !file_exists( $filename ) ) {
        return false;
    } // if ( !file_exists( $filename ) )
    require_once $filename;

    return true;
} );

/**
 * プラグイン初期設定
 */
add_action(
    'plugins_loaded',
    array( '\Croco\Kayoco', 'init' ),
    0,
    0
);
