<?php

class Product {

	private $dbh;

	public function __construct($host,$user,$pass,$db)	{
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function getProducts(){
		$sth = $this->dbh->prepare("SELECT * FROM products");
		$sth->execute();
		return json_encode($sth->fetchAll());
	}

	public function add($product){


		$sth = $this->dbh->prepare("INSERT INTO products(name ,type, sno, sku, imei, invoiceNo, costPrice, did , distributorPrice ,dateAvailable,purchaseDate ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sth->execute(array($product->name, $product->type, $product->sno, $product->sku, $product->imei, $product->invoiceNo, $product->costPrice, $product->did, $product->distributorPrice, $product->dateAvailable,$product->purchaseDate));


		return json_encode($this->dbh->lastInsertId());



	}

	public function delete($product){
		$sth = $this->dbh->prepare("DELETE FROM products WHERE pid=?");
		$sth->execute(array($product->pid));
		return json_encode(1);
	}

	public function updateValue($product){
		$sth = $this->dbh->prepare("UPDATE products SET ". $product->field ."=? WHERE pid=?");
		$sth->execute(array($product->newvalue, $product->pid));
		return json_encode(1);
	}
}
?>
