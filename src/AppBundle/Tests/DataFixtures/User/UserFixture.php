<?php

namespace AppBundle\Tests\DataFixtures\User;

use Apnet\FunctionalTestBundle\Framework\DataFixtures\SingleObjectFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User;

/**
 * Abstract parent class for Uset fixtures
 */
abstract class UserFixture extends SingleObjectFixture implements OrderedFixtureInterface
{

  /**
   * @var string
   */
  public $username;

  /**
   * @var string
   */
  public $email;

  /**
   * @var string
   */
  public $password = "qwerty";

  /**
   * @var string
   */
  public $firstname;

  /**
   * @var string
   */
  public $lastname;

  /**
   * @var array
   */
  public $roles = [ 'ROLE_USER' ];

  /**
   * Create User object
   *
   * @return User
   */
  public function createObject()
  {
    $object = new User();

    $object->setUsername($this->username);
    $object->setEmail($this->email);
    $object->setPlainPassword($this->password);
    $object->setRoles($this->roles);

    $object->setFirstname($this->firstname);
    $object->setLastname($this->lastname);

    $object->setLocked(false);
    $object->setEnabled(true);

    return $object;
  }

  /**
   * {@inheritdoc}
   */
  public function getOrder()
  {
    return 106000;
  }
}
