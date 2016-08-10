<?php

namespace Frontend\OperatingSystemBundle\Entity;

use CoreSystem\MainBundle\Entity\UserLogEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * OperatingSystem
 *
 * @ORM\Table(name="operating_system")
 * @ORM\Entity(repositoryClass="Frontend\OperatingSystemBundle\Repository\OperatingSystemRepository")
 */
class OperatingSystem extends UserLogEntity
{
    /**
     * @ORM\Column(name="os_name", type="string")
     */
    private $osName;

    /**
     * @return mixed
     */
    public function getOsName()
    {
        return $this->osName;
    }

    /**
     * @param mixed $osName
     */
    public function setOsName($osName)
    {
        $this->osName = $osName;
    }
}

