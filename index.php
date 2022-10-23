<!DOCTYPE html>
<html lang="he" dir="rtl" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
		<meta charset="utf-8" />
		<title>ניהול נתוני התחלואה בקורונה</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="script.js"></script>
		<style>

			body{
				font-family: system-ui;
			}
			.main{
				max-width: 1024px;
				margin: auto;
				padding-top: 40px;
			}
			header{
				display: flex;
				align-items: center;
				justify-content: space-between;
				height: 120px;
				padding: 0 50px;
				background: #eee;
			}
			.patients_list{
				list-style: none;
			}
			.patients_list li{
				padding: 5px 15px;
				min-width: 45px;
				margin: auto;
				display: flex;
				justify-content: space-between;
				width: 50%;
			}
			.patients_list li:nth-child(even){
				background: #fff;
			}
			.patients_list li:nth-child(odd){
				background: #eee;
			}
			#add_new_patient_form label, #add_new_patient_form input{
				display: block;
			}
			#add_new_patient_form button[type="submit"]{
				margin-top: 25px;
				width: 100px;
				height: 40px;
				float: left;
			}
			.mr-3{
				margin-right: 15px;
			}
			
		</style>
	</head>
	<body dir="rtl">
		<header>
			<h1>מערכת ניהול נתוני התחלואה בקורונה</h1>
			<button class="add_new_patient" type="button" data-toggle="modal" data-target="#add_new_patient_modal">רישום משתמש חדש</button>
		</header>
		<div class="main">
			<span class="d-none result_message"></span>
			<ul class="patients_list">
				<li>
					<div class="w-50">
						<span class="patient_id">226332521</span>
						-
						<span class="patient_name">מרגלית אזולאי</span>
					</div>
					<button class="display_details" type="button" data-toggle="modal" data-private="226332521" data-target="#display_patient_details_modal">צפיה</button>
					<button class="edit_details" type="button" data-toggle="modal" data-private="226332521" data-target="#edit_patient_details_modal">עריכה</button>
					<button class="delete_details ">מחיקה</button>
				</li>
				<li>
					<div class="w-50">
						<span class="patient_id">223665842</span>
						-
						<span class="patient_name">אדיר לוי</span>
					</div>
					<button class="display_details" type="button" data-toggle="modal" data-private="223665842" data-target="#display_patient_details_modal">צפיה</button>
					<button class="edit_details" type="button" data-toggle="modal" data-private="223665842" data-target="#edit_patient_details_modal">עריכה</button>
					<button class="delete_details">מחיקה</button>
				</li>
				<li>
					<div class="w-50">
						<span class="patient_id">203368547</span>
						-
						<span class="patient_name">אביב שטרית</span>
					</div>
					<button class="display_details" type="button" data-toggle="modal" data-private="203368547" data-target="#display_patient_details_modal">צפיה</button>
					<button class="edit_details" type="button" data-toggle="modal" data-private="203368547" data-target="#edit_patient_details_modal">עריכה</button>
					<button class="delete_details">מחיקה</button>
				</li>
				<li>
					<div class="w-50">
						<span class="patient_id">336521458</span>
						-
						<span class="patient_name">שירה גרין</span>
					</div>
					<button class="display_details" type="button" data-toggle="modal" data-private="336521458" data-target="#display_patient_details_modal">צפיה</button>
					<button class="edit_details" type="button" data-toggle="modal" data-private="336521458" data-target="#edit_patient_details_modal">עריכה</button>
					<button class="delete_details">מחיקה</button>
				</li>
			</ul>
		</div>
		
		
	</body>

<!-- Modal Add new-->
<div class="modal fade" id="add_new_patient_modal" tabindex="-1" role="dialog" aria-labelledby="add_new_patient_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' id="add_new_patient_form">
			<h4 class="text-center">פרטים אישיים:</h4>
			<label>שם מלא:</label>
			<input type='text' name='patient_name' />
			<label>ת.ז:</label>
			<input type='text' name='patient_id' />
			<label>כתובת:</label>
			<input type='text' name='patient_address' />
			<label>תאריך לידה:</label>
			<input type='text' name='patient_bdate' />
			<label>טלפון:</label>
			<input type='text' name='patient_phone' />
			<label>נייד:</label>
			<input type='text' name='patient_mobile' />
			
			<h4 class="mt-3 text-center">פרטי התחסנות:</h4>
			<div class="d-flex mb-2">
				<div>
					<label>חיסון ראשון:</label>
					<input type='date' name='vaccin_1' />
				</div>
				<div class="mr-3">
					<label for="vaccine_company">יצרנית החיסון:</label>
					<select name="vaccine_1_comp" id="vaccine_1_comp">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון שני:</label>
					<input type='date' name='vaccine_2' />
				</div>
				<div class="mr-3">
					<label for="vaccine_company">יצרנית החיסון:</label>
					<select name="vaccine_2_comp" id="vaccine_2_comp">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון שלישי:</label>
					<input type='date' name='vaccine_3' />
				</div>
				<div class="mr-3">
					<label for="vaccine_company">יצרנית החיסון:</label>
					<select name="vaccine_3_comp" id="vaccine_3_comp">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון רביעי:</label>
					<input type='date' name='vaccine_4' />
				</div>
				<div class="mr-3">
					<label for="vaccine_company">יצרנית החיסון:</label>
					<select name="vaccine_4_comp" id="vaccine_4_comp">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>

			<div class="mb-2">
				<label>מועד קבלת תוצאה חיובית:</label>
				<input type='date' name='positive_date' />
			</div>
			<div class="mb-2">
				<label>מועד החלמה:</label>
				<input type='date' name='negative_date' />
			</div>
			
			<button type='submit'>הוספה</button>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Display-->
<div class="modal fade" id="display_patient_details_modal" tabindex="-1" role="dialog" aria-labelledby="display_patient_details_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<span class="d-none result_message"></span>
			<div class="patient_details">
				<h4 class="text-center">פרטים אישיים:</h4>
				<label>שם מלא:</label>
				<span id="d_name"></span>
				<label>ת.ז:</label>
				<span id="d_id"></span>
				<label>כתובת:</label>
				<span id="d_address"></span>
				<label>תאריך לידה:</label>
				<span id="d_b_date"></span>
				<label>טלפון:</label>
				<span id="d_phone"></span>
				<label>נייד:</label>
				<span id="d_mobile"></span>
				<h4 class="mt-3 text-center">פרטי התחסנות:</h4>
				<div class="d-flex">
					<div>
						<label>חיסון ראשון:</label>
						<span id="d_vaccine_1"></span>
					</div>
					<div class="mr-3">
						<label>יצרנית החיסון:</label>
						<span id="d_vaccine_1_comp"></span>
					</div>
				</div>
				
				<div class="d-flex">
					<div>
						<label>חיסון שני:</label>
						<span id="d_vaccine_2"></span>
					</div>
					<div class="mr-3">
						<label>יצרנית החיסון:</label>
						<span id="d_vaccine_2_comp"></span>
					</div>
				</div>
				
				<div class="d-flex">
					<div>
						<label>חיסון שלישי:</label>
						<span id="d_vaccine_3"></span>
					</div>
					<div class="mr-3">
						<label>יצרנית החיסון:</label>
						<span id="d_vaccine_3_comp"></span>
					</div>
				</div>
				
				<div class="d-flex">
					<div>
						<label>חיסון רביעי:</label>
						<span id="d_vaccine_4"></span>
					</div>
					<div class="mr-3">
						<label>יצרנית החיסון:</label>
						<span id="d_vaccine_4_comp"></span>
					</div>
				</div>
				<div>
					<label>מועד קבלת תוצאה חיובית:</label>
					<span id="d_positive"></span>
				</div>
				<div>
					<label>מועד החלמה:</label>
					<span id="d_negative"></span>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="edit_patient_details_modal" tabindex="-1" role="dialog" aria-labelledby="edit_patient_details_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' id="add_new_patient_form">
			<h4 class="text-center">פרטים אישיים:</h4>
			<label>שם מלא:</label>
			<input type='text' name='patient_name' />
			<label>ת.ז:</label>
			<input type='text' name='patient_id' />
			<label>כתובת:</label>
			<input type='text' name='patient_address' />
			<label>תאריך לידה:</label>
			<input type='text' name='patient_bdate' />
			<label>טלפון:</label>
			<input type='text' name='patient_phone' />
			<label>נייד:</label>
			<input type='text' name='patient_mobile' />
			
			<h4 class="mt-3 text-center">פרטי התחסנות:</h4>
			<div class="d-flex mb-2">
				<div>
					<label>חיסון ראשון:</label>
					<input type='date' name='vaccin_1' />
				</div>
				<div class="mr-3">
					<label for="vaccine_companies">יצרנית החיסון:</label>
					<select name="vaccine_companies" id="vaccine_companies">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון שני:</label>
					<input type='date' name='vaccine_2' />
				</div>
				<div class="mr-3">
					<label for="vaccine_companies">יצרנית החיסון:</label>
					<select name="vaccine_companies" id="vaccine_companies">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון שלישי:</label>
					<input type='date' name='vaccine_3' />
				</div>
				<div class="mr-3">
					<label for="vaccine_companies">יצרנית החיסון:</label>
					<select name="vaccine_companies" id="vaccine_companies">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>
			
			<div class="d-flex mb-2">
				<div>
					<label>חיסון רביעי:</label>
					<input type='date' name='vaccine_4' />
				</div>
				<div class="mr-3">
					<label for="vaccine_companies">יצרנית החיסון:</label>
					<select name="vaccine_companies" id="vaccine_companies">
						<option value="pfizer">פייזר</option>
						<option value="moderna">מודרנה</option>
					</select>
				</div>
			</div>

			<div class="mb-2">
				<label>מועד קבלת תוצאה חיובית:</label>
				<input type='date' name='positive_date' />
			</div>
			<div>
				<label>מועד החלמה:</label>
				<input type='date' name='negative_date' />
			</div>
			<span class="d-none result_message"></span>
			<button type='submit'>עדכון</button>
		</form>
      </div>
    </div>
  </div>
</div>

</html>


