<?php
namespace App\Service;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class VariableChecker extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('isSet', [$this, 'isSet']),
        ];
    }

    public function isSet($field)
    {
        if($field) {
            return $field;
        }
        return;
    }
}