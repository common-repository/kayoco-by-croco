<?php
namespace Croco;

/**
 * Kayoco規定クラス
 * 
 * Usage example:
 *
 * ```php
 * use Croco\Kayoco;
 * 
 * Kayoco::init();
 * ```
 */
class Kayoco
{
    /**
     * バージョン
     * @type string
     */
    const VERSION = '0.0.1';

    /**
     * 末尾語
     * @type string
     */
    const SUFFIX = 'CROCO_KAYOCO_WP_PLUGIN';

    /**
     * 末尾語
     * @type string
     */
    const TEXT_DOMAIN = 'corco_kayoco';

    /**
     * 組み込みスクリプトURL
     * @type string
     */
    const EMBED_SCRIPT_URL = 'https://kayo-co.biz-samurai.com/embed/index.js';

    /**
     * アイコンURL
     * @type string
     */
    const ICON_URL = 'https://kayo-co.biz-samurai.com/assets/img/icon.svg';

    /**
     * パス
     * @type string
     */
    private static $_path;

    /**
     * 初期設定
     *
     * @return void
     */
    public static function init()
    {
        $path = plugin_dir_path( __FILE__ );
        $path = substr($path, 0, strlen( $path ) - strlen( 'src/Croco/' ) );
        self::$_path = $path;

        load_plugin_textdomain( self::TEXT_DOMAIN );
        \Croco\Options\Tag::init();
        if ( is_admin() ) {
            \Croco\Admin\Setting::init();
        }
    }

    /**
     * パスの取得
     *
     * @return string
     */
    public static function path()
    {
        return self::$_path;
    }
} // class Kayoco