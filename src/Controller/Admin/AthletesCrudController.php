<?php

namespace App\Controller\Admin;

use App\Entity\Athletes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AthletesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Athletes::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('first_name')->setRequired(true),
            TextField::new('last_name')->setRequired(true),
            TextField::new('description')->setRequired(true),
            AssociationField::new('countries')->setLabel("Country")->autocomplete()->setRequired(true),
            DateField::new('birthdate')->setRequired(true),
            ChoiceField::new('sex')->allowMultipleChoices(false)->setChoices([
                'Male' => 'm',
                'Female' => 'f',
            ])->setRequired(true),
        ];
    }
}