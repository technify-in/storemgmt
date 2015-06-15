$(function() {
	getProductList(0);
	$(document).on("click", "a#product_list", function(){ getProductList(this); });
	$(document).on("click", "a#create_product_form", function(){ getProductCreateForm(this); });
	$(document).on("click", "button#add_product", function(){ addProduct(this); });
	$(document).on("click", "a.pdelete_confirm", function(){ pdeleteConfirmation(this); });
	$(document).on("click", "button.pdelete", function(){ deleteProduct(this); });
	$(document).on("dblclick", "td.pedit", function(){ pmakepeditable(this); });
	$(document).on("blur", "input#ppeditbox", function(){ premovepeditable(this) });
	$(document).on("blur", "select#ppeditbox", function(){ premovepeditable(this) });
});

function premovepeditable(element) {

	$('#indicator').show();

	var Product = new Object();
	Product.pid = $('td.current').attr('product_pid');
	Product.field = $('td.current').attr('field');
	Product.newvalue = $(element).val();

	var productJson = JSON.stringify(Product);

	$.post('Controller.php',
		{
			action: 'update_product_field_data',
			product: productJson
		},
		function(data, textStatus) {
			$('td.current').html($(element).val());
			$('.current').removeClass('current');
			$('#indicator').hide();
		},
		"json"
	);
}

function pmakepeditable(element) {
	if($(element).attr("field") == "purchaseDate")
	{

		$(element).html('<input id="ppeditbox" size="'+  $(element).text().length +'" type="date" value="'+ $(element).text() +'">');
		$('#ppeditbox').focus();
		$(element).addClass('current');
	}
	else if($(element).attr("field") == "type"){

		$(element).html('<select id="ppeditbox" size="'+  $(element).text().length +'"  value="'+ $(element).text() +'">'	+ '<option value="voice">voice</option>' +	'<option value="nonVoice" selected>nonVoice</option>' +	'<option value="other">other</option>' + '</select>'	);
		$('#ppeditbox').focus();
		$(element).addClass('current');
	}
		else if($(element).attr("field") == "costPrice"){

	var str =  $(element).text();
	str = str.replace( /^\D+/g, '');


  $(element).html('<input id="ppeditbox" size="'+  $(element).text().length +'" type="text" value="'+ str +'">');
                $('#ppeditbox').focus();
                $(element).addClass('current');

}
	else{

		$(element).html('<input id="ppeditbox" size="'+  $(element).text().length +'" type="text" value="'+ $(element).text() +'">');
		$('#ppeditbox').focus();
		$(element).addClass('current');
	}


}

function pdeleteConfirmation(element) {
	$("#pdelete_confirm_modal").modal("show");
	$("#pdelete_confirm_modal input#product_pid").val($(element).attr('product_pid'));
}

function deleteProduct(element) {

	var Product = new Object();
	Product.pid = $("#pdelete_confirm_modal input#product_pid").val();

	var productJson = JSON.stringify(Product);

	$.post('Controller.php',
		{
			action: 'delete_product',
			product: productJson
		},
		function(data, textStatus) {
			getProductList(element);
			$("#pdelete_confirm_modal").modal("hide");
		},
		"json"
	);
}

function getProductList(element) {

	$('#indicator').show();

	$.post('Controller.php',
		{
			action: 'get_products'
		},
		function(data, textStatus) {
			renderProductList(data);
			$('#indicator').hide();
		},
		"json"
	);
}

function renderProductList(jsonData) {

	var table = '<table id="mytable" width="600" cellpadding="5" class="table table-hover table-bordered tablesorter"><thead>'+
	'<tr><th scope="col">sku</th>'+
	'<th scope="col">imei</th>'+
	'<th scope="col">sno</th>'+
	'<th scope="col">pid</th>'+
	'<th scope="col">name</th>'+
	'<th scope="col">tax</th>'+
	'<th scope="col">dp</th>'+
	'<th scope="col">mrp</th>'+
	'<th scope="col">v_bill_id</th>'+
	'<th scope="col">condition</th>'+
	'<th scope="col">siv</th>'+
	'</tr></thead>   <tfoot><tr>'+
	'<tr><th scope="col">sku</th>'+
	'<th scope="col">imei</th>'+
	'<th scope="col">sno</th>'+
	'<th scope="col">pid</th>'+
	'<th scope="col">name</th>'+
	'<th scope="col">tax</th>'+
	'<th scope="col">dp</th>'+
	'<th scope="col">mrp</th>'+
	'<th scope="col">v_bill_id</th>'+
	'<th scope="col">condition</th>'+
	'<th scope="col">siv</th>'+
	'</tr></tfoot><tbody>';

	$.each( jsonData, function( index, product){
		table += '<tr>';
		table += '<td class="pedit" field="sku" product_pid="'+product.pid+'">'+product.sku+'</td>';
		table += '<td class="pedit" field="imei" product_pid="'+product.pid+'">'+product.imei+'</td>';
		table += '<td class="pedit" field="sno" product_pid="'+product.pid+'">'+product.sno+'</td>';
		table += '<td class="pedit" field="pid" product_pid="'+product.pid+'">'+product.pid+'</td>';
		table += '<td class="pedit" field="name" product_pid="'+product.pid+'">'+product.name+'</td>';
		table += '<td class="pedit" field="tax" product_pid="'+product.pid+'">'+product.tax+'</td>';
		table += '<td class="pedit" field="dp" product_pid=" ₹'+product.pid+'">'+product.dp+'</td>';
		table += '<td class="pedit" field="mrp" product_pid=" '+product.pid+'">'+product.mrp +'</td>';
		table += '<td class="pedit" field="vat_bill_id" product_pid="'+product.pid+'">'+product.vat_bill_id+'</td>';
		table += '<td class="pedit" field="p_condition" product_pid="'+product.pid+'">'+product.p_condition+'</td>';
		table += '<td class="pedit" field="siv" product_pid="'+product.pid+'">'+product.siv+'</td>';


		table += '</tr>';


    });

	table += '</tbody></table><div id="pager"></div>';




	$('div#content').html(table);

	mytable = $("#mytable").dataTable()




}

function addProduct(element) {

	$('#indicator').show();

	var Product = new Object();
	Product.name = $('input#name').val();
	Product.type = $('select#type').val();
		Product.sno = $('input#sno').val();
	Product.sku = $('input#sku').val();
	Product.imei = $('input#imei').val();
	Product.invoiceNo = $('input#invoiceNo').val();
	Product.costPrice = $('input#costPrice').val();
	Product.did = $('input#did').val();
	Product.distributorPrice = $('input#distributorPrice').val();
	Product.dateAvailable = $('input#dateAvailable').val();
	Product.purchaseDate = $('input#purchaseDate').val();

	var productJson = JSON.stringify(Product);

	$.post('Controller.php',
		{
			action: 'add_product',
			product: productJson
		},
		function(data, textStatus) {
			getProductList(element);
			$('#indicator').hide();
		},
		"json"
	);
}

function getProductCreateForm(element) {
	var form = '<div class="input-prepend">';
		form +=	'<span class="add-on"><i class="icon-product icon-black"></i> Name</span>';
		form +=	'<input type="text" id="name" name="name" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class="icon-product icon-black"></i> type</span>';
		form +=	'<select id="type" name="type" class="input-xlarge" >';
		form += '<option value="voice">voice</option>' ;
		form +=	'<option value="nonVoice" selected>nonVoice</option>';
		form +=	'<option value="other">other</option>' ;
		form +=	'</select>' ;

		form +=	'</div><br/><br/>';


			form +=	'<div class="input-prepend">';
			form +=	'<span class="add-on"><i class=" icon-black"></i>sno</span>';
			form +=	'<input type="text" id="sno" name="sno" value="" class="input-xlarge" required />';
			form +=	'</div><br/><br/>';


		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i> sku</span>';
		form +=	'<input type="text" id="sku" name="sku" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i>imei</span>';
		form +=	'<input type="text" id="imei" name="imei" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i> invoiceNo</span>';
		form +=	'<input type="text" id="invoiceNo" name="invoiceNo" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i> costPrice</span>';
		form +=	'<input type="text" id="costPrice" name="costPrice" value="" class="input-xlarge" required />';

		form +=	'</div><br/><br/>';
		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i> distribId</span>';
		form +=	'<input type="text" id="did" name="did" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

			form +=	'<div class="input-prepend">';
			form +=	'<span class="add-on"><i class=" icon-black"></i>distribPrice</span>';
			form +=	'<input type="text" id="distributorPrice" name="distributorPrice" value="" class="input-xlarge" required />';
			form +=	'</div><br/><br/>';

		form +=	'<div class="input-prepend">';
		form +=	'<span class="add-on"><i class=" icon-black"></i>purDate</span>';
		form +=	'<input type="date" id="purchaseDate" name="purchaseDate" value="" class="input-xlarge" required />';
		form +=	'</div><br/><br/>';

			form +=	'<div class="input-prepend">';
			form +=	'<span class="add-on"><i class=" icon-black"></i>dateAvail</span>';
			form +=	'<input type="date" id="dateAvailable" name="dateAvailable" value="" class="input-xlarge" required />';
			form +=	'</div><br/><br/>';


		form +=	'<div class="control-group">';
		form +=	'<div class="">';
		form +=	'<button type="button" id="add_product" class="btn btn-primary"><i class="icon-ok icon-white"></i> Add Product</button>';
		form +=	'</div>';
		form +=	'</div>';









		$('div#content').html(form);
}
