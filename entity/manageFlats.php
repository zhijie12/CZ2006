<?php
   class UserProfile{
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

      function ($storey){
         $this->storey=$storey;
      }

      function ($leaseCommence){
         $this->leaseCommence=$leaseCommence;
      }

      function ($){
         $this->=$;
      }


      function getAddress(){
         return $this->address;
      }



      function getInsertSQL(){
         $insertSQL = 
            "INSERT INTO uploadedFlats(address, town, floorarea, storey, leaseCommence, askingPrice, flatType, flatModel, hdbDescription) 
             VALUES ()";

             return $insertSQL;
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
               hdbDescription text
            )";
            
            return $createTableSQL;
      }

      function getFlatsSQL(){
         $getFlatsSQL = "";
         return $getFlatsSQL;
      }

      function getInsertSQL(){
         $sql = "INSERT INTO UserProfile(NRIC, contactNo, fullName, address, postalCode, dateOfBirth, occupation, income, citizenship, flatEligibility, profileUrl) VALUES 
            ('$this->nric', $this->contactnumber, '$this->fullname', '$this->address', $this->postalcode, '$this->dateofbirth', '$this->occupation', $this->income, '$this->citizenship', '$this->flateligibility', '$this->profileURL')";
         return $sql;
      }

      function checkProfileQuery(){
         $sql="Select * from UserProfile where NRIC='$this->nric'";
         return $sql;
      }

   }
?>