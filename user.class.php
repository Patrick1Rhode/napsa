<?php
class User{
	private $ssn;
	private $nrc;
	private $sortCode;
	private $period;
	private $fName;
	private $lName;
	private $dob;
	private $sex;
	private $bankName;
	private $bankBranchName;
	private $acc;
	private $amount;
	
	public function getlName(){
		return $this->lName;
	}
	public function getfName(){
		return $this->fName;
	}
	public function getdob(){
		return $this->dob;
	}
	public function getSex(){
		return $this->sex;
	}
	public function getbankBranchName(){
		return $this->bankBranchName;
	}
	public function getbankName(){
		return $this->bankName;
	}
	public function getAmount(){
		return $this->amount;
	}
	public function getAccountNumber(){
		return $this->acc;
	}
	
	//setters
	
	public function setfName($fna){
		$this->fName=$fna;
	}
	public function setlName($lna){
		$this->lName=$lna;
	}
	
	public function setAmount($am){
		$this->amount=$am;
	}
	public function setSex($se){
		$this->sex=$se;
	}
	public function setBankBranchName($branch){
		$this->bankBranchName=$branch;
	}
	public function setBankName($bank){
		$this->bankName=$bank;
	}
	public function setdob($db){
		$this->dob=$db;
	}
	public function setAccountNumber($accn){
		$this->acc=$accn;
	}
	
	
	public function getSsn(){
		return $this->ssn;
	}

	public function setSsn($ssn){
		$this->ssn = $ssn;
	}

	public function getNrc(){
		return $this->nrc;
	}

	public function setNrc($nrc){
		$this->nrc = $nrc;
	}

	public function getSortCode(){
		return $this->sortCode;
	}

	public function setSortCode($sortCode){
		$this->sortCode = $sortCode;
	}

	public function getPeriod(){
		return $this->period;
	}

	public function setPeriod($period){
		$this->period = $period;
	}
	
	
}









?>