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



      function createFlatsTable(){

         $createTableSQL = 
            "CREATE TABLE uploadedFlats(

               ID int AUTO_INCREMENT PRIMARY KEY, 
               address text,
               town text,
               floorarea text,
               storey text,
               leaseCommence text,
               askingPrice text,
               flatType text,
               flatModel text,
               hdbDescription text,
               dateSubmitted date
            )";
            
            return $createTableSQL;
      }

      function getFlatsSQL(){
         $getFlatsSQL = "";
         return $getFlatsSQL;
      }

      function getInsertSQL(){
         $insertFlatSQL = "INSERT INTO uploadedFlats(address, town, floorarea, storey, leaseCommence, askingPrice, flatType, flatModel, hdbDescription, dateSubmitted) 
             VALUES ('$this->address', '$this->town', '$this->floorarea', '$this->storey', '$this->leaseCommence', '$this->askingPrice', '$this->flatType', '$this->flatModel', '$this->hdbDescription', '$this->date')";     
         
         return $insertFlatSQL;
      }
   }
?>