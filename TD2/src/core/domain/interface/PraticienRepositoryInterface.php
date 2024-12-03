<?php

namespace iutnc\doktrine\core\domain\interface;

use iutnc\doktrine\core\domain\entities\Praticien;

interface PraticienRepositoryInterface
{
    public function findByVille(string $ville): array;

    public function findByNom(string $nom): array;

    public function savePraticien(Praticien $praticien): void;

    public function deletePraticien(Praticien $praticien): void;
}
