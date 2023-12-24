<?php

namespace PseudoVendor\PseudoTheme\View\Models;

use Leonidas\Library\Core\Util\OutputBuffer;
use Leonidas\Library\System\Model\Site\Site;
use Leonidas\Plugin\Access\Users;
use PseudoVendor\PseudoTheme\View\Helper\Client;
use PseudoVendor\PseudoTheme\View\Helper\SocialMedia;
use PseudoVendor\PseudoTheme\View\Helper\ThemeData;
use WebTheory\Html\Attributes\Classlist;

class Defaults extends AbstractViewModel
{
    public function data(): array
    {
        return [
            // site
            'site' => new Site(),
            'base' => $this->getViewSlug(),
            'favicons' => [],
            'fonts' => [],

            // info
            'user' => Users::select(wp_get_current_user()->ID),
            'entity' => Client::data(),
            'developer' => [
                'name' => ThemeData::developer('agency'),
                'link' => ThemeData::developer('url'),
            ],

            // wordpress
            'wp_head' => OutputBuffer::call('wp_head'),
            'wp_body' => OutputBuffer::call('wp_body_open'),
            'wp_foot' => OutputBuffer::call('wp_footer'),

            // html
            'head' => [
                'title' => trim(wp_title(' - ', false, 'left')),
            ],
            'body' => [
                'class' => new Classlist(get_body_class()),
            ],
            'header' => [
                'class' => new Classlist(),
            ],
            'main' => [
                'class' => new Classlist(),
            ],
            'navbar' => [
                'class' => new Classlist(),
                'menu' => ThemeData::menu('site'),
                'social_media' => SocialMedia::for('navbar'),
            ],
            'footer' => [
                'class' => new Classlist(),
                'links' => ThemeData::menu('footer'),
                'social_media' => SocialMedia::for('footer'),
            ],
        ];
    }

    protected function getViewSlug()
    {
        $view = get_queried_object();

        if ($view) {
            $slug = $view->post_name ?? $view->rewrite['slug'];
        } else {
            $slug = '404';
        }

        return $slug;
    }
}
