<?php

namespace App\Core\Database;

use \PDO;

class QueryBuilder
{

  protected $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  #executes select all query on given table, returns arrray of
  #object representations
  public function selectAll($table)
  {
    $statement = $this->pdo->prepare("select * from $table");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function insert($table, $values)
  {
    $query = sprintf(
      "insert into %s(%s) values(%s)",
      $table,
      implode(', ', array_keys($values)),
      ':'.implode(', :', array_keys($values))
    );

    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($values);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($table, $conditions)
  {
      $conditionString = formatConditional($conditions, 'AND');

      $query = sprintf(
          "delete from %s where(%s)",
          $table,
          $conditionString
      );

      try {
          $statement = $this->pdo->prepare($query);
          $statement->execute($conditions);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }

  public function filter($table, $conditions)
  {
    $conditionString = formatConditional($conditions, 'AND');

    $query = sprintf(
        "select * from %s where(%s)",
        $table,
        $conditionString
    );

    try {
        $statement = $this->pdo->prepare($query);
        $statement->execute($conditions);
    } catch (Exception $e) {
        die($e->getMessage());
    }

    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function get($table, $conditions)
  {
    $conditionString = formatConditional($conditions, 'AND');

    $query = sprintf(
        "select * from %s where(%s)",
        $table,
        $conditionString
    );

    try {
        $statement = $this->pdo->prepare($query);
        $statement->execute($conditions);
    } catch (Exception $e) {
        die($e->getMessage());
    }

    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function update($table, $values, $conditions)
  {
    $conditionString = formatConditional($conditions, 'AND');
    $setValueString = formatConditional($values, ',');

    $query = sprintf(
      "update %s set %s where %s",
      $table,
      $setValueString,
      $conditionString
    );
    //never have overlapping attributes in values and conditions
    $merged = $values + $conditions;
    dd($merged);
    try {
        $statement = $this->pdo->prepare($query);
        $statement->execute($merged);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function raw($query, $params=NULL)
  {
    try {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
    } catch (Exception $e) {
        die($e->getMessage());
    }
    return $statement->fetchAll(PDO::FETCH_CLASS);
  }
}
