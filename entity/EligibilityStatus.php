<?php
   class EligibilityStatus{
      /* Member variables */
		var $NRIC;
		var $BuyerEligibility;
		var $SellerEligibility;
		var $SSCScheme;
		var $fianceScheme;
		var $SinglesGrant;
		var $FamilyGrant;
      
      /* Member functions */
      function setNRIC($NRIC){
         $this->NRIC=$NRIC;
      }
      function getNRIC(){
         return $this->NRIC;
      }
	  
	  function setBuyerEligibility($BuyerEligibility){
         $this->BuyerEligibility=$BuyerEligibility;
      }
      function getBuyerEligibility(){
         return $this->BuyerEligibility;
      }
	  
	  function setSellerEligibility($SellerEligibility){
         $this->SellerEligibility=$SellerEligibility;
      }
      function getSellerEligibility(){
         return $this->SellerEligibility;
      }
	  
	  function setSSCScheme($SSCScheme){
         $this->SSCScheme=$SSCScheme;
      }
      function getSSCScheme(){
         return $this->SSCScheme;
      }
	  
	  function setfianceScheme($fianceScheme){
         $this->fianceScheme=$fianceScheme;
      }
      function getfianceScheme(){
         return $this->fianceScheme;
      }
	  
	  function setSinglesGrant($SinglesGrant){
         $this->SinglesGrant=$SinglesGrant;
      }
      function getSinglesGrant(){
         return $this->SinglesGrant;
      }
	  
	  function setFamilyGrant($FamilyGrant){
         $this->FamilyGrant=$FamilyGrant;
      }
      function getFamilyGrant(){
         return $this->FamilyGrant;
      }
	  
      function getInsertSQL(){
         $sql = "INSERT INTO `harmoniouslivingdb`.`eligibilitystatus` 
				(`nric`, `BuyerEligibility`, `SellerEligibility`, `SSCScheme`, `fianceScheme`, `SinglesGrant`, `FamilyGrant`)
				VALUES ('$this->NRIC','$this->BuyerEligibility', '$this->SellerEligibility', '$this->SSCScheme', '$this->fianceScheme', '$this->SinglesGrant', '$this->FamilyGrant');";
         return $sql;
      }
      function checkStatusQuery(){
         $sql="Select * from `harmoniouslivingdb`.`eligibilitystatus` where NRIC='$this->NRIC'";
         return $sql;
      }
	  function getDeleteSQL(){
		  return "delete from `harmoniouslivingdb`.`eligibilitystatus` where NRIC='$this->NRIC'";
	  }
   }
?>