function getAll(){
	$.ajax({
		type: "GET",
		url: 'api/read.php',
		success: function(response)
		{
			var jsonData = JSON.parse(response);
			if (jsonData.success == "1")
			{
				$.each(jsonData, function(index, item) {
					$('.patients_list').appendChild('<li><div class="w-50"><span class="patient_id">'+index.id+'</span> - <span class="patient_name">'+index.name+'</span></div><button class="display_details" type="button" data-toggle="modal" data-target="#display_patient_details_modal">צפיה</button><button class="edit_details" type="button" data-toggle="modal" data-private="'+index.id+'" data-target="#edit_patient_details_modal">עריכה</button><button class="delete_details">מחיקה</button></li>');
				});
			}
			else
			{
				$('.patients_list').addClass('d-none');
				$('.result_message').addClass('d-block').text('בעיה בקריאת הנתונים');
			}
	   }
	});
}

function sendData(){
	$.ajax({
		type: "POST",
		url: 'api/update.php',
		data: $(this).serialize(),
		success: function(response)
		{
			var jsonData = JSON.parse(response);
			if (jsonData.success == "1")
			{
				$('.result_message').text('העדכון עבר בהצלחה');
			}
			else
			{
				$('.result_message').addClass('d-block').text('העדכון נכשל');
			}
	   }
   });
}

function getSingle(patient_id){
	$.ajax({
		type: "GET",
		url: 'api/single_read.php',
		data: patient_id,
		success: function(response)
		{
			var jsonData = JSON.parse(response);
			if (jsonData.success == "1")
			{
				return jsonData;
			}
			else
			{
				$('.patient_details').addClass('d-none');
				$('.result_message').addClass('d-block').text('בעיה בקריאת הנתונים');
			}
	   }
	});
}

$(document).ready(function() {
	getAll();
	
	$('#add_new_patient_modal').on('show.bs.modal', function (event) {
		$('#add_new_patient_form').submit(function(e) {
			e.preventDefault();
			sendData();
			getAll();
		});
	})
	
	$('#display_patient_details_modal').on('show.bs.modal', function (event) { 
		var patient_id = button.data('private'); // Extract id
		var details_json = getSingle(patient_id);
		
		$('.patient_details #d_name').text(details_json.name);
		$('.patient_details #d_id').text(details_json);
		$('.patient_details #d_address').text(details_json.address);
		$('.patient_details #d_phone').text(details_json.phone);
		$('.patient_details #d_mobile').text(details_json.mobile);
		$('.patient_details #d_b_date').text(details_json.birth_date);
		$('.patient_details #d_vaccine_1').text(details_json.vaccine_1);
		$('.patient_details #d_vaccine_2').text(details_json.vaccine_2);
		$('.patient_details #d_vaccine_3').text(details_json.vaccine_3);
		$('.patient_details #d_vaccine_4').text(details_json.vaccine_4);
		$('.patient_details #d_vaccine_1_comp').text(details_json.vaccine_1_comp);
		$('.patient_details #d_vaccine_2_comp').text(details_json.vaccine_2_comp);
		$('.patient_details #d_vaccine_3_comp').text(details_json.vaccine_3_comp);
		$('.patient_details #d_vaccine_4_comp').text(details_json.vaccine_4_comp);
		$('.patient_details #d_positive').text(details_json.positive_date);
		$('.patient_details #d_negative').text(details_json.negative_date);
	})
	
	$('#edit_patient_details_modal').on('show.bs.modal', function (event) {
		var patient_id = button.data('private'); // Extract id
		var details_json = getSingle(patient_id);
		
		var form = $(this).find('form#add_new_patient_form');
		form.find('input[name="patient_name"]').val(details_json.name);
		form.find('input[name="patient_id"]').val(details_json.id);
		form.find('input[name="patient_address"]').val(details_json.address);
		form.find('input[name="patient_bdate"]').val(details_json.birth_date);
		form.find('input[name="patient_phone"]').val(details_json.phone);
		form.find('input[name="patient_mobile"]').val(details_json.mobile);
		form.find('input[name="vaccin_1"]').val(details_json.vaccin_1);
		form.find('input[name="vaccin_2"]').val(details_json.vaccin_2);
		form.find('input[name="vaccin_3"]').val(details_json.vaccin_3);
		form.find('input[name="vaccin_4"]').val(details_json.vaccin_4);
		form.find('select[name="vaccine_1_comp"]').val(details_json.vaccine_1_comp);
		form.find('select[name="vaccine_2_comp"]').val(details_json.vaccine_2_comp);
		form.find('select[name="vaccine_3_comp"]').val(details_json.vaccine_3_comp);
		form.find('select[name="vaccine_4_comp"]').val(details_json.vaccine_4_comp);
		form.find('input[name="positive_date"]').val(details_json.positive_date);
		form.find('input[name="negative_date"]').val(details_json.negative_date);
		
		getAll();
	})
	
	$(document).on("click",".delete_details",function() {
		var patient_id = $(this).data('private');
			$.ajax({
			type: "POST",
			url: 'api/delete.php',
			data: patient_id,
			success: function(response)
			{
				var jsonData = JSON.parse(response);
				if (jsonData.success == "1")
				{
					$(this).closest('li').remove();
				}
				else
				{
					alert('המחיקה לא בוצעה בהצלחה');
				}
		   }
		});
	});
	
	
});
