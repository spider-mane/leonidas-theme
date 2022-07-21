<?php

namespace PseudoVendor\PseudoTheme\View;

use Leonidas\Library\Core\View\Twig\Abstracts\AbstractConfigurationExtension;
use PseudoVendor\PseudoTheme\Facades\Phone;
use PseudoVendor\PseudoTheme\Facades\ThemeAsset;
use WebTheory\Html\Attributes\Classlist;
use WebTheory\Html\Html;

class TwigExtension extends AbstractConfigurationExtension
{
    protected function functions(): array
    {
        return [
            'image' => [ThemeAsset::class, 'image'],
            'video' => [ThemeAsset::class, 'video'],
            'audio' => [ThemeAsset::class, 'audio'],
            'logo' => [ThemeAsset::class, 'logo'],
            'icon' => [ThemeAsset::class, 'icon'],
            'class' => fn ($value) => new Classlist($value),
            'html_tag' => [Html::class, 'tag'],
            'html_attr' => [Html::class, 'attributes'],
        ];
    }

    protected function filters(): array
    {
        return [
            'url' => 'home_url',
            'phone_us' => [Phone::class, 'formatUs'],
            'phone_link' => [Phone::class, 'getHref'],
        ];
    }
}
