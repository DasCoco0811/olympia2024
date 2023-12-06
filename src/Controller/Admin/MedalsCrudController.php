<?php
namespace App\Controller\Admin;

use App\Entity\Medals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MedalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medals::class;
    }
}