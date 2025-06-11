<?php

class ZangeressenModel
{
    private $db;

    public function __construct()
    {
        /** Door het maken van een database instantie
         *  kunnen we de database functies gebruiken
         *  en hebben we een verbinding met de database
         */
        $this->db = new Database();
    }

    public function getAllSingers()
    {
        $sql = 'SELECT ZARS.Id
                      ,ZARS.Naam
                      ,ZARS.Nettowaarde 
                      ,ZARS.Land
                      ,ZARS.Mobiel
                      ,ZARS.Leeftijd      
        
                FROM Zangeres as ZARS
                
                ORDER BY ZARS.Nettowaarde DESC
                
                LIMIT 5';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Zangeres WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }


    public function insertZangeres($post)
    {
        $sql = "INSERT INTO zangeres (Naam
                                     ,Nettowaarde
                                     ,Land
                                     ,Mobiel
                                     ,Leeftijd)
                VALUES              (:naam
                                    ,:nettowaarde
                                    ,:land
                                    ,:mobiel
                                    ,:leeftijd)";

        $this->db->query($sql);
        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $post['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':land', $post['land'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $post['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $post['leeftijd'], PDO::PARAM_INT);
        $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT  ZARS.Id
                       ,ZARS.Naam
                       ,ZARS.Nettowaarde
                       ,ZARS.Land
                       ,ZARS.Mobiel
                       ,ZARS.Leeftijd

                FROM zangeres AS ZARS
                
                WHERE ZARS.Id = :id';

        $this->db->query($sql);

        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeresById($post)
    {
        $sql = "UPDATE zangeres AS ZARS
                SET    Naam = :naam
                      ,Nettowaarde = :nettowaarde
                      ,Land = :land
                      ,Mobiel = :mobiel
                      ,Leeftijd = :leeftijd
                WHERE ZARS.Id = :id";

        $this->db->query($sql);

        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $post['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':land', $post['land'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $post['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $post['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':id', $post['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}