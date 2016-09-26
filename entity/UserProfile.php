<?php
   class UserProfile{
      /* Member variables */
      var $contactnumber;
      var $fullname;
      var $address;
      var $dateofbirth;
      var $postalcode;
      var $occupation;
      var $income;
      var $citizenship;
      var $flateligibility;
      var $nric;
      var $profileURL;
      
      /* Member functions */
      function setProfileURL($profileURL){
         $this->profileURL=$profileURL;
      }
      function getProfileURL(){
         return $this->profileURL;
      }

      function setNric($nric){
         $this->nric = $nric;
      }
      
      function getNric(){
         return $this->nric;
      }
      
      function setContactNumber($contactnumber){
         $this->contactnumber = $contactnumber;
      }
      
      function getContactNumber(){
         return $this->contactnumber;
      }

      function setFullName($fullname){
         $this->fullname=$fullname;
      }

      function getFullName(){
         return $this->fullname;
      }

      function setAddress($address){
         $this->address=$address;
      }

      function getAddress(){
         return $this->address;
      }

      function setDateOfBirth($dateofbirth){
         $this->dateofbirth=$dateofbirth;
      }

      function getDateOfBirth(){
         return $this->dateofbirth;
      }

      function setPostalCode($postalcode){
         $this->postalcode=$postalcode;
      }

      function getPostalCode(){
         return $this->postalcode;
      }
      function setOccupation($occupation){
         $this->occupation=$occupation;
      }

      function getOccupation(){
         return $this->occupation;
      }

      function setIncome($income){
         $this->income=$income;
      }

      function getIncome(){
         return $this->income;
      }

      function setCitizenship($citizenship){
         $this->citizenship=$citizenship;
      }

      function getCitizenship(){
         return $this->citizenship;
      }
      function setFlatEligibility($flateligibility){
         $this->flateligibility=$flateligibility;
      }

      function getFlatEligibility(){
         return $this->flateligibility;
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