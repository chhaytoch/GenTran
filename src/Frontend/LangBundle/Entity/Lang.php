<?php

namespace Frontend\LangBundle\Entity;

use CoreSystem\MainBundle\Entity\UserLogEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Lang
 *
 * @ORM\Table(name="lang")
 * @ORM\Entity(repositoryClass="Frontend\LangBundle\Repository\LangRepository")
 * @UniqueEntity(
 *     fields={"langName"},
 *     message="This language is already in added."
 * )
 */
class Lang extends UserLogEntity
{
    /**
     * @ORM\Column(name="lang_name", type="string", unique=true)
     */
    private $langName;
    
    /**
     * @return mixed
     */
    public function getLangName()
    {
        return $this->langName;
    }

    /**
     * @param mixed $langName
     */
    public function setLangName($langName)
    {
        $this->langName = $langName;
    }

    /**
     *
     */
    public function prePersistData()
    {

    }
}

