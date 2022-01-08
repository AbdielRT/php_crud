<?php


include_once($_SERVER['DOCUMENT_ROOT'] . "/CarService/src/models/DAO/Car.php");
session_start();
/**
 * Class Car
 */
class CarDao extends Car
{

    public function findAll()
    {
        $sql = "SELECT * FROM voiture WHERE id_user = :idUser";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':idUser',$_SESSION['id_user']);
        $sth->execute();
        return $this->getSelfObjectsPreparedStatement($sth);
    }

    public function findById($id)
    {
        $request = "SELECT * FROM voiture WHERE id= :id";
        $sth = $this->db->prepare($request);
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $this->getSelfObjectsPreparedStatement($sth);
    }

    public function dupliPlate($plate)
    {
        $request = "SELECT * FROM voiture WHERE plaque= :plate";
        $sth = $this->db->prepare($request);
        $sth->bindParam(':plate', $plate);
        $sth->execute();
        return $this->getSelfObjectsPreparedStatement($sth);    }

    public function insertCar()
    {
        $plate = addslashes(strtoupper($_POST['plaque']));
        $color = addslashes($_POST['couleur']);
        $brand = addslashes($_POST['marque']);
        $model = addslashes($_POST['modele']);

        $sql = "INSERT INTO `voiture`(`plaque`, `couleur`, `marque`, `modele`, `id_user`) 
                VALUES (:plate, :color, :brand, :model, :id_user)";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':plate', $plate);
        $sth->bindParam(':color', $color);
        $sth->bindParam(':brand', $brand);
        $sth->bindParam(':model', $model);
        $sth->bindParam(':id_user', $_SESSION['id_user']);
        $sth->execute();
        return $this->db->lastInsertId();
    }

    public function deleteCar($id)
    {
        $sql = "DELETE FROM voiture WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':id', $id);
        return $sth->execute();
    }

    public function updateCar($id){
        $plate = $_POST['plaque'];
        $color = $_POST['couleur'];
        $brand = $_POST['marque'];
        $model = $_POST['modele'];

        $sql = "UPDATE voiture 
                SET plaque = :plate, couleur = :color, marque= :brand, modele= :model
                WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->bindParam(':plate', $plate);
        $sth->bindParam(':color', $color);
        $sth->bindParam(':brand', $brand);
        $sth->bindParam(':model', $model);
        return $sth->execute();

    }
}
