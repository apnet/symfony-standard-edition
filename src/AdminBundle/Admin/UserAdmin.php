<?php

namespace AdminBundle\Admin;

use AdminBundle\Entity\User;
use AdminBundle\Form\Type\RolesType;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

/**
 * Class UserAdmin
 */
class UserAdmin extends AbstractAdmin
{
    /**
     * @var string
     */
    protected $translationDomain = "app_admin";

    /**
     * @var UserManagerInterface
     */
    protected $userManager;

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('groups')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('username')
            ->add('locked')
            ->add('email')
            ->add('groups')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('tab.user')
            ->with('group.general')
            ->add('username')
            ->add('email')
            ->add('plainPassword', TextType::class, array(
                'required' => (!$this->getSubject() || is_null($this->getSubject()->getId())),
            ))
            ->end()
            ->end()
            ->tab('tab.security')
            ->with('group.status')
            ->add('locked', null, array('required' => false))
            ->add('expired', null, array('required' => false))
            ->add('enabled', null, array('required' => false))
            ->add('credentialsExpired', null, array('required' => false))
            ->end()
            ->with('group.roles')
            ->add('roles', RolesType::class)
            ->add('groups', ModelType::class, array(
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ))
            ->end()
            ->end();
    }

    /**
     * {@inheritdoc}
     */
    public function toString($object)
    {
        /** @var User $object */
        return $object instanceof User ? $object->getUsername() : 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($user)
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }

    /**
     * Set user manager
     *
     * @param UserManagerInterface $userManager User manager
     *
     * @return $this
     */
    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;

        return $this;
    }

    /**
     * Get user manager
     *
     * @return UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->userManager;
    }
}
