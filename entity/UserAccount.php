<?php
   class UserAccount {
      /* Member variables */
      var $id;
      var $nric;
      var $email;
      var $createdTime;
      var $password;
      
      /* Member functions */
      function setId($id){
         $this->id = $id;
      }
      
      function getId(){
         return $this->id;
      }
      
      function setNric($nric){
         $this->nric = $nric;
      }
      
      function getNric(){
         return $this->nric;
      }

      function setEmail($email){
         $this->email=$email;
      }

      function getEmail(){
         return $this->email;
      }

      function setCreatedTime($createdTime){
         $this->createdTime=$createdTime;
      }

      function getCreatedTime(){
         return $this->createdTime;
      }

      function setPassword($password){
         $this->password=$password;
      }

      function getPassword(){
         return $this->password;
      }
      function getLoginQuery(){
         $temp = "SELECT * from UserAccounts WHERE NRIC = '$this->nric'";
         return $temp;
      }
      function getNewAccSQL(){
         return "INSERT INTO UserAccounts (NRIC, password, email)VALUES ('$this->nric', '$this->password', '$this->email')";      }
   }
?>