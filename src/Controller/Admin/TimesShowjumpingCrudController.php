<?php

namespace App\Controller\Admin;

use App\Entity\TimesShowjumping;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TimesShowjumpingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimesShowjumping::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('athlete')->autocomplete(),
            NumberField::new('time'),
            NumberField::new('penalty'),
            BooleanField::new('disqualified')
        ];
    }

}
