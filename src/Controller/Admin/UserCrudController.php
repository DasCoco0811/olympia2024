<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
//        echo '<pre>';
//        print_r(
//            ChoiceField::new('roles')->allowMultipleChoices(false)->setChoices([
//                'Referee' => '["ROLE_USER"]',
//                'ADMIN' => '["ROLE_ADMIN"]',
//            ])->setRequired(true)
//        );
//        echo '</pre>';
//        die();

        return [
            TextField::new('email')->setLabel("Email / Username")->setRequired(true),
            //Field::new('roles')->setProperty('ROLE_USER'),
            ChoiceField::new('roles')->allowMultipleChoices(true)->setChoices([
                'Referee' => 'ROLE_USER',
            ])->setRequired(true),
            TextField::new('password')->setRequired(true),
        ];
    }
}
