<?php

namespace PseudoVendor\PseudoTheme\Forms\Abstracts;

use Leonidas\Framework\Site\Form\AbstractForm;
use Leonidas\Framework\Site\Form\AuthenticatesWithReCaptchaTrait;
use Psr\Http\Message\ServerRequestInterface;

abstract class Form extends AbstractForm
{
    // use AuthenticatesWithReCaptchaTrait;

    protected function policies(ServerRequestInterface $request): array
    {
        return [
            // 'reCaptcha' => $this->reCaptchaPolicy(),
        ] + parent::policies($request);
    }

    protected function checks(ServerRequestInterface $request): array
    {
        return [
            // 'reCaptcha' => $this->reCaptchaFormCheck(),
        ] + parent::checks($request);
    }
}
