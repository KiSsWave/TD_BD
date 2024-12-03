<?php
namespace iutnc\doktrine\core\domain\entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "groupement")]
class Groupement
{

    #[Id]
    #[Column(type: "uuid")]
    #[GeneratedValue(strategy: "UUID")]
    private string $id;

    #[Column(type: "string", length: 50)]
    private string $nom;

    #[Column(type: "string", length: 100)]
    private string $adresse;

    #[Column(type: "string", length: 100)]
    private string $email;

    #[Column(type: "string", length: 20)]
    private string $telephone;

}

