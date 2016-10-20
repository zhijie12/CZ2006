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
      var $nric;
      var $profileURL;            
      var $employmentStatus;
      var $MOPStatus;
      var $hdbOwnership;
      var $maritalStatus;

      
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

      function setEmploymentStatus($employmentStatus){
         $this->employmentStatus = $employmentStatus;
      }

      function getEmploymentStatus(){
         return $this->employmentStatus;
      }

      function setMOPStatus($MOPStatus){
         $this->MOPStatus = $MOPStatus;
      }
      function getMOPStatus(){
         return $this->MOPStatus;
      }
    
      function setHDBOwnership($hdbOwnership){
         $this->hdbOwnership = $hdbOwnership;
      }    
      function getHDBOwnership(){
         return $this->hdbOwnership;
      }

      function setMartialStatus($maritalStatus){
         $this->maritalStatus = $maritalStatus;
      }    
      function getMartialStatus(){
         return $this->maritalStatus;
      }

      function getInsertSQL(){
         $sql = "INSERT INTO `mainapplicant` (`nric`, `contactNo`, `name`, `address`, `postalCode`, `dateOfBirth`, `occupation`, `income`, `citizenship`, `employmentStatus`, `profileUrl`, `MOPStatus`, `hdbOwnership`, `maritalStatus`) VALUES
            ('$this->nric', $this->contactnumber, '$this->fullname', '$this->address', $this->postalcode, '$this->dateofbirth', '$this->occupation', $this->income, '$this->citizenship', '$this->employmentStatus', '$this->profileURL',$this->MOPStatus, '$this->hdbOwnership', '$this->maritalStatus', )";
         return $sql;
      }
      function checkProfileQuery(){
         $sql="Select * from mainapplicant where NRIC='$this->nric'";
         return $sql;
      }

   }
?>