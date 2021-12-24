<?php

namespace PseudoVendor\PseudoTheme\Modules;

use Leonidas\Contracts\Ui\Asset\ScriptCollectionInterface;
use Leonidas\Contracts\Ui\Asset\StyleCollectionInterface;
use Leonidas\Framework\Modules\AbstractAdminAssetProviderModule;
use Leonidas\Library\Core\Asset\ScriptBuilder;
use Leonidas\Library\Core\Asset\ScriptCollection;
use Leonidas\Library\Core\Asset\StyleBuilder;
use Leonidas\Library\Core\Asset\StyleCollection;

final class AdminAssets extends AbstractAdminAssetProviderModule
{
    protected function styles(): StyleCollectionInterface
    {
        return StyleCollection::with(

            StyleBuilder::for('pseudo-theme')
                ->src($this->asset('css/styles.css'))
                ->version($this->version('1.0.0'))
                ->enqueue(true)
                ->done()

        );
    }

    protected function scripts(): ScriptCollectionInterface
    {
        return ScriptCollection::with(

            ScriptBuilder::for('pseudo-theme')
                ->src($this->asset('js/script.js'))
                ->version($this->version('1.0.0'))
                ->inFooter(true)
                ->enqueue(true)
                ->done()

        );
    }
}
