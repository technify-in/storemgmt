<style>
.product_list{
  border:solid 1px lightgrey;

  padding: 10px;
  list-style:none;
}

</style>


<div class"pro" >

<ul>
  <li class="product_list" >

<input id="iphone_radio" class="change" type="radio" name="product" value="1" >iphone
<input id="accessory_radio" class="change" type="radio" name="product" value="0">accessory
  </li>

</ul>

</div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">

$(".change").change(function()
{
  hello();
}
)


function hello(){

    if($("#accessory_radio").is(":checked")){
      //////////////////////////////////////////
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
              var res=xmlhttp.responseText;

      //alert(res);
            }
          }
        xmlhttp.open("POST","search/listacc.php",true);
        xmlhttp.send();

      //  $("#iphone_radio").parent().html();





        }


      ////////////////////////////////////




    if($("#iphone_radio").is(":checked")){
          //////////////////////////////////////////
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



          str="<p>select model</p><select name='sku' id=\"sku_select\">";
          str+="<option>" + "none" +"</option>";
              $.each( res, function( key, value ) {
                //str+=( key + ": " + value[0] );

                str+="<option value=\"" + value[0] + "\">" + value[0] +"</option>";

              });
          str+="</select>";



              //alert(str);

              $("#iphone_radio").parent().html(str);

              $("#sku_select").change(
                function(obj){
                  //alert($("#sku_select").val());
                            //////////////////////////////////////////////////////////////
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



                            str="<p>sleect imei</p><select name='imei' id=\"imei_select\">";

                            str+="<option>" + "none" +"</option>";


                            $.each( res, function( key, value ) {
                              //str+=( key + ": " + value[0] );

                              str+="<option value=\"" + value[0] + "\">" + value[0] +"</option>";

                            });
                            str+="</select>";



                            //alert(str);

                            $("#sku_select").parent().html(str);

                            $("#imei_select").change(
                              function(obj){
                                //alert($("#imei_select").val());



                                        //////////////////////////////////////////////////////////////////

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



                                            str="";

                                              //str+=( key + ": " + value[0] );

                                              str+="<p>" + res[0]['name']+ "<input value=\""+ res[0][0] +"\" readonly /></p>";

                                            str+="";

                                            w=$("#imei_select").parent();
                                            w.html(str);

                                            str2=
                                            str2="  <li class=\"product_list\" >"+

                                            "<input id=\"iphone_radio\" class=\"change\" type=\"radio\" name=\"product\" value=\"1\" >iphone"+
                                            "<input id=\"accessory_radio\" class=\"change\" type=\"radio\" name=\"product\" value=\"0\">accessory" +
                                            "</li>";
                                            w.parent().append(str2);

                                            $(".change").change(function()
                                            {
                                              hello();
                                            }
                                            )




                                              }
                                        }
                                        xmlhttp.open("POST","search/get_phone.php?term="+$("#imei_select").val(),true);
                                        xmlhttp.send();
                                        //////////////////////////////////////////////////////////////////





                              }


                            );

                              }
                            }
                            xmlhttp.open("POST","search/listiphones_imei.php?term="+ $("#sku_select").val(),true);
                            xmlhttp.send();
                            //////////////////////////////////////////////////////////////




                }


              );

                }
              }
            xmlhttp.open("POST","search/listiphones.php?term=sku",true);
            xmlhttp.send();


            }


          ////////////////////////////////////

}

////////////////sku select//////////



////////////////////////////////////




</script>
