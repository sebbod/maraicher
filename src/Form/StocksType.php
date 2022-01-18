<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Stocks;
use App\Entity\Units;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StocksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('products', EntityType::class, [
                'class' => Products::class,
                'label' => 'Produit',
                'choice_label' => 'name'
            ] )
            ->add('units', EntityType::class, [
                'class' => Units::class,
                'label' => 'Unité',
                'choice_label' => 'name'
            ] )
            ->add('qty', NumberType::class, [
                'label' => 'quantité',
                'empty_data' => 1
            ] )
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stocks::class,
        ]);
    }
}
