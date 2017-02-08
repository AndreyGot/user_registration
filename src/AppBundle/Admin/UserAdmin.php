<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username')
            ->add('email')
        ;
    }

    // public function configureFormFields(FormMapper $formMapper)
    // {
    //     $formMapper
    //         ->tab('General') // the tab call is optional
    //             ->with('User name', array(
    //                 'class'       => 'col-md-8',
    //                 'box_class'   => 'box box-solid box-danger',
    //                 'description' => 'Insert user name',
    //                 // ...
    //             ))
    //                 ->add('username')
    //                 ->add('email')
    //             ->end()
    //         ->end()
    //     ;
    // }
}