<?php

namespace PseudoVendor\PseudoPlugin\Modules;

use Leonidas\Contracts\Extension\ModuleInterface;
use Leonidas\Framework\Modules\AbstractPluginSetupModule;

final class Setup extends AbstractPluginSetupModule implements ModuleInterface
{
    protected function doActivatePluginAction(bool $networkWide): void
    {
        //
    }

    protected function doDeactivatePluginAction(bool $networkDeactivating): void
    {
        //
    }

    public static function doUninstallPluginAction(): void
    {
        //
    }
}
