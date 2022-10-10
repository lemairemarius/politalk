<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',TextType::class,[
                'label'=> 'Email :'
            ])
            ->add('name',TextType::class,[
                'label'=> 'Nom :'
            ])
            ->add('fname',TextType::class,[
                'label'=> 'Prénom :'
            ])
            ->add('birth_d',DateType::class,[
                'label'=> 'Date de naissance :',
                'widget'=>'single_text'
            ])
            ->add('adress',TextType::class,[
                'label'=> 'Adresse :'
            ])
            ->add('city',TextType::class,[
                'label'=> 'Ville :'
            ])
            ->add('postal_c',TextType::class,[
                'label'=> 'Code postal :'
            ])

            ## A placer dans un nouveau formType pour créer des admins

           # ->add('roles', ChoiceType::class, [
           #     'choices'=>[
           #         'Utilisateur' => 'ROLE_USER',
           #         'Admin'=> 'ROLE_ADMIN',
           #         'Super Admin'=> 'ROLE_SADMIN'
           #     ],
           #     'expanded'=>true,
           #     'multiple'=>true,
           #     'label'=>'Rôles :',
           #     'label_attr'=>[
           #         'class' => 'checkbox-inline',''
           #     ],
           # ])

               ## à Gerer plus tard

          #  ->add('agreeTerms', CheckboxType::class, [
           #     'label'=> 'Accepter les Termes :',
           #     'mapped' => false,
           #     'constraints' => [
           #         new IsTrue([
           #             'message' => 'You should agree to our terms.',
           #         ]),
           #     ],
           # ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
