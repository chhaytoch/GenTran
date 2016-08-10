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
     * @ORM\ManyToOne(targetEntity="Frontend\StringKeyBundle\Entity\StringKey", inversedBy="StringValue")
     */
    private $stringKey;

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\LangBundle\Entity\Lang")
     * @ORM\JoinColumn(name="lang_id", referencedColumnName="id")
     */
    private $lang;

    /**
     * @ORM\Column(name="label_value", type="smallint")
     */
    private $labelValue;

    /**
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @ORM\Column(name="quantity", type="string")
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
    public function getLabelValue()
    {
        return $this->labelValue;
    }

    /**
     * @param mixed $labelValue
     */
    public function setLabelValue($labelValue)
    {
        $this->labelValue = $labelValue;
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

