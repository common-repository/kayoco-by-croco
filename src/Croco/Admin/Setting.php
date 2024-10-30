<?php
namespace Croco\Admin;

use Croco\Kayoco;

/**
 * 設定ラス
 * 
 * Usage example:
 *
 * ```php
 * use Croco\Admin\Setting;
 * 
 * Setting::init();
 * ```
 */
class Setting
{
    /**
     * 優先順位
     * @type int
     */
    const PRIORITY = 6;

    /**
     * コールバック用クラス名
     * @type string
     */
    private static $_className;

    /**
     * Singleton用インスタンス
     * @type string
     */
    private static $_hookSuffix;

    /**
     * 初期設定
     *
     * @return void
     */
    public static function init()
    {
        self::$_className = get_called_class();
        add_action( 'admin_menu', array( self::$_className, 'adminMenu' ), self::PRIORITY );
    }

    /**
     * メニューの生成
     *
     * @access public
     * @return void
     */
    public static function adminMenu()
    {
        self::$_hookSuffix = add_menu_page(
            __( 'Kayo-co settings', Kayoco::TEXT_DOMAIN ),
            'Kayo-co',
            'manage_options',
            Kayoco::path() . '/pages/admin.php',
            '',
            Kayoco::ICON_URL,
            self::PRIORITY
        );
    }

   /**
     * メニューの生成
     *
     * @access public
     * @return void
     */
    public static function printOptionFields()
    {
        settings_fields( Kayoco::SUFFIX );
    }
} // class Setting