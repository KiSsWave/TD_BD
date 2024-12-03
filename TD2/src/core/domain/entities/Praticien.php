<?php
namespace iutnc\doktrine\core\domain\entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "praticien")]
class Praticien
{
    #[ID]
    #[Column(type: "uuid")]
    #[GeneratedValue(strategy: "UUID")]
    private string $id;

    #[Column(type: "string", length: 50)]
    private string $nom;

    #[Column(type: "string", length: 50)]
    private string $prenom;

    #[Column(type: "string", length: 100, unique: true)]
    private string $email;

    #[Column(type: "string", length: 20)]
    private string $telephone;

    #[Column(type: "string", length: 50)]
    private string $ville;


}