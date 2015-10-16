<?php

namespace OptcRestApi\Components\Character\Entity;

use OptcRestApi\Components\Character\Model\Interfaces\CharacterInterface;
use OptcRestApi\Components\Core\Abstracts\AbstractEntity;

/**
 * Character.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class Character extends AbstractEntity implements CharacterInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $rarity;

    /**
     * @var int
     */
    private $cost;

    /**
     * @var int
     */
    private $combo;

    /**
     * @var int
     */
    private $maxLevel;

    /**
     * @var int
     */
    private $experience;

    public function __construct()
    {
        $this->maxLevel = 99;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param $rarity
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getCombo()
    {
        return $this->combo;
    }

    /**
     * @param int $combo
     */
    public function setCombo($combo)
    {
        $this->combo = $combo;
    }

    /**
     * @return int
     */
    public function getMaxLevel()
    {
        return $this->maxLevel;
    }

    /**
     * @param int $maxLevel
     */
    public function setMaxLevel($maxLevel)
    {
        $this->maxLevel = $maxLevel;
    }

    /**
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
}
