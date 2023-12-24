<?php

namespace PseudoVendor\PseudoTheme\Models\SocialAccount;

use Leonidas\Contracts\System\Schema\Option\OptionManagerInterface;
use PseudoVendor\PseudoTheme\Contracts\Model\SocialMediaAccountInterface;
use WebTheory\Context\Selector;

class SocialMediaAccountRepository
{
    protected const OPTION_KEY = '';

    protected Selector $selector;

    public function __construct(OptionManagerInterface $manager, array $contexts)
    {
        $this->selector = new Selector(
            $manager->get(static::OPTION_KEY),
            $contexts
        );
    }

    public function get(string $account): SocialMediaAccountInterface
    {
        return $this->selector->getItem($account);
    }

    /**
     * @return array<string, SocialMediaAccountInterface>
     */
    public function for(string $context): array
    {
        return $this->selector->getContextItems($context);
    }

    /**
     * @return array<string, SocialMediaAccountInterface>
     */
    public function all(): array
    {
        return $this->selector->getItems();
    }
}
