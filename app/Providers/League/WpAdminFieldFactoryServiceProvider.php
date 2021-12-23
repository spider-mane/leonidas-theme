<?php

namespace PseudoVendor\PseudoPlugin\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use WebTheory\Leonidas\Fields\Field;

class WpAdminFieldFactoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [Field::class];

    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->share(Field::class, function () use ($container) {
            $config = $container->get('config');

            return new Field([

                'form_field_factory' => [
                    'fields' => $config->get('wp.options.form_field.fields'),
                    'namespaces' => $config->get('wp.options.form_field.namespaces'),
                ],

                'data_manager_factory' => [
                    'managers' => $config->get('wp.options.data_manager.managers'),
                    'namespaces' => $config->get('wp.options.data_manager.namespaces'),
                ],
            ]);
        });
    }
}
