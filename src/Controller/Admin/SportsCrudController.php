<?php
namespace App\Controller\Admin;

use App\Entity\Sports;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class SportsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sports::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('sports')->autocomplete()->setRequired(true),
            TextField::new('description')->setRequired(true),
        ];
    }
}