<?php

namespace iutnc\hellokant\entity;

use iutnc\hellokant\model\Model;

class Article extends Model
{
    protected static string $table = 'article';

    public function categorie(): Model
    {
        return $this->belongs_to(Categorie::class, 'id_categ');
    }
}
