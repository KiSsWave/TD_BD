<?php
namespace iutnc\hellokant\query;

class Query{
    private $table_sql;
    private $fields = '*';
    private $where = null;
    private $args = [];
    private $sql = '';
}