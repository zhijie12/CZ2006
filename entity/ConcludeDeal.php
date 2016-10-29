<?php
class ConcludeDeal{
//Idea, the purpose of this conclude deal is to allow the buyer and seller to host a conversation platform
	var $resaleID; //a house need to be in the the target
	var $sellerNRIC;
	var $buyerNRIC;
	var $buyOffer;
	var $dealStatus;
	var $dateStarted;
	var $dateEnded;

	function setResaleID($resaleID){
       $this->resaleID=$resaleID;
    }
    function getResaleID(){
      return $this->householdNum;
    }

    function setSellerNRIC($sellerNRIC){
    	$this->$sellerNRIC=$sellerNRIC;
    }

    function getSellerNRIC(){
    	return $this->sellerNRIC;
    }

    function setBuyerNRIC($buyerNRIC){
    	$this->$buyerNRIC= $buyerNRIC;
    }

    function getBuyerNRIC(){
    	return $this->buyerNRIC;
    }

    function setBuyOffer($buyOffer){
    	$this->buyOffer = $buyOffer;
    }
    function getBuyOFfer(){
    	return $this->buyOffer;
    }

    function setDealStatus($dealStatus){
 		$this->dealStatus= $dealStatus;
    }
    function getDealStatus(){
    	return $this->dealStatus;
    }
    function setDateStarted($dateStarted){
    	$this->dateStarted= $dateStarted;
    }
    function getDateStarted(){
    	return $this->dateStarted;
    }
    function setDateEnded($dateEnded){
    	$this->dateEnded = $dateEnded;
    }
    function getDateEnded(){
    	return $this->$dateEnded;
    }
}
?>