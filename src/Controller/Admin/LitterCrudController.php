<?php

namespace App\Controller\Admin;

use App\Entity\Litter;
use App\Repository\CatRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class LitterCrudController extends AbstractCrudController
{

    private CatRepository $catRepository;

    public function __construct(CatRepository $catRepository)
    {
        $this->catRepository = $catRepository;
    }

    public static function getEntityFqcn(): string
    {
        return Litter::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('breed'),
            TextField::new('name'),
            DateField::new('date'),
            AssociationField::new('catMother')
                ->setFormTypeOptions([
                    'query_builder' => function (CatRepository $catRepository) {
                        return $catRepository->createQueryBuilder('c')
                            ->where('c.gender = :gender')
                            ->setParameter('gender', 2)
                            ->orderBy('c.name', 'ASC');
                    },
                ]),
            AssociationField::new('catFather')
                ->setFormTypeOptions([
                    'query_builder' => function (CatRepository $catRepository) {
                        return $catRepository->createQueryBuilder('c')
                            ->where('c.gender = :gender')
                            ->setParameter('gender', 1)
                            ->orderBy('c.name', 'ASC');
                    },
                ]),
        ];
    }
    
}
