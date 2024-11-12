<?php
namespace iutnc\hellokant\query;

class Query{
    private $table_sql;
    private $fields = '*';
    private $where = null;
    private $args = [];
    private $sql = '';

    public static function table( string $table) : Query{
        $query = new Query;
        $query->table_sql= $table;
        return $query;
    }
    public function where(string $col, string $op, mixed $val): Query {
        $this->where = "WHERE $col $op ?";
        $this->args[] = $val;
        return $this;
    }
}