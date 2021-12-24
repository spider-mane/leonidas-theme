<?php

namespace PseudoVendor\PseudoTheme\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Leonidas\Framework\App\Forms\FormRepository;

class FormRepositoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [FormRepository::class];

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(FormRepository::class, function () {
            return new FormRepository();
        });
    }
}
