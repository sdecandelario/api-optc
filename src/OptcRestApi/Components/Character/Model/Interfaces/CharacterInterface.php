<?php

namespace OptcRestApi\Components\Character\Model\Interfaces;

/**
 * Interface CharacterInterface.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
interface CharacterInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getName();

    /*
     * @return mixed
     */
    //public function setClass($class);

    /*
     * @return mixed
     */
    //public function getClass();

    /**
     * @param $description
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getDescription();
//
//    /**
//     * @return mixed
//     */
//    public function setType($type);
//
//    /**
//     * @return mixed
//     */
//    public function getType();
//
    /**
     * @param $rarity
     */
    public function setRarity($rarity);

    /**
     * @return mixed
     */
    public function getRarity();
//
//    /**
//     * @return mixed
//     */
//    public function setCost();
//
//    /**
//     * @return mixed
//     */
//    public function getCost();
//
//    /**
//     * @return mixed
//     */
//    public function setCombo();
//
//    /**
//     * @return mixed
//     */
//    public function getCombo();
//
//    /**
//     * @return mixed
//     */
//    public function setPrice();
//
//    /**
//     * @return mixed
//     */
//    public function getPrice();
//
    /**
     * @param $maxLevel
     */
    public function setMaxLevel($maxLevel);

    /**
     * @return mixed
     */
    public function getMaxLevel();

    /**
     * @param $experience
     */
    public function setExperience($experience);

    /**
     * @return mixed
     */
    public function getExperience();

//    /**
//     * @return mixed
//     */
//    public function setBase_stats();
//
//    /**
//     * @return mixed
//     */
//    public function getBase_stats();
//
//    /**
//     * @return mixed
//     */
//    public function setMax_stats();
//
//    /**
//     * @return mixed
//     */
//    public function getMax_stats();
//
//    /**
//     * @return mixed
//     */
//    public function setCaptain_hability_name();
//
//    /**
//     * @return mixed
//     */
//    public function getCaptain_hability_name();
//
//    /**
//     * @return mixed
//     */
//    public function setCaptain_hability_description();
//
//    /**
//     * @return mixed
//     */
//    public function getCaptain_hability_description();
}
