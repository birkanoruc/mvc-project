<?php

namespace Core;

use Core\App;
use Core\Database;

class Model
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = App::resolve(Database::class);
    }

    protected function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function all()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->get();
    }

    public function find($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $this->connection->query($query, ['id' => $id]);
        $result = $this->connection->find();
        
        if ($result) {
            return $this->fill($result); // Model nesnesi döndür
        }

        return null;
    }

    public function first()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id ASC LIMIT 1";
        $this->connection->query($query);
        return $this->connection->find();
    }

    public function where($column, $operator, $value)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE $column $operator :value";
        $this->connection->query($query, ['value' => $value]);
        return $this->connection->get();
    }

    public function orWhere($column, $operator, $value)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE $column $operator :value";
        $this->connection->query($query, ['value' => $value]);
        return $this->connection->get();
    }

    public function whereIn($column, $values)
    {
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $query = "SELECT * FROM " . $this->table . " WHERE $column IN ($placeholders)";
        $this->connection->query($query, $values);
        return $this->connection->get();
    }

    public function whereNotIn($column, $values)
    {
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $query = "SELECT * FROM " . $this->table . " WHERE $column NOT IN ($placeholders)";
        $this->connection->query($query, $values);
        return $this->connection->get();
    }

    public function with($relations)
    {
        // Placeholder for eager loading
        return $this;
    }

    public function has($relation)
    {
        // Placeholder for has relation
        return $this;
    }

    public function doesntHave($relation)
    {
        // Placeholder for doesntHave relation
        return $this;
    }

    public function count()
    {
        $query = "SELECT COUNT(*) AS count FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->find()['count'];
    }

    public function sum($column)
    {
        $query = "SELECT SUM($column) AS sum FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->find()['sum'];
    }

    public function avg($column)
    {
        $query = "SELECT AVG($column) AS avg FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->find()['avg'];
    }

    public function min($column)
    {
        $query = "SELECT MIN($column) AS min FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->find()['min'];
    }

    public function max($column)
    {
        $query = "SELECT MAX($column) AS max FROM " . $this->table;
        $this->connection->query($query);
        return $this->connection->find()['max'];
    }

    public function create($data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $query = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $this->connection->query($query, array_values($data));
        return $this->connection->get();
    }

    public function update($id, $data)
    {
        $set = implode(', ', array_map(fn($key) => "$key = ?", array_keys($data)));
        $query = "UPDATE " . $this->table . " SET $set WHERE id = ?";
        $params = array_merge(array_values($data), [$id]);
        $this->connection->query($query, $params);
        return $this->connection->get();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $this->connection->query($query, [$id]);
        return $this->connection->get();
    }

    public function destroy($ids)
    {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $query = "DELETE FROM " . $this->table . " WHERE id IN ($placeholders)";
        $this->connection->query($query, $ids);
        return $this->connection->get();
    }

    public function getAttribute($key)
    {
        return $this->{$key};
    }

    public function setAttribute($key, $value)
    {
        $this->{$key} = $value;
    }

    public function hasOne($related, $foreignKey = null, $localKey = null)
    {
        $foreignKey = $foreignKey ?: strtolower(class_basename($related)) . '_id';
        $localKey = $localKey ?: 'id';

        $query = "SELECT * FROM " . (new $related)->getTable() . " WHERE $foreignKey = :$localKey LIMIT 1";
        $this->connection->query($query, [$localKey => $this->{$localKey}]);
        return $this->connection->find();
    }

    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $foreignKey = $foreignKey ?: strtolower(class_basename($related)) . '_id';
        $localKey = $localKey ?: 'id';
    
        $query = "SELECT * FROM " . (new $related)->getTable() . " WHERE $foreignKey = :$localKey";
        $this->connection->query($query, [$localKey => $this->{$localKey}]);
        return $this->connection->get();
    }

    public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
        $foreignKey = $foreignKey ?: strtolower(class_basename($related)) . '_id';
        $ownerKey = $ownerKey ?: 'id';
    
        $query = "SELECT * FROM " . (new $related)->getTable() . " WHERE $ownerKey = :$foreignKey LIMIT 1";
        $this->connection->query($query, [$foreignKey => $this->{$foreignKey}]);
        return $this->connection->find();
    }

    public function belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $relation = null)
    {
        $foreignPivotKey = $foreignPivotKey ?: strtolower(class_basename($this)) . '_id';
        $relatedPivotKey = $relatedPivotKey ?: strtolower(class_basename($related)) . '_id';
        $parentKey = $parentKey ?: 'id';
        $relatedKey = $relatedKey ?: 'id';
    
        $query = "SELECT * FROM $table WHERE $foreignPivotKey = :$parentKey";
        $this->connection->query($query, [$parentKey => $this->{$parentKey}]);
        $pivotIds = array_column($this->connection->get(), $relatedPivotKey);
    
        if (empty($pivotIds)) {
            return [];
        }
    
        $relatedModel = new $related();
        $query = "SELECT * FROM " . $relatedModel->getTable() . " WHERE $relatedKey IN (" . implode(',', array_fill(0, count($pivotIds), '?')) . ")";
        $this->connection->query($query, $pivotIds);
        return $this->connection->get();
    }
}