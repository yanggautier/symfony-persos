<?php

namespace App\Entity;

class Arme
{
    public $nom;
    public $description;
    public $degat;

    public static $armes = [];

    public function __construct($nom, $description, $degat)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->degat = $degat;
        self::$armes[] = $this;
    }

    public static function createArmes()
    {
        new Arme(
            "épée",
            "Une superbe épée tranchante",
            10
        );

        new Arme(
            "hache",
            "Une armme ou un outil",
            15
        );

        new Arme(
            "arc",
            "Une arme à distance",
            7
        );
    }

    public static function getArmeParNom($nom)
    {
        foreach (self::$armes as $arme) {
            if (strtolower(str_replace('é', 'e', $arme->nom)) === $nom) {
                return $arme;
            }
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDegat()
    {
        return $this->degat;
    }

    public function setNom($nom)
    {
        if (!empty($nom)) {
            $this->nom = $nom;
        }
        return $this;
    }

    public function setDescription($description)
    {
        if (!empty($description)) {
            $this->nom = $description;
        }
        return $this;
    }

    public function setDegat($degat)
    {
        if (!empty($degat) && is_int($degat)) {
            $this->degat = $degat;
        }
        return $this;
    }
}
