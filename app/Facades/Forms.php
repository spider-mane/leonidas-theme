<?php

namespace PseudoVendor\PseudoTheme\Facades;

use Leonidas\Contracts\Http\Form\FormInterface;
use Leonidas\Contracts\Http\Form\FormRepositoryInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @method static void add(FormInterface $form)
 * @method static FormInterface fetch(string $handle)
 * @method static FormInterface mapped(string $action)
 */
class Forms extends _Facade
{
    public static function build(string $form): array
    {
        return static::fetch($form)->build(static::getServerRequest());
    }

    protected static function getServerRequest(): ServerRequestInterface
    {
        return static::$container->get(ServerRequestInterface::class);
    }

    protected static function _getFacadeAccessor()
    {
        return FormRepositoryInterface::class;
    }
}
