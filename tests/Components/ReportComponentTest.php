<?php

namespace App\Tests\Components;

use App\Components\ReportComponent;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

final class ReportComponentTest extends KernelTestCase
{
    use InteractsWithLiveComponents;

    public function testComponentCanBeSubmitted(): void
    {
        $component = $this->createLiveComponent(
            name: ReportComponent::class,
        );

        $component->set('demo_reporting.report', 'This is a test report');
        $component->call('save');

        self::assertStringContainsString(
            'Report submitted!',
            $component->render()->toString(),
        );
    }
}
