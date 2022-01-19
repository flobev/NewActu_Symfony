<?php

namespace App\Form;

use App\Entity\Commentary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TextareaType::class, [
                'label' => 'Titre de votre article',
                #'required' => true,
                'attr' => [
                    'placeholder' => 'Ecrivez votre commentaire ici',
                    'class' => 'form-control'
                ],
                /* 'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut être vide'
                    ])
                ] */
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Commenter <i class="fas fa-paper-plane"></i>',
                'attr' => [
                    'class' => 'd-block col-2 mx-auto btn btn-warning'
                ],
                'label_html' => true
            ]);
        /* ->add('createdAt')
            ->add('updatedAt')
            ->add('deletedAt')
            ->add('post') */
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentary::class,
        ]);
    }
}
