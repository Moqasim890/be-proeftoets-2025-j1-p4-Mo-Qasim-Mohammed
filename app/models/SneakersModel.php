<?php

class SneakersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers($orderBy = 'Prijs', $direction = 'DESC')
    {
        // Whitelist van toegestane kolommen en richtingen
        $allowedColumns = ['Merk', 'Model', 'Type', 'Prijs'];
        $allowedDirections = ['ASC', 'DESC'];

        // Valideer input
        if (!in_array($orderBy, $allowedColumns)) {
            $orderBy = 'Prijs';
        }

        if (!in_array($direction, $allowedDirections)) {
            $direction = 'DESC';
        }

        $sql = "SELECT SNKS.Id,
                       SNKS.Merk,
                       SNKS.Model,
                       SNKS.Type,
                       SNKS.Prijs
                FROM Sneakers AS SNKS
                WHERE SNKS.IsActief = 1
                ORDER BY SNKS.$orderBy $direction";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function deleteSneaker($id)
    {
        $sql = 'UPDATE Sneakers
                SET IsActief = 0,
                    DatumGewijzigd = SYSDATE(6)
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT Id, Merk, Model, Type, Prijs
                FROM Sneakers
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateSneaker($data)
    {
        $sql = 'UPDATE Sneakers
                SET Merk = :merk,
                    Model = :model,
                    Type = :type,
                    Prijs = :prijs,
                    DatumGewijzigd = SYSDATE(6)
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':prijs', $data['prijs']);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function createSneaker($data)
    {
        $sql = 'INSERT INTO Sneakers 
                (Merk, Model, Type, Prijs, DatumAangemaakt, DatumGewijzigd)
                VALUES (:merk, :model, :type, :prijs, SYSDATE(6), SYSDATE(6))';

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk']);
        $this->db->bind(':model', $data['model']);  
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':prijs', $data['prijs']);

        return $this->db->execute();
    }
}
