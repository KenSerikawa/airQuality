<?php
namespace App\AirQuality\Application;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class VariableChecker extends AbstractExtension
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