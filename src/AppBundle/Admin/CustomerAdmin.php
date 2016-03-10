<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use AppBundle\Enum\CartStatusEnum;

/**
 * Class CustomerAdmin
 *
 * @category Admin
 * @package  AppBundle\Admin
 * @author   Anton Serra <aserratorta@gmail.com>
 */
class CustomerAdmin extends AbstractBaseAdmin
{
    protected $classnameLabel = 'Customer';
    protected $baseRoutePattern = 'carts/customer';
    protected $datagridValues = array(
        '_sort_by'    => 'name',
        '_sort_order' => 'desc',
    );

    /**
     * Configure route collection
     *
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('edit')
            ->remove('delete')
            ->remove('batch');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'name',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.name',
                )
            )
            ->add(
                'address',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.address',
                )
            )
            ->add(
                'postalCode',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.postalCode',
                )
            )
            ->add(
                'city',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.city',
                )
            )
            ->add(
                'state',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.state',
                )
            )
            ->add(
                'country',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.country',
                )
            )
            ->add(
                'phone',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.phone',
                )
            )
            ->add(
                'email',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.email',
                )
            );
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);
        $listMapper
            ->add(
                'name',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.name',
                )
            )
            ->add(
                'address',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.address',
                )
            )
            ->add(
                'postalCode',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.postalCode',
                )
            )
            ->add(
                'city',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.city',
                )
            )
            ->add(
                'state',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.state',
                )
            )
            ->add(
                'country',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.country',
                )
            )
            ->add(
                'phone',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.phone',
                )
            )
            ->add(
                'email',
                null,
                array(
                    'label'    => 'backend.admin.cart.customer.email',
                )
            )
            ->add(
                '_action',
                'actions',
                array(
                    'label' => 'backend.admin.actions',
                    'actions' => array(
                        'show'   => array(),
                    ),
                )
            );
    }
}

