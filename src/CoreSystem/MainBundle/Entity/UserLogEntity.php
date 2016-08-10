<?php

namespace CoreSystem\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MainEntity
 */
class UserLogEntity extends TimestampEntity
{
    /**
     * @ORM\Column(name="created_user", type="string", nullable=true)
     */
    protected $createdUser;

    /**
     * @ORM\Column(name="modified_user", type="string", nullable=true)
     */
    protected $modifiedUser;

    /**
     * @return mixed
     */
    public function getCreatedUser()
    {
        return $this->createdUser;
    }

    /**
     * @param mixed $createdUser
     */
    public function setCreatedUser($createdUser)
    {
        $this->createdUser = $createdUser;
    }

    /**
     * @return mixed
     */
    public function getModifiedUser()
    {
        return $this->modifiedUser;
    }

    /**
     * @param mixed $modifiedUser
     */
    public function setModifiedUser($modifiedUser)
    {
        $this->modifiedUser = $modifiedUser;
    }
}

