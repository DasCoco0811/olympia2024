<?php

namespace App\Controller\Admin;

use App\Entity\TimesSwimming;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TimesSwimmingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimesSwimming::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('athlete')->autocomplete()->setRequired(true),
            NumberField::new('time')->setRequired(true)->setLabel('Time in s'),
            BooleanField::new('disqualified')
        ];
    }

}
