<?php

namespace iutnc\doktrine\core\domain\repositories;

use iutnc\doktrine\core\domain\entities\Specialite;

class SpecialiteRepository
{
    public function findByID(int $id) :Specialite{
        $sql = "SELECT id, libelle, description from Specialite WHERE id = $id";


    }
}