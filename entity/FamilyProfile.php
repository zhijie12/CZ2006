<?php
class FamilyProfile{
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
      var $hdbOwnership;
      var $relationship;
      var $mainapplicantnric;
      var $householdNum;

      
      /* Member functions */
      function setHouseholdNum($householdNum){
         $this->householdNum=$householdNum;
      }
      function getHouseholdNum(){
         return $this->householdNum;
      }
      function setMainApplicantnric($mainapplicantnric){
         $this->mainapplicantnric=$mainapplicantnric;
      }
      function getMainApplicantnric(){
         return $this->mainapplicantnric;
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

      function setRelationship($relationship){
         $this->relationship = $relationship;
      }
      function getRelationship(){
         return $this->relationship;
      }
    
      function setHDBOwnership($hdbOwnership){
         $this->hdbOwnership = $hdbOwnership;
      }    
      function getHDBOwnership(){
         return $this->hdbOwnership;
      }

      function getInsertSQL(){
         $sql = "INSERT INTO `coapplicant` (`name`, `nric`, `dateOfBirth`, `houseHoldNum`, `relationship`, `income`, `hdbOwnership`, `citizenship`, `mainApplicantNRIC`, `occupation`, `address`, `postalCode`, `contactNumber`) values
            ('$this->fullname', '$this->nric', '$this->dateofbirth', '$this->householdNum', '$this->relationship', '$this->income', '$this->hdbOwnership', '$this->citizenship', '$this->mainapplicantnric',  '$this->occupation','$this->address', '$this->postalcode', '$this->contactnumber')";
         return $sql;
      }
      function checkProfileQuery(){
         $sql="Select * from coapplicant where mainApplicantNRIC='$this->mainapplicantnric'";
         return $sql;
      }

   }

?>