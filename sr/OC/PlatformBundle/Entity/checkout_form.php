<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * checkout_form
 *
 * @ORM\Table(name="checkout_form")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\checkout_formRepository")
 */
class checkout_form
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $payment;


}

