<?php

class QueryBuilder
{
    protected $pdo;
    protected $validator;

    public function __construct(PDO $pdo, $validator)
    {
        $this->pdo = $pdo;
        $this->validator = $validator;
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table, array $data)
    {
        $keys = implode(', ', array_keys($data));
        $tags = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO `{$table}` ({$keys}) VALUES ({$tags})";

        $stmt = $this->pdo->prepare($sql);
        if ($this->validator->validated) {
            $stmt->execute($data);
        }
    }

    public function update($table, array $data, $id)
    {
        $keys = array_keys($data);
        $string = '';

        foreach ($keys as $key) {
            $string .= $key . ' = :' . $key . ', ';
        }

        $keys = rtrim($string, ', ');
        $data['id'] = $id;

        $sql = "UPDATE `{$table}` SET {$keys} WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        if ($this->validator->validated) {
            $stmt->execute($data);
        }
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function count($table, array $data)
    {
        $keys = array_keys($data);
        $string = '';

        foreach ($keys as $key) {
            $string .= $key . ' = :' . $key . ' and ';
        }
        $string = rtrim($string, ' and ');

        $sql = "SELECT COUNT(*) cnt FROM {$table} WHERE {$string}";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        return $rows['cnt'];
    }

}