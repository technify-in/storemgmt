<?php
require('connect.php');

print_r($_REQUEST);


if( (isset($_REQUEST['sku']) && isset($_REQUEST['imei']) && isset($_REQUEST['sno'])) &&  (isset($_REQUEST['name']) && isset($_REQUEST['vat']) && isset($_REQUEST['dp'])) && (isset($_REQUEST['mrp']) && isset($_REQUEST['tiv']) && isset( $_REQUEST['dat']) && $_REQUEST['seller'] ) )
{

$qry2="SELECT * FROM `vbill` WHERE `vat_bill_id`=$_REQUEST[tiv]";

$result = mysql_query($qry2) or die(mysql_error());

if(result){
  if (mysql_num_rows($result)!=1){
    print "adding";

    $qry2="INSERT INTO `store`.`vbill` (`vid`, `vat_bill_id`, `bill_date`, `xyz1`)".
    " VALUES ('$_REQUEST[seller]', '$_REQUEST[tiv]',  '$_REQUEST[dat]' , '23');";

    $result = mysql_query($qry2) or die(mysql_error());

    if($result){

      print"done";

      $qry="INSERT INTO `store`.`products`".
      " (`sku`, `imei`, `sno`, `pid`, `name`, `tax`, `dp`, `mrp`, `vat_bill_id`, `p_condition`, `siv`, `qty`)".
      " VALUES ('$_REQUEST[sku]', '$_REQUEST[imei]', '$_REQUEST[sno]', NULL, '$_REQUEST[name]', '$_REQUEST[vat]', '$_REQUEST[dp]', '$_REQUEST[mrp]', '$_REQUEST[tiv]', '$_REQUEST[con]', '0', '$_REQUEST[qty]');";


      $result = mysql_query($qry) or die(mysql_error());

      if($result){
        header('Location: dashboard.php?msg=product added');
      }

    }

  }
  else{
    print "added";
    $qry="INSERT INTO `store`.`products`".
    " (`sku`, `imei`, `sno`, `pid`, `name`, `tax`, `dp`, `mrp`, `vat_bill_id`, `p_condition`, `siv`, `qty`)".
    " VALUES ('$_REQUEST[sku]', '$_REQUEST[imei]', '$_REQUEST[sno]', NULL, '$_REQUEST[name]', '$_REQUEST[vat]', '$_REQUEST[dp]', '$_REQUEST[mrp]', '$_REQUEST[tiv]', '$_REQUEST[con]', '0', '$_REQUEST[qty]');";


    $result = mysql_query($qry) or die(mysql_error());

    if($result){
      header('Location: dashboard.php?msg=product added');
    }


  }

}
else{
  header('Location: dashboard.php?msg=error adding product');
}

//$result = mysql_query($qry) or die(mysql_error());
  //if($result){
  //
//  }
//  else{
  //
  //  }


}



?>
