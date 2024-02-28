<?php

namespace App\Controller\Admin;

use App\Entity\TimesLongjump;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TimesLongjumpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimesLongjump::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('athlete')->autocomplete()->setRequired(true),
            NumberField::new('distance')->setRequired(true),
            NumberField::new('penalty'),
            BooleanField::new('disqualified')
        ];
    }
}
