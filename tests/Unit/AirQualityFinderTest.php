<?php

declare(strict_types=1);
namespace App\Tests\Unit;

use App\Service\AirQualityFinder;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AirQualityFinderTest extends KernelTestCase
{
    /** @test */
    public function shouldFindCityOrNull()
    {
        $city = "Madrid";
        $response = new AirQualityFinder($city);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string(json_encode($response)));
    }
}