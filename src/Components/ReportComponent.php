<?php

namespace App\Components;

use App\Form\Type\DemoReportingType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(name: 'report-component', template: 'components/report.html.twig')]
final class ReportComponent
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;



    public function __construct(private readonly FormFactoryInterface $formFactory)
    {
    }

    public function instantiateForm(): FormInterface
    {
        return $this->formFactory->create(DemoReportingType::class);
    }

    #[LiveAction]
    public function save(): void
    {
        $this->submitForm();
    }
}
