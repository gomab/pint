<?php

namespace App\Twig;

use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
//use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
//    public function getFilters(): array
//    {
//        return [
//            // If your filter generates SAFE HTML, you should add a third
//            // parameter: ['is_safe' => ['html']]
//            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
//            new TwigFilter('filter_name', [$this, 'doSomething']),
//        ];
//    }

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;

    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pluralize', [$this, 'pluralize']),
        ];
    }

    public function pluralize(int $count, string $singular, ?string $plural= null): string
    {
        //dd($this->security->getUser());

        $plural = $plural ?? $singular . 's';
//        $plural ??= $singular . 's';
        $str = $count === 1 ? $singular : $plural;
        return "$count $str";
    }
}
