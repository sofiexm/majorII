<?php

require_once (WWW_ROOT . 'dao' . DS . 'DAO.PHP');

class ProductDAO extends DAO {


    public function selectAll() {

      $sql = "SELECT *FROM `trk_products`";
      $stmt=$this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function selectById($id){

      $sql = "SELECT * FROM `trk_products` WHERE `id` = :id";
      $stmt=$this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function selectByTruckId($truck_id){

      $sql = "SELECT * FROM `trk_products` WHERE `truck_id` = :truck_id";
      $stmt=$this->pdo->prepare($sql);
      $stmt->bindValue(':truck_id', $truck_id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function insert($data){



    // $errors = $this->validateRegistrationData( $data );

    // if( !empty($errors) ){
    //   return false;
    // }

    $sql = "INSERT INTO `trk_user`(`first_name`, `last_name`,  `address` , `email` , `postal_code`, `city`) VALUES(:first_name, :last_name, :email, :address, :postal_code, :city)";
    
    $stmt = $this->pdo->prepare( $sql );
    $stmt->bindValue(':first_name', $data['first_name']);
    $stmt->bindValue(':last_name', $data['last_name']);
    $stmt->bindValue(':address', $data['address']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':postal_code', $data['postal_code']);
    $stmt->bindValue(':city', $data['city']);
    return $stmt->execute();

    }

    public function validateRegistrationData( $data ){

    $errors = [];

    if( !isset($data["first_name"]) || empty( $data["first_name"] ) ){
      $errors[] = "Gelieve een voornaam in te vullen";
    }

    if( !isset($data["last_name"]) || empty( $data["last_name"] ) ){
      $errors[] = "Gelieve een achternaam in te vullen";
    }

    if( !isset($data["address"]) || empty( $data["address"] ) ){
      $errors[] = "Gelieve een adres in te vullen";
    }

    if( !isset($data["postal_code"]) || empty( $data["postal_code"] ) ){
      $errors[] = "Gelieve een postcode in te vullen";
    }

    if( !isset($data["city"]) || empty( $data["city"] ) ){
      $errors[] = "Gelieve een stad in te vullen";
    }

    return $errors;

  }

 }



 ?>