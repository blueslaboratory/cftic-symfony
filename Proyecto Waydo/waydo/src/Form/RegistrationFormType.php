<?php

namespace App\Form;

use App\Entity\Pupilos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('nick', TextType::class, [
                'attr' => array(
                    'placeholder' => 'tu nick',
                )
            ])
            ->add('email', EmailType::class, [
                'attr' => array(
                    'placeholder' => 'tu email',
                )
            ])
            ->add('telefono', NumberType::class, [
                'attr' => array(
                    'placeholder' => 'tu telefono',
                )
            ])
            /*
            esto no funciona, distrito no es tipo text es tipo Localizacion pero
            Could not load type "App\Entity\Localizacion": class does not implement "Symfony\Component\Form\FormTypeInterface".
            ->add('distrito', TextType::class, [
                'attr' => array(
                    'placeholder' => 'tu distrito',
                )
            ])
            */
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'attr' => array(
                    'placeholder' => 'tu contraseña'
                ),
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Tu contraseña debe tener al menos {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Acepta nuestros términos.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pupilos::class,
        ]);
    }
}
