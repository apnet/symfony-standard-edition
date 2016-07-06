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
   * @ORM\Column(type="string", length=50)
   * @var string
   */
  protected $firstname;

  /**
   * @ORM\Column(type="string", length=50)
   * @var string
   */
  protected $lastname;

  /**
   * Set firstname
   *
   * @param string $firstname First name
   *
   * @return $this
   */
  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;

    return $this;
  }

  /**
   * Get first name
   *
   * @return string
   */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
   * Set last name
   *
   * @param string $lastname Last name
   *
   * @return $this
   */
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;

    return $this;
  }

  /**
   * Get last name
   *
   * @return string
   */
  public function getLastname()
  {
    return $this->lastname;
  }

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
