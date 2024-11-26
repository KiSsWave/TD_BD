<?php

namespace iutnc\hellokant\entity;

use iutnc\hellokant\model\Model;

class Categorie extends Model
{
    protected static string $table = 'categorie';

    public function articles(): array {
        return $this->has_many(Article::class, 'id_categ');
    }
}
