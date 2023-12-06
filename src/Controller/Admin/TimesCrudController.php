<?php
namespace App\Controller\Admin;

use App\Entity\Athletes;
use App\Entity\Times;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TimesCrudController extends AbstractCrudController
{
    public $entityManager;

    public static function getEntityFqcn(): string
    {
        return Times::class;
    }

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function configureFields(string $pageName): iterable
    {
        $athleteRepository = $this->entityManager->getRepository(Athletes::class);

        return [
            AssociationField::new('athletes')
                ->setQueryBuilder(
                    /*fn(QueryBuilder $queryBuilder) => $athleteRepository->createQueryBuilder('athletes')
                        ->where('athletes.sex = m')*/
                    fn(QueryBuilder $queryBuilder) => $queryBuilder->addCriteria(
                        Criteria::create()->where(Criteria::expr()->eq('sex', 'm'))
                    )
                )->autocomplete(),
            AssociationField::new('sports')->autocomplete(),
            NumberField::new('time'),
        ];
    }

}
