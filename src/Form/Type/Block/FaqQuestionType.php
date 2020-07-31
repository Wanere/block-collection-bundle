<?php

declare(strict_types=1);

namespace Umanit\BlockCollectionBundle\Form\Type\Block;

use Artgris\Bundle\MediaBundle\Form\Type\MediaType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Umanit\BlockCollectionBundle\Entity\Block\FaqQuestion;

final class FaqQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question', TextType::class)
            ->add('answer', CKEditorType::class)
            ->add('file', MediaType::class, [
                'conf'     => 'default',
                'readonly' => true,
            ])
            ->add('buttonText', TextType::class, [
                'required' => false,
            ])
            ->add('image', MediaType::class, [
                'conf'     => 'default',
                'readonly' => true,
            ])
            ->add('alt', TextType::class, [
                'required' => false,
            ])
            ->add('position', HiddenType::class, ['attr' => ['data-target' => 'position']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FaqQuestion::class,
        ]);
    }
}
