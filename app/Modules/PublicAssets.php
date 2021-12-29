<?php

namespace PseudoVendor\PseudoTheme\Modules;

use Leonidas\Contracts\Ui\Asset\ScriptCollectionInterface;
use Leonidas\Contracts\Ui\Asset\StyleCollectionInterface;
use Leonidas\Framework\Modules\AbstractPublicAssetProviderModule;
use Leonidas\Library\Core\Asset\ScriptBuilder;
use Leonidas\Library\Core\Asset\ScriptCollection;
use Leonidas\Library\Core\Asset\StyleBuilder;
use Leonidas\Library\Core\Asset\StyleCollection;

final class PublicAssets extends AbstractPublicAssetProviderModule
{
    protected function styles(): StyleCollectionInterface
    {
        return StyleCollection::from([

            StyleBuilder::for('pseudo-theme')
                ->src($this->asset('/css/styles.css'))
                ->version($this->version('1.0.0'))
                ->enqueue(true)
                ->done(),

        ]);
    }

    protected function scripts(): ScriptCollectionInterface
    {
        return ScriptCollection::from([

            ScriptBuilder::for('pseudo-theme')
                ->src($this->asset('/js/script.js'))
                ->version($this->version('1.0.0'))
                ->dependencies('pseudo-theme-manifest', 'pseudo-theme-vendors')
                ->inFooter(true)
                ->enqueue(true)
                ->done(),

            ScriptBuilder::for('pseudo-theme-manifest')
                ->src($this->asset('/js/manifest.js'))
                ->version($this->version())
                ->inFooter(true)
                ->done(),

            ScriptBuilder::for('pseudo-theme-vendors')
                ->src($this->asset('/js/vendor.js'))
                ->version($this->version())
                ->dependencies('pseudo-theme-manifest')
                ->inFooter(true)
                ->done(),

            // 3rd Party
            ScriptBuilder::for('google-tag-manager')
                ->src($this->asset('/lib/google-tag-manager.js'))
                ->inFooter(false)
                ->enqueue(true)
                ->done(),

        ]);
    }
}
