<?php
   class NewResaleFlat{
      /* Member variables */
      var $address;
      var $town;
      var $floorarea;
      var $storey;
      var $leaseCommence;
      var $askingPrice;
      var $flatType;
      var $flatModel;
      var $hdbDescription;
      var $date;
      var $nric;
      var $img = NULL;
      
      /* Member functions */
      /* Place holder for now do we really need this thing called entity??*/
      function setAddress($address){
         $this->address=$address;
      }

      function setTown($town){
         $this->town=$town;
      }
      
      function setFloorArea($floorarea){
         $this->floorarea=$floorarea;
      }

      function setStorey($storey){
         $this->storey=$storey;
      }

      function setLeaseCommence($leaseCommence){
         $this->leaseCommence=$leaseCommence;
      }

      function setAskingPrice($askingPrice){
         $this->askingPrice=$askingPrice;
      }

      function setFlatType($flatType){
         $this->flatType = $flatType;
      }
      function setFlatModel($flatModel){
         $this->flatModel = $flatModel;
      }
      function setHDBDescription($hdbDescription){
         $this->hdbDescription = $hdbDescription;
      }

      function setDate ($date){
         $this->date = $date;
      }
      
      function getAddress(){
         return $this->address;
      }

      function setNric($nric){
         $this->nric = $nric;

      }

      function setImage($img){
         $this->img = $img;
      }

      function getImage(){
         return $this->img;
      }

      // function createFlatsTable(){

      //    $createTableSQL = 
      //       "CREATE TABLE resaleflat(

      //          ID int AUTO_INCREMENT PRIMARY KEY, 
      //          address text,
      //          town text,
      //          floorarea text,
      //          storey text,
      //          leaseCommence text,
      //          askingPrice text,
      //          flatType text,
      //          flatModel text,
      //          hdbDescription text,
      //          dateSubmitted date
      //       )";
            
      //       return $createTableSQL;
      // }

      function getFlatsSQL(){
         $getFlatsSQL = "";
         return $getFlatsSQL;
      }

      function getInsertSQL(){

         $insertFlatSQL = "INSERT INTO `resaleflat` (`town`, `flatType`, `address`, `storey`, `floorArea`, `flatModel`, `leaseCommenceDate`, `price`, `ownerNRIC`, `uploadDate`, `imgUrl`, `hdbDescription`)
             VALUES ('$this->town', '$this->flatType', '$this->address', '$this->storey', '$this->floorarea', '$this->flatModel', '$this->leaseCommence', '$this->askingPrice', '$this->nric' ,'$this->date', '$this->img' , '$this->hdbDescription' )";     
         
         return $insertFlatSQL;
      }

      function getInsertSQLnoImage(){

         $insertFlatSQL = "INSERT INTO `resaleflat` (`town`, `flatType`, `address`, `storey`, `floorArea`, `flatModel`, `leaseCommenceDate`, `price`, `ownerNRIC`, `uploadDate`, `hdbDescription`)
             VALUES ('$this->town', '$this->flatType', '$this->address', '$this->storey', '$this->floorarea', '$this->flatModel', '$this->leaseCommence', '$this->askingPrice', '$this->nric' ,'$this->date', '$this->hdbDescription' )";     
         
         return $insertFlatSQL;
      }

      function getAlterSQL(){

         $alterSQL = "UPDATE `resaleflat` SET `town` = '$this->town', `flatType` = '$this->flatType', `address` = '$this->address', `storey` = '$this->storey', `floorArea` = '$this->floorarea', `flatModel` = '$this->flatModel', `leaseCommenceDate` = '$this->leaseCommence', `price` = '$this->askingPrice', `uploadDate` = '$this->date', `imgUrl` = '$this->img', `hdbDescription` = '$this->hdbDescription' WHERE `resaleflat`.`ownerNric` = '$this->nric';";

         return $alterSQL;
      }

      function getAlterSQLnoImage(){

         $alterSQL = "UPDATE `resaleflat` SET `town` = '$this->town', `flatType` = '$this->flatType', `address` = '$this->address', `storey` = '$this->storey', `floorArea` = '$this->floorarea', `flatModel` = '$this->flatModel', `leaseCommenceDate` = '$this->leaseCommence', `price` = '$this->askingPrice', `uploadDate` = '$this->date', `hdbDescription` = '$this->hdbDescription' WHERE `resaleflat`.`ownerNric` = '$this->nric';";

         return $alterSQL;
      }
   }
?>