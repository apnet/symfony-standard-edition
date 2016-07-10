<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @return array
   */
  public function getRealRoles()
  {
    return $this->roles;
  }

  /**
   * @param array $roles
   *
   * @return User
   */
  public function setRealRoles(array $roles)
  {
    $this->setRoles($roles);

    return $this;
  }
}
