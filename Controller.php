
<?php


//	include_once("models/User.php");
	include_once("models/Product.php");
	//	include_once("models/Sales.php");

//$users=new User("localhost","root","aq23ws","applestore");
$products=new Product("localhost","root","","store");
//$sales=new Sales("localhost","root","aq23ws","applestore");



if(!isset($_REQUEST['action'])) {
	print json_encode(0);
	return;
}

switch($_REQUEST['action']) {

	case 'get_products':
		print $products->getProducts();
	break;

	case 'add_product':

		$product = new stdClass;
		$product = json_decode($_REQUEST['product']);
		print $products->add($product);
	break;

	case 'delete_product':
		$product = new stdClass;
		$product = json_decode($_REQUEST['product']);
		print $products->delete($product);
	break;

	case 'update_product_field_data':
		$product = new stdClass;
		$product = json_decode($_REQUEST['product']);
		print $products->updateValue($product);
	break;




}

exit();
