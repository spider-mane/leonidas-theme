<?php

namespace PseudoVendor\PseudoPlugin\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Swift_Mailer;
use Swift_SmtpTransport;

class SwiftMailerServiceProvider extends AbstractServiceProvider
{
    protected $provides = [Swift_Mailer::class];

    public function register()
    {
        $container = $this->getLeagueContainer();

        $container->add(Swift_Mailer::class, function () use ($container) {
            $config = $container->get('config')->get('mail');

            $transport = (new Swift_SmtpTransport($config['host'], $config['port']))
                ->setUsername($config['username'])
                ->setPassword($config['password']);

            return new Swift_Mailer($transport);
        })->addTag('mailer');
    }
}
