<?php

namespace App\Form;

use App\Entity\Customers;
use App\Entity\Orders;
use App\Entity\OrderStates;
use App\Entity\Products;
use App\Entity\Units;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customers', EntityType::class, [
                'class' => Customers::class,
                'label' => 'Client',
                'choice_label' => 'name'
            ] )
            //->add('datecreate', DateType::class, [
            ->add('datecreate', DateTimeType::class, [
            //->add('datecreate', \DateTimeInterface::class, [
                'html5' => true,
                'label' => 'Date de création',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'with_seconds' => true
            ])
            ->add('states', EntityType::class, [
                'class' => OrderStates::class,
                'label' => 'Etat',
                'choice_label' => 'name'
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
