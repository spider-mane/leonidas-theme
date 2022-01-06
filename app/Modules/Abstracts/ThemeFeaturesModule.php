<?php

namespace PseudoVendor\PseudoTheme\Modules\Abstracts;

use Leonidas\Contracts\Extension\ModuleInterface;
use Leonidas\Framework\Modules\AbstractModule;
use Leonidas\Traits\Hooks\TargetsAfterSetupThemeHook;

abstract class ThemeFeaturesModule extends AbstractModule implements ModuleInterface
{
    use TargetsAfterSetupThemeHook;

    public const CORE_BOOL = [
        'automatic-feed-links',
        'custom-background',
        'custom-header',
        'custom-logo',
        'post-thumbnails',
        'title-tag',
    ];

    public const CORE_BASE = [
        'custom-background',
        'custom-header',
        'custom-logo',
        'html5',
        'post-formats',
    ];

    public const CORE_LIST = [];

    public const EXTRA_BOOL = [];

    public const EXTRA_BASE = [];

    public const EXTRA_LIST = [];

    public function hook(): void
    {
        $this->targetAfterSetupThemeHook();
    }

    protected function doAfterSetupThemeAction(): void
    {
        $this->addThemeFeatures();
    }

    protected function addThemeFeatures(): void
    {
        foreach ($this->features() as $feature => $args) {
            if ($this->isSupportedBoolFeature($feature, $args)) {
                add_theme_support($feature);
            } elseif ($this->isSupportedBaseFeature($feature, $args)) {
                add_theme_support($feature, $args);
            } elseif ($this->isSupportedListFeature($feature, $args)) {
                add_theme_support($feature, ...(array) $args);
            }
        }
    }

    protected function isSupportedBoolFeature(string $feature, $args)
    {
        $bool = array_merge(static::CORE_BOOL, static::EXTRA_BOOL);

        return in_array($feature, $bool) && true === $args;
    }

    protected function isSupportedBaseFeature(string $feature, $args)
    {
        $base = array_merge(static::CORE_BASE, static::EXTRA_BASE);

        return in_array($feature, $base) && !empty($args) && !is_bool($args);
    }

    protected function isSupportedListFeature(string $feature, $args)
    {
        $list = array_merge(static::CORE_LIST, static::EXTRA_LIST);

        return in_array($feature, $list) && !is_bool($args);
    }

    abstract protected function features(): array;
}
