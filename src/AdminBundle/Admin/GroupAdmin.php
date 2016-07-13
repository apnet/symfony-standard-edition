<?php

namespace AdminBundle\Admin;

use AdminBundle\Entity\Group;
use AdminBundle\Form\Type\RolesType;
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
     * @var string
     */
    protected $translationDomain = "app_admin";

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
            ->add('roles', null, array(
                'template' => 'AdminBundle:Admin/CRUD:roles_list_field.html.twig'
            ));
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
            ->add('roles', RolesType::class, array(
                'required' => false
            ));
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
