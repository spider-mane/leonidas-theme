<?php

namespace PseudoVendor\PseudoTheme\Modules;

use Closure;
use Leonidas\Contracts\Extension\ModuleInterface;
use Leonidas\Framework\Modules\AbstractModule;

class RefreshPages extends AbstractModule implements ModuleInterface
{
    public function hook(): void
    {
        add_action(
            'init',
            Closure::fromCallable([$this, 'doInitAction'])
        );

        add_action(
            'after_setup_theme',
            Closure::fromCallable([$this, 'doAfterSetupThemeAction'])
        );
    }

    protected function doInitAction(): void
    {
        $this->disableEmojis();
        $this->disableEmbedsCodeInit();
    }

    protected function doAfterSetupThemeAction()
    {
        $this->cleanSiteHeader();
    }

    /**
     * Disable the emoji's
     */
    protected function disableEmojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

        add_filter('tiny_mce_plugins', Closure::fromCallable([$this, 'disableEmojisTinymce']));
        add_filter('wp_resource_hints', Closure::fromCallable([$this, 'disableEmojisRemoveDnsPrefetch']), 10, 2);
    }

    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param array $plugins
     * @return array Difference betwen the two arrays
     */
    protected function disableEmojisTinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array Difference betwen the two arrays.
     */
    protected function disableEmojisRemoveDnsPrefetch($urls, $relation_type)
    {
        if ('dns-prefetch' == $relation_type) {
            /** This filter is documented in wp-includes/formatting.php */
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

            $urls = array_diff($urls, array($emoji_svg_url));
        }

        return $urls;
    }

    /**
     * Disable WP embeds
     */
    protected function disableEmbedsCodeInit()
    {

        // Remove the REST API endpoint.
        remove_action('rest_api_init', 'wp_oembed_register_route');

        // Turn off oEmbed auto discovery.
        add_filter('embed_oembed_discover', '__return_false');

        // Don't filter oEmbed results.
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

        // Remove oEmbed discovery links.
        remove_action('wp_head', 'wp_oembed_add_discovery_links');

        // Remove oEmbed-specific JavaScript from the front-end and back-end.
        remove_action('wp_head', 'wp_oembed_add_host_js');
        add_filter('tiny_mce_plugins', Closure::fromCallable([$this, 'disableEmbedsTinyMcePlugin']));

        // Remove all embeds rewrite rules.
        add_filter('rewrite_rules_array', Closure::fromCallable([$this, 'disableEmbedsRewrites']));

        // Remove filter of the oEmbed result before any HTTP requests are made.
        remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
    }

    /**
     *
     */
    protected function disableEmbedsTinyMcePlugin($plugins)
    {
        return array_diff($plugins, array('wpembed'));
    }

    /**
     *
     */
    protected function disableEmbedsRewrites($rules)
    {
        foreach ($rules as $rule => $rewrite) {
            if (false !== strpos($rewrite, 'embed=true')) {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }

    /**
     * good head is indescribable
     */
    protected function cleanSiteHeader()
    {
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
        add_filter('the_generator', '__return_false');
        add_filter('show_admin_bar', '__return_false');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
}