<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Group;
use AppBundle\Form\Type\RolesType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class GroupAdmin
 */
class GroupAdmin extends AbstractAdmin
{
    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $class = $this->getClass();

        return new $class('', array());
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('roles', 'user_roles');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('roles', RolesType::class, array('required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function toString($object)
    {
        /** @var Group $object */
        return $object instanceof Group ? $object->getName() : 'Group';
    }
}
