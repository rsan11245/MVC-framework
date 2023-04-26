<?php

namespace app\models;
use PDO;

require 'app/models/conn.php';

abstract class Model
{
    private $db;
    protected $table;

    protected $id;

    //static create - в каждой модели

    public function __construct()
    {
        $this->db = connection();
        $this->table = 'test';
    }


    public function create($params)
    {
        $values = ':id, ';
        foreach ($params as $key => $value) {
            $values .= ':' . $key;
            //Узнать не последний ли это элемент
            if ($key !== array_key_last($params)) {
                $values .= ', ';
            }
        }


        $sql = "INSERT INTO {$this->table} VALUES({$values})";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', null);
        foreach ($params as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT id, name FROM {$this->table} WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($entry)
    {
        $values = '';
        foreach ($entry as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $values .= $key .'=:' . $key;
            //Узнать не последний ли это элемент
            if ($key !== array_key_last($entry)) {
                $values .= ', ';
            }
        }

        $sql = "UPDATE {$this->table} SET {$values} WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        foreach ($entry as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':id', $entry['id']);

        $stmt->execute();
    }

}