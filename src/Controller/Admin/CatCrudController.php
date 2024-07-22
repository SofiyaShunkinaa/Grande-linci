<?php

namespace App\Controller\Admin;

use App\Entity\Cat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextAreaField::new('description'),
            AssociationField::new('breed'),
            AssociationField::new('gender'),
            TextField::new('imageLink'),

        ];
    }
    
}
