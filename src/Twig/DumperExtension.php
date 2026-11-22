<?php

namespace studioespresso\craftdumper\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Adds `d()` as a short alias for Craft's own `dump()`; `dump()` and `dd()` ship with Craft 6
 *
 * @author Studio Espresso <support@studioespresso.co>
 * @copyright Studio Espresso
 * @license MIT
 */
class DumperExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('d', $this->d(...), [
                'is_safe' => ['html'],
                'needs_environment' => true,
                'needs_context' => true,
                'is_variadic' => true,
            ]),
        ];
    }

    public function d(Environment $env, array $context, mixed ...$vars): string
    {
        return $env->getFunction('dump')->getCallable()($context, ...$vars);
    }
}
