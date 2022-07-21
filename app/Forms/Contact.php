<?php

namespace PseudoVendor\PseudoTheme\Forms;

use Closure;
use Leonidas\Framework\Site\Form\ValidatesWithRespectTrait;
use PseudoVendor\PseudoTheme\Forms\Abstracts\Form;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Validator as v;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use WebTheory\Saveyour\Contracts\Processor\FormDataProcessorInterface;
use WebTheory\Saveyour\Formatting\CallbackDataFormatter;
use WebTheory\Saveyour\Processor\FormSubmissionSymfonyMailer;

class Contact extends Form
{
    use ValidatesWithRespectTrait;

    public function onPriv(): bool
    {
        return true;
    }

    public function onNopriv(): bool
    {
        return true;
    }

    protected function handle(): string
    {
        return 'contact';
    }

    protected function fields(ServerRequestInterface $request): array
    {
        return ['name', 'phone', 'email', 'message'];
    }

    protected function attributes(ServerRequestInterface $request): array
    {
        return [
            'name' => [
                'required' => true,
            ],
            'phone' => [
                'required' => true,
            ],
            'email' => [
                'required' => true,
            ],
            'message' => [
                'required' => true,
            ],
        ];
    }

    protected function validatables(ServerRequestInterface $request): array
    {
        return [
            'name' => [
                $required = v::notEmpty()->setName('required'),
            ],
            'phone' => [
                v::phone()->setName('phone'),
            ],
            'email' => [
                v::email()->setName('email'),
            ],
            'message' => [
                $required,
            ],
        ];
    }

    protected function errorMessages(ServerRequestInterface $request): array
    {
        return [
            'name' => [
                'required' => 'Please enter your name.',
            ],
            'phone' => [
                'phone' => 'Please enter a valid phone number.',
            ],
            'email' => [
                'email' => 'Please enter a valid email address.',
            ],
            'message' => [
                'required' => 'Please enter a message.',
            ],
        ];
    }

    protected function formatting(ServerRequestInterface $request): array
    {
        return [
            'name' => new CallbackDataFormatter(
                'sanitize_text_field',
                'htmlspecialchars'
            ),
            'message' => new CallbackDataFormatter(
                'sanitize_textarea_field',
                'htmlspecialchars'
            ),
        ];
    }

    protected function processes(ServerRequestInterface $request): array
    {
        return [
            // 'mailer' => $this->mailerProcess(),
        ] + parent::processes($request);
    }

    protected function mailerProcess(): FormDataProcessorInterface
    {
        $to = 'email@domain.com';
        $subject = 'New Contact Request';

        return new FormSubmissionSymfonyMailer(
            'mailer',
            $this->getService('mailer'),
            (new Email())->subject($subject)->to($to),
            Closure::fromCallable([$this, 'composeEmail']),
            $this->fieldKeysAsNames(['name', 'phone', 'email', 'message'])
        );
    }

    protected function composeEmail(array $data, Email $email, ServerRequestInterface $request): string
    {
        $view = 'email/contact.twig';

        $data = $this->mappedResults($data);

        $email->from(new Address($data['email'], $data['name']));

        /** @var Environment */
        $twig = $this->getService('twig');

        return $twig->render($view, $data);
    }
}
