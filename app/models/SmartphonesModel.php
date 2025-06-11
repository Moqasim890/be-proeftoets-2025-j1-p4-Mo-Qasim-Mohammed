<?php

class SmartphonesModel
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

    public function getAllSmartphones()
    {
        $sql = 'SELECT  SMPH.Merk
                       ,SMPH.Model
                       ,FORMAT(SMPH.Prijs, 2, "nl_NL") as Prijs
                       ,SMPH.Geheugen
                       ,SMPH.Besturingssysteem
                       ,FORMAT(SMPH.Schermgrootte, 2, "nl_NL") as Schermgrootte
                       ,DATE_FORMAT(SMPH.Releasedatum, "%d-%m-%Y") as Releasedatum
                       ,SMPH.Gewicht
                       ,IF (Simlockvrij = 1, "Ja", "Nee") as Simlockvrij
                FROM smartphones as SMPH
                ORDER BY SMPH.Prijs DESC, SMPH.Geheugen ASC, SMPH.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}