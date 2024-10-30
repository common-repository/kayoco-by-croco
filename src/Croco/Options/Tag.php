<?php
namespace Croco\Options;

use Croco\Kayoco;

/**
 * タグクラス
 * 
 * Usage example:
 *
 * ```php
 * use Croco\Admin\Tag;
 * 
 * Tag::init();
 * ```
 */
class Tag
{
    /**
     * オプションキー
     * @type int
     */
    const KEY = 'croco_kayoco_tag';

    /**
     * 優先順位
     * @type int
     */
    const PRIORITY = 1;

    /**
     * キューハンドル
     * @type string
     */
    const QUEUE_HANDLE = 'croco-kayoco-embed';

    /**
     * コールバック用クラス名
     * @type string
     */
    private static $_className;

    /**
     * 初期設定
     *
     * @return void
     */
    public static function init()
    {
        self::$_className = get_called_class();

        $args = array(
            'type'              => 'string',
            'sanitize_callback' => 'trim',
            'default'           => '',
            'show_in_rest'      => true,
        );
        // WordPress 4.7+ registered settings
        if ( ! function_exists( 'get_registered_settings' ) ) {
            $args = $args['sanitize_callback'];
        }

        register_setting( Kayoco::SUFFIX, self::KEY, $args );

        add_action( 'wp_enqueue_scripts', array( self::$_className, 'addScript' ), 1, 0 );
        add_shortcode( 'kayoco', array( self::$_className, 'shortCode' ) );
    }

    /**
     * かよこタグIDの取得
     *
     * @return string
     */
    public static function getId()
    {
        $script = get_option( self::KEY, '' );
        if ( empty( $script ) ) {
            return '';
        }

        $script = str_replace( ' ', '', $script );
        if ( empty( $script ) ) {
            return '';
        }

        $include = strstr( $script, 'tagId' );
        if ( empty( $include ) ) {
            return '';
        }

        return substr( $include, 8, 40 );
    }

    /**
     * スクリプトタグの取得
     *
     * @return string
     */
    public static function getTag()
    {
        return get_option( self::KEY, '' );
    }

    /**
     * スクリプトの追加
     *
     * @access public
     * @return void
     */
    public static function addScript()
    {
        $tagId = self::getId();
        if ( empty( $tagId ) ) {
            return ;
        }

        wp_enqueue_script(
            self::QUEUE_HANDLE,
            Kayoco::EMBED_SCRIPT_URL,
            array( ),
            null,
            true
        );

        wp_add_inline_script( 
            self::QUEUE_HANDLE,
                "(function () {\n".
                "    window['CrocoRecommendObject']='ct';\n".
                "    window['ct'] = window['ct'] || function() {\n".
                "        (window['ct'].q = window['ct'].q || []).push(arguments);\n".
                "    };\n".
                "    var script = document.getElementById('croco-kayoco-embed-js-before');\n".
                "    var target = document.getElementById('croco-recommend');\n".
                "    if (null === target) {\n".
                "        target = document.createElement('div');\n".
                "        target.id = 'croco-recommend';\n".
                "        var footer = document.querySelector('footer');\n".
                "        footer.parentNode.insertBefore(target, footer);\n".
                "    }\n".
                "    window['ct']('iswpp', 1);\n".
                "    window['ct']('script', script);\n".
                "    window['ct']('host','kayo-co.biz-samurai.com');\n".
                "    window['ct']('tagId','" . $tagId . "');\n".
                "}());\n",
            'before'
        );
    }

    /**
     * かよこショートコード
     *
     * @return string
     */
    public static function shortCode()
    {
        return '<div id="croco-recommend"></div>';
    }
} // class Tag