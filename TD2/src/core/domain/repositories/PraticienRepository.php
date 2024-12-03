<?php

namespace iutnc\doktrine\core\domain\repositories;

use Doctrine\ORM\EntityRepository;
use iutnc\doktrine\core\domain\entities\Praticien;
use Doctrine\Persistence\ManagerRegistry;
use iutnc\doktrine\core\domain\interface\PraticienRepositoryInterface;

class PraticienRepository extends EntityRepository implements PraticienRepositoryInterface
{

    public function findByVille(string $ville): array
    {
        return $this->findBy(['ville' => $ville]);
    }

    public function findByNom(string $nom): array
    {
        return $this->findBy(['nom' => $nom]);
    }

    public function savePraticien(Praticien $praticien): void
    {
        $this->_em->persist($praticien);
        $this->_em->flush();
    }

    public function deletePraticien(Praticien $praticien): void
    {
        $this->_em->remove($praticien);
        $this->_em->flush();
    }
}
