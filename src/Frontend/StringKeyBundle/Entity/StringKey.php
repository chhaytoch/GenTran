<?php

namespace Frontend\StringKeyBundle\Entity;

use CoreSystem\MainBundle\Entity\UserLogEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * StringKey
 *
 * @ORM\Table(name="string_key")
 * @ORM\Entity(repositoryClass="Frontend\StringKeyBundle\Repository\StringKeyRepository")
 */
class StringKey extends UserLogEntity
{
    public function __construct()
    {
        $this->os = new ArrayCollection();
    }

    /**
     * @ORM\Column(name="key_label", type="string")
     */
    private $keyLabel;

    /**
     * @ORM\ManyToMany(targetEntity="Frontend\OperatingSystemBundle\Entity\OperatingSystem")
     * @ORM\JoinTable(name="key_os",
     *      joinColumns={@ORM\JoinColumn(name="string_key", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="os", referencedColumnName="id")}
     *      )
     */
    private $os;

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\ContextBundle\Entity\Context")
     * @ORM\JoinColumn(name="context_id", referencedColumnName="id")
     */
    private $context;

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }
    
    /**
     * @return mixed
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param mixed $os
     */
    public function setOs($os)
    {
        $this->os = $os;
    }

    /**
     * @return mixed
     */
    public function getKeyLabel()
    {
        return $this->keyLabel;
    }

    /**
     * @param mixed $keyLabel
     */
    public function setKeyLabel($keyLabel)
    {
        $this->keyLabel = $keyLabel;
    }
    
    
}

