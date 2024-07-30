<?php

namespace App\Controller\Admin;

use App\Entity\Kitten;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use App\Enum\StatusType;

class KittenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kitten::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('breed'),
            AssociationField::new('gender'),
            AssociationField::new('color'),
            AssociationField::new('kittenStatus'),
            AssociationField::new('litter'),
        ];
    }
    
}
