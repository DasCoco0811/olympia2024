<?php

namespace App\Controller\Admin;

use App\Entity\Countries;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Countries::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setRequired(true),
            TextField::new('iso_2')->setRequired(true),
            TextField::new('iso_3')->setRequired(true),
        ];
    }
}