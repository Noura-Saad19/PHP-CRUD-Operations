<?php

class db
{
    private $connection;
    private $sql;
//    public function __construct()
//    {
//        $this->connection = mysqli_connect("localhost", "root", "", "lmsroute", "3305");
//    }
    public function __construct($data)
    {
        $this->connection = mysqli_connect($data[0], $data[1], $data[2], $data[3], $data[4]);
    }

//    for select
    public function select($table, $column = "*")
    {
        $this->sql = "SELECT $column FROM `$table`";
//        $query = mysqli_query($this->connection,"SELECT `$column` FROM `$table`" );
//        return mysqli_fetch_all($query,MYSQLI_ASSOC);
        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->sql .= " WHERE `$column` $operator $value";
        return $this;
    }

    public function rows()
    {
//        echo  $this->sql;die;
        $query = mysqli_query($this->connection, $this->sql);
        if (is_object($query)) {
            return mysqli_fetch_all($query, MYSQLI_ASSOC);
        } else {
            return $this->showError();
        }
//        while ($row=mysqli_fetch_assoc($query)){
//            $data[]=$row;
//        }
//        return $data;

    }

    public function first()
    {
//        echo  $this->sql;die;
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_fetch_assoc($query);
    }

//    for delete
    public function delete($table)
    {
        $this->sql = "DELETE FROM `$table`";
        return $this;
    }

    public function execute()
    {
        $query = mysqli_query($this->connection, $this->sql);
        return mysqli_affected_rows($this->connection);
    }

//    for insert

    public function insert($table, $data)
    {
        $columns = '';
        $values = '';
        foreach ($data as $column => $value) {
            $columns .= "`$column`,";
            $values .= "'$value',";
        }
        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');
        $this->sql = "INSERT INTO `$table` ($columns) VALUES ($values)";

//        echo $this->sql;die;
        return $this;
    }

//    for update

    public function update($table, $data)
    {
        $row = '';
        foreach ($data as $column => $value) {
            $row .= "`$column` = '$value',";
        }
        $row = rtrim($row, ',');
        $this->sql = "UPDATE `$table` SET $row";
//        echo $this->sql;die;
        return $this;
    }

    public function andWhere($column, $operation, $value)
    {
        $this->sql .= " AND `$column` $operation '$value'";
        return $this;

    }

    public function orWhere($column, $operation, $value)
    {
        $this->sql .= " OR `$column` $operation '$value'";
        return $this;

    }

//Join Tables
    public function join($type, $table, $primaryKey, $foreignKey)
    {
        $this->sql .= "$type JOIN `$table` ON $primaryKey = $foreignKey";
        return $this;
    }

    private function showError()
    {
        return mysqli_error_list($this->connection);
//     return mysqli_error_list($this->connection)[0]['error'];
    }

//    to close connection
    public  function  __destruct(){
        mysqli_close($this->connection);
    }
}


