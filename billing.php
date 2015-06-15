<meta charset="UTF-8">
<?php  //Start the Session
session_start();
require('connect.php');

?>
<style >

.logoimg{
  width:197px;
  height:66px;
  position:relative;
  left:120px;
}

.logo{
  width:197px;
  height:66px;
  margin-left: auto;
  margin-right: auto;

}


.bill{
  border:1px solid;
  height:500px;
  width:800px;
  margin:auto;
}


.contact_details{
  float:right;
  margin:30px;
  font-size:10px;
  width:130px;
}

.tech_support{
  float:left;
  margin:30px;
  font-size:10px;
  width:130px;
}

.rulr{
  margin: 0px 30px 20px 30px;
}


.left_margin{
  margin-bottom: 0px;
  margin-left: 30px;
}


td{
  padding:0px 20px 0px 20px;
}

table{
  margin-left:10px;
  font-size:10px;

}

.bottom{
  font-size:12px;
  margin-top:30px;
}

.last_line{
  border:1px solid;
}

</style>






<div class="bill">
  <div class="top">

    <div class="tech_support">
      <span>Tech Support : 1800 425 0744<span>
    </div>


      <img class="logoimg" src="images/logo.png">


    <div class="contact_details">
      <span>Contact Sales : 1800 425 4646<span>
    </div>

  </div>


  <div class="invoice">
    <p class="left_margin">Invoice Information</p>
    <hr class="rulr"/>

    <table>
      <tr>
        <td>
          Invoice No. :
        </td>
        <td>
          1664
        </td>

        <td>
          Payment Mode :
        </td>

        <td>
          Bajaj Finance
        </td>

        <td>
          Saturday ,31 January 2015 5:20 pm
        </td>
      </tr>
    </table>


  </div>


  <div class="customer">
    <p class="left_margin">Customer Information</p>
    <hr class="rulr"/>
    <table>
      <tr>
        <td>
          Sold To:
        </td>
        <td>
          RAJINDER KAUR
        </td>

        <td>
          Contact No :
        </td>

        <td>
          +918558873781
        </td>

        <td>
          Email :
        </td>
        <td>
          -NA-
        </td>
      </tr>
    </table>

  </div>


  <div class="products">
    <p class="left_margin">Products</p>
    <hr class="rulr"/>
    <table>
      <tr>
        <td>
          Product Name
        </td>

        <td>
          SKU/IMEI
        </td>

        <td>
          Serial No.
        </td>

        <td>
          Base Price
        </td>
        <td>
          VAT
        </td>
        <td>
          Price
        </td>
      </tr>
      <tr>
        <td>
          <input val="IPHONE 4S, BLACK ,8GB">
                </td>

        <td>
          013598002313722
        </td>

        <td>
          SDX6NCQDKFML6
        </td>

        <td>
          ₹ 	28,806.58
        </td>
        <td>
          8.500%
        </td>
        <td>
          ₹ 	31,500.00
        </td>
      </tr>

<tr>
</tr>

<tr>
</tr>
<tr>
</tr>

<tr>
  <td>
    TIN : 03152116947
            </td>

  <td>
  </td>

  <td>
  </td>

  <td>
  </td>
  <td class="last_line">
    Tax
    </td>
  <td class="last_line">
    ₹ 	2,693.42
  </td>
</tr>



<tr >
  <td>
            </td>

  <td>
  </td>

  <td>
  </td>

  <td>
  </td>
  <td class="last_line">
    G. Total
    </td>
  <td class="last_line">
    ₹ 	31,500.00
    </td>
</tr>



    </table>

  </div>




  <div class="bottom">
    <center><span>Transaction Fee : 1% on Debit Cards | 2% on Credit Cards | 2.5% on International Credit Cards</span></center>
    <center><span>Input Tax Credit is not available on this invoice | All disputes shall be subject to the jurisdiction of Patiala courts only | No Returns Accepted</span></center>
    <center><span>Purple Scratch iStore | SCO 90, New Leela Bhavan, Patiala 147001 Punjab | Ph: +91 175 222 5 666, +91 99 88 979 979</span></center>

  </div>


</div>
