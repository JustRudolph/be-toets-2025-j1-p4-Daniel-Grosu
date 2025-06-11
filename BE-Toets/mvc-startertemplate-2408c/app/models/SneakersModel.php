<?php

class SneakersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  SNKS.Id
                       ,SNKS.Merk
                       ,SNKS.Model
                       ,SNKS.Type
                       ,SNKS.Prijs

                FROM   Sneakers as SNKS
                
                ORDER BY SNKS.Merk DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

        public function delete($Id)
    {
        $sql = "DELETE 
                FROM Sneakers
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers (Merk, Model, Type, Prijs)
                VALUES (:merk, :model, :type, :prijs)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_INT);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);

        return $this->db->execute();
    }

}