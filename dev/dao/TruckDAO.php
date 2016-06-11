<?php

require_once (WWW_ROOT . 'dao' . DS . 'DAO.PHP');

class TruckDAO extends DAO {

	 public function selectAll() {

      $sql = "SELECT *FROM `trk_trucks`";
      $stmt=$this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

     public function selectById($id){

      $sql = "SELECT * FROM `trk_trucks` WHERE `id` = :id";
      $stmt=$this->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

      // public function allesOphalen(){
      //   $sql = "SELECT `trk_trucks`.*, `trk_products`.*
      //           FROM `trk_trucks`
      //           RIGHT OUTER JOIN `trk_products`
      //           ON `trk_trucks`.`id`  `trk_products`.`truck_id`
      //           GROUP BY `trk_trucks`.`id`"
      //   $stmt=$this->pdo->prepare($sql);
      //   $stmt->bindValue(':id', $id);
      //   $stmt->execute();
      //   return $stmt->fetch(PDO::FETCH_ASSOC);        
      // }
  }