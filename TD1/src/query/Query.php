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

    public function select ( array $fields) : Query{
        $this->fields = implode(',',$fields);
        return $this;
    }
    public function where(string $col, string $op, mixed $val): Query {
        $this->where = "WHERE $col $op ?";
        $this->args[] = $val;
        return $this;
    }
    public function get() : Array {
        $this->sql = 'select '. $this->fields . ' from ' . $this->table_sql;
        if($this->where){
            $this->sql = $this->sql . ' ' . $this->where;
        }
        $stmt = $pdo->prepare($this->sql);
        $stmt->execute($this->args);
        return $stmt->fectAll(\PDO::FETCH_ASSOC);
    }
}