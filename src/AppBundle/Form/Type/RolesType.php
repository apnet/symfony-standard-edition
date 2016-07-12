<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use \Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Class RolesType
 */
class RolesType extends AbstractType
{
    /**
     * @var array
     */
    protected $roles;

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'choices' => $this->flattenRoles(),
                'multiple' => true
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return ChoiceType::class;
    }

    /**
     * Set roles from %security.role_hierarchy.roles% parameter
     *
     * @param array $roles Roles
     */
    public function setRoleHierarchy($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Turns the role's array keys into string <ROLES_NAME> keys.
     *
     * @return array
     */
    protected function flattenRoles()
    {
        $flatRoles = array();
        foreach ($this->roles as $roles) {
            if (empty($roles)) {
                continue;
            }
            foreach ($roles as $role) {
                if (!isset($flatRoles[$role])) {
                    $flatRoles[$role] = $role;
                }
            }
        }
        return $flatRoles;
    }
}
