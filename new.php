<style>
.lft{
  float:left;
  width:100px;

}
.rgt{

}


</style>


<form action="add.php" method="GET">

  <h3>PRODUCT</h3>
  <div class="lft" >product name</div>
<div class="rgt"><input name="name" type='text' class="name" ></div><br>
<div class="lft" >sku</div>
<div class="rgt"><input name="sku" type='text' class="sku" ></div><br>
  <div class="lft">imei</div>
  <div class="rgt" > <input name="imei" type='text' class="imei"></div><br>
  <div class="lft">s no</div>
  <div class="rgt"><input name="sno" type='text' class="sno" ></div><br>
  <div class="lft">dp</div>
  <div class="rgt"><input name="dp" type='text' class="dp" ></div><br>
  <div class="lft">vat</div>
  <div class="rgt"><input name="vat" type='text' class="vat"></div><br>
  <div class="lft">price</div>
  <div class="rgt"><input name="mrp" type='text' class="mrp"></div><br>
  <div class="lft">quantity</div>
  <div class="rgt"><input name="qty" type='text' class="qty"></div><br>

<h3>VAT INVOICE</h3>
<div class="lft">tax_ivoice no</div>
<div class="rgt"><input name="tiv" class="tiv"></div><br>
<div class="lft">date</div>
<div class="rgt"><input name="dat" class="dat" ></div><br>
<div class="lft">seller</div>
<div class="rgt"><input name="seller" class="seller" ></div><br>

<input type="submit">


</form>



<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {

	//autocomplete
  $(".name").autocomplete({
		source: "search/name.php",
		minLength: 1
	});

  $(".sku").autocomplete({
		source: "search/sku.php",
		minLength: 1
	});

  $(".sno").autocomplete({
		source: "search/sno.php",
		minLength: 1
	});

  $(".dp").autocomplete({
  		source: "search/dp.php",
  		minLength: 1
  	});

  $(".vat").autocomplete({
    		source: "search/vat.php",
    		minLength: 1
    	});
  $(".mrp").autocomplete({
      		source: "search/mrp.php",
      		minLength: 1
      	});

  $(".imei").autocomplete({
        		source: "search/imei.php",
        		minLength: 1
        	});


          $(".tiv").change(

            function(){

              var xmlhttp;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                  var res=JSON.parse(xmlhttp.responseText);

                $(".dat").val(res[0][0]);
                $(".seller").val(res[0][1]);
                }
              }
            xmlhttp.open("POST","search/tiv.php?term="+$(".tiv").val(),true);
            xmlhttp.send();


            }



          );






});



</script>
