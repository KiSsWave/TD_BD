<?php

namespace iutnc\hellokant\model;

use iutnc\hellokant\query\Query;

abstract class Model
{
    protected array $atts = [];
    protected static string $table;
    protected static string $idColumn = 'id';


    public function __construct(array $t = null) {
        if (!is_null($t)) $this->atts = $t;
    }


    public function __get(string $name) : mixed {
        if (array_key_exists($name, $this->atts))
            return $this->atts[$name];
        return null;
    }


    public function __set(string $name, $value)
    {
        $this->atts[$name] = $value;
    }

    public function delete(): void
    {
        if (!isset($this->atts[static::$idColumn])) {
            throw new \Exception("Impossible de supprimer un objet sans clé primaire définie.");
        }

        Query::table(static::$table)
            ->where(static::$idColumn, '=', $this->atts[static::$idColumn])
            ->delete();
    }

    public function insert(): void
    {
        $id = Query::table(static::$table)->insert($this->atts);
        $this->atts[static::$idColumn] = $id;
    }
}
