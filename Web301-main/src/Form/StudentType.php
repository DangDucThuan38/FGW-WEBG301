<?php

namespace App\Form;

use App\Entity\Grade;
use App\Entity\Major;
use App\Entity\Course;
use App\Entity\Student;
use App\Entity\Classroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                  ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Student Name',
                    'required' => true,
                    'attr' => [
                        'minlength' => 5,
                        'maxlength' => 50,
                    ]
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    'label' => 'Student Email',
                    'required' => true
                ]
            )
            ->add(
                'studentId',
                TextType::class,
                [
                    'label' => 'Student ID',
                    'required' => true
                ]
            )
            ->add(
                'brithday',
                DateType::class,
                [
                    'label' => 'Student Birthday',
                    'required' => true,
                    'widget' => 'single_text'
                ]
            )
            ->add(
                'phone',
                TextType::class,
                [
                    'label' => 'Student Phone',
                    'required' => true
                ]
            )

            ->add(
                'image',
                TextType::class,
                [
                    'label' => 'Student Image',
                    'required' => true
                ]
            )
            ->add('courses', EntityType::class, [
                'label' => 'Course Name',
                'required' => true,
                'class' => Course::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true
            ])
              ->add('major', EntityType::class, [
                'label' => 'Major Name',
                'required' => true,
                'class' => Major::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false
            ])
             ->add('classroom', EntityType::class, [
                'label' => 'Class',
                'required' => true,
                'class' => Classroom::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false
            ])
            //  ->add('grades', EntityType::class, [
            //     'label' => 'Grades',
            //     'required' => true,
            //     'class' => Grade::class,
            //     'choice_label' => 'grade',
            //     'multiple' => true,
            //     'expanded' => false
            
               ->add('sex',  ChoiceType::class,
            [
                'label' => 'Sex',
                'required' => true,
                'choices' => [
                      ' ' =>' ',
                    'FeMale' => 'Female',
                    'Male' => 'Male',
                   
                ],
                'multiple' => false, 
                'expanded' => false  

            ])

            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Save'
                ]
            )
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
