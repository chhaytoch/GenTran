<?php

namespace Frontend\StringValueBundle\Entity;

use CoreSystem\MainBundle\Entity\UserLogEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * StringValue
 *
 * @ORM\Table(name="string_value")
 * @ORM\Entity(repositoryClass="Frontend\StringValueBundle\Repository\StringValueRepository")
 */
class StringValue extends UserLogEntity
{

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\StringKeyBundle\Entity\StringKey")
     * @ORM\JoinColumn(name="string_key", referencedColumnName="id")
     */
    private $stringKey;

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\LangBundle\Entity\Lang")
     * @ORM\JoinColumn(name="lang_id", referencedColumnName="id")
     */
    private $lang;

    /**
     * @ORM\Column(name="translate_value", type="string")
     */
    private $translateValue;

    /**
     * @ORM\Column(name="type", type="string", nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(name="quantity", type="string", nullable=true)
     */
    private $quantity;

    /**
     * @return mixed
     */
    public function getStringKey()
    {
        return $this->stringKey;
    }

    /**
     * @param mixed $stringKey
     */
    public function setStringKey($stringKey)
    {
        $this->stringKey = $stringKey;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getTranslateValue()
    {
        return $this->translateValue;
    }

    /**
     * @param mixed $translateValue
     */
    public function setTranslateValue($translateValue)
    {
        $this->translateValue = $translateValue;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}

