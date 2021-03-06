<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<!-- <link rel="stylesheet" type="text/css" href="/css/formstyle.css"> -->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/styleform.css">


	<script>
	  $(document).ready(function () {
	    load();
	});

	function load() {
	    //alert("Working...");
	    $("#txtNoOfRec").focus();

	    $("#btnNoOfRec").click(function () {
	        $("#AddControll").empty();
	        var NoOfRec = $("#txtNoOfRec").val();

	        //alert("" + NoOfRec);

	        if (NoOfRec > 0) {
	            createControll(NoOfRec);
	        }
	    });    
	}

	function createControll(NoOfRec) {
	    var tbl = "";
	    var member_number = 0;
	    var age_number = 0;


	    tbl = "<table class='table table-bordered table-hover'>"+
	                "<tr>"+
	                    "<th> S.No </th>"+
	                    "<th>  Name </th>"+
	                    "<th> Age </th>"+
	                "</tr>";

	    for (i = 1; i <= NoOfRec; i++,member_number++,age_number++) {

	        tbl += "<tr>" +
	                    "<td>" + i + "</td>" +

	                    "<td>"+
	                        "<input type='text' style = 'width:100%' id='txtFName' placeholder='Name' name = member_number[]  required autofocus />"+
	                    "</td>"+

	                    "<td>"+
	                        "<input type='number' id='txtLName' style = 'width:100%'placeholder='Age' name = age_number[] required/>"+
	                    "</td>"+

	                "</tr>";
	    }
	    tbl += "</table>";

	    $("#AddControll").append(tbl);
	}

	</script>
</head>
<body>


<div class = "heading">  
  <center>  <h1>Ration Card Renewal Form</h1> </center>
  <center>  <h3>Mandatory fields are marked by <span class="required">*</span></h3> </center>  
  <hr> 
  </div>
<div class="container">
  <form action ="/action" method = "POST" enctype = "multipart/form-data" autocomplete = "off">
  @csrf
  	<fieldset class="f1">

  		<legend>Registration Info</legend>

	    <div class="row">
	      <div class="col-25">
	        <label >Registration Number:</label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name="register_no"  placeholder="Enter registration number" value ="{{old('register_no')}}" >
			<span style = "color:red" >@error('register_no') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Ration Card Number: </label><span class="required" >*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name="ration_no" placeholder="Enter Ration card number" value ="{{old('ration_no')}}">
			<span style = "color:red" >@error('ration_no') {{$message}} @enderror</span>
	      </div>
	    </div>

	</fieldset>

	<fieldset>
		<legend>Address Info</legend>

		<div class="row">
	      <div class="col-25">
	        <label >Adress Door Number : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name="door_no" placeholder="Enter door no" value ="{{old('door_no')}}">
			<span style = "color:red" >@error('door_no') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Adress Sub Locality 1 : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "sub_locality1" placeholder="Enter locality" value ="{{old('sub_locality1')}}">
			<span style = "color:red" >@error('sub_locality1') {{$message}} @enderror</span>
	      </div> 
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label >Adress Sub Locality 2 : </label>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "sub_locality2" placeholder="Enter locality 2">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Address- Ward Number : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "ward_door_no" placeholder= "6-digit" value ="{{old('ward_door_no')}}">
			<span style = "color:red" >@error('ward_door_no') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Address- Location : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "address_location"  placeholder="Enter location" value ="{{old('address_location')}}">
			<span style = "color:red" >@error('address_location') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Pin Code : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "pin_code"  placeholder="Enter pin code" value ="{{old('pin_code')}}">
			<span style = "color:red" >@error('pin_code') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Police Station : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "police_station"  placeholder="Enter police station" value ="{{old('police_station')}}">
			<span style = "color:red" >@error('police_station') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Residing Period of Above Address : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "residing_period" placeholder="Please enter in years" value ="{{old('residing_period')}}">
			<span style = "color:red" >@error('residing_period') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Post Office : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "post_office"  placeholder="Enter post office" value ="{{old('post_office')}}">
			<span style = "color:red" >@error('post_office') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Select Sub-District : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <select name = "sub_district" required>  
	        <option value="">None</option>
	        <option value="Aibawk">Aibawk</option>  
	        <option value="Bilkhawthlir">Bilkhawthlir</option>  
	        <option value="Champhai">Champhai</option>  
	        <option value="Chawngte">Chawngte</option>  
	        <option value="Darlawn">Darlawn</option>  
	        <option value="East Lungdar">East Lungdar </option>  
	        <option value="East Lungdar (Pt)">East Lungdar (Pt)</option>

	        <option value="Hnahthial">Hnahthial</option>  
	        <option value="Khawbung">Khawbung</option>  
	        <option value="Khawzawl">Khawzawl</option>  
	        <option value="Lawngtlai">Lawngtlai</option>  
	        <option value="Lunglei">Lunglei </option>  
	        <option value="Lungsen">Lungsen </option> 

	        <option value="Hnahthial">Hnahthial</option>  
	        <option value="Khawbung">Khawbung</option>  
	        <option value="Khawzawl">Khawzawl</option>  
	        <option value="Lawngtlai">Lawngtlai</option>  
	        <option value="Lunglei">Lunglei </option>  
	        <option value="Lungsen">Lungsen </option> 

      		</select>    
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Select District  : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <select name = "state" required>  
		      <option value="">None</option>
		      <option value="Aizawl">Aizawl</option>  
		      <option value="Kolasib">Kolasib</option>  
		      <option value="Champhai">Champhai</option>  
		      <option value="Lawngtlai">Lawngtlai</option>  
		      <option value="Mamit">Mamit</option>  
		      <option value="Saiha">Saiha </option>  
		      <option value="Serchhip">Serchhip</option>
		      <option value="Lunglei">Lunglei</option>
		    </select>  
	      </div>
	    </div>

	

	    <div class="row">
	      <div class="col-25">
	        <label>Gender : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	       <select name = "gender" required > 
			  <option value="">None</option> 
		      <option value="male" {{ old('gender') == "male" ? 'selected' : ''}}>Male</option>  
		      <option value="female" {{ old('gender') == "female" ? 'selected' : ''}}>Female</option>  
		      <option value="other" {{ old('gender') == "other" ? 'selected' : ''}}>Other</option>  
		    </select>
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Religion : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
			 <select required name = "religion">  
				<option value="">None</option> 
			    <option value="Christian" {{ old('religion') == "Christian" ? 'selected' : ''}}>Christian</option>  
			    <option value="Islam" {{ old('religion') == "Islam" ? 'selected' : ''}}>Islam</option>  
			    <option value="Hindu" {{ old('religion') == "Hindu" ? 'selected' : ''}}>Hindu</option>
			    <option value="Other" {{ old('religion') == "Other" ? 'selected' : ''}}>Other</option>

			  </select>
  	      </div>
	    </div>
	    
	</fieldset>

	<fieldset>
		<legend>Family Info</legend>

		<div class="row">
	      <div class="col-25">
	        <label>Name of Head of the Family : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "family_head"  placeholder="Enter head of family" value ="{{old('family_head')}}">
			<span style = "color:red" >@error('family_head') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Monthly income of  Karta (Head) : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "income"  placeholder="Enter income" value ="{{old('income')}}">
			<span style = "color:red" >@error('income') {{$message}} @enderror</span>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Appellation : </label>
	      </div>
	      <div class="col-75">
	        <input type="text" name="appellation" placeholder = "Mr/Mrs/Dr">
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Suffix : </label>
	      </div>
	      <div class="col-75">
	        <input type="text" name="suffix" placeholder = "Enter suffix">
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Relationship Type : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <select name = "relationship" required> 
			    <option value="">None</option> 
			    <option value="Son_of "{{ old('relationship') == "Son_of" ? 'selected' : ''}}>S/o</option>  
			    <option value="Daughter_of" {{ old('relationship') == "Daughter_of" ? 'selected' : ''}}>D/o</option>  
			    <option value="Wife_of" {{ old('relationship') == "Wife_of" ? 'selected' : ''}}>W/o</option>
			    <option value="Husband_of" {{ old('relationship') == "Husband_of" ? 'selected' : ''}}>H/o</option>  
			    <option value="Father_of" {{ old('relationship') == "Father_of" ? 'selected' : ''}}>F/o</option>  
			    <option value="Mother_of" {{ old('relationship') == "Mother_of" ? 'selected' : ''}}>M/o</option>  >
   			</select>
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Occupation : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name="occupation" placeholder = "Enter occupation" value ="{{old('occupation')}}">
			<span style = "color:red" >@error('occupation') {{$message}} @enderror</span>
	      </div>
	    </div>


	    <div class="row">
	      <div class="col-25">
	        <label>Enter Number of Family Members : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <div >
	            <input type="number" id="txtNoOfRec" name = "mem_num" required min = '0' max = '10'/>
				<span style = "color:red" >@error('mem_num') {{$message}} @enderror</span>
	            <input type="button" value="CREATE" id="btnNoOfRec" required/>
	        </div>
	        <br />
	        <div id="AddControll">
        	</div>
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Electricity Connection : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type = "radio" name = "electricity" id = "yes" value = "yes" required {{ (old('electricity') == 'yes') ? 'checked' : ''}}>
		    <label for = "yes">Yes</label>
		    <input type = "radio" name = "electricity" id = "no" value = "no" required {{ (old('electricity') == 'no') ? 'checked' : ''}} >
		    <label>No </label> <br>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Gas Connection : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	       <input type = "radio" name = "gas" id = "yes" value = "yes" required {{ (old('gas') == 'yes') ? 'checked' : ''}}>
		    <label for = "yes">Yes</label>
		    <input type = "radio" name = "gas" id = "no" value = "no" required {{ (old('gas') == 'no') ? 'checked' : ''}} >
		    <label>No </label>
		  </div>
	    </div>

	</fieldset>

	<fieldset>
		<legend>Documents</legend>

		<div class="row">
	      <div class="col-25">
	        <label>Old Ration Card : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="file" id="old_ration_document" name="old_ration_document" required >
			<br>
			<span style = "color:red" >@error('old_ration_document') {{$message}} @enderror</span>
	        
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Aadhaar Card : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="file" id="aadhaar_document" name="aadhaar_document" required > 
			<br>
			<span style = "color:red" >@error('aadhaar_document') {{$message}} @enderror</span>
	      </div>
	    </div>

	</fieldset>

	<fieldset>
		<legend>Misc</legend>

		<div class="row">
	      <div class="col-25">
	        <label>Date of Birth : </label>
	      </div>
	      <div class="col-75">
	        <input type="date" name = "dob" required value ="{{old('dob')}}">
	      </div>
	    </div>

		<div class="row">
	      <div class="col-25">
	        <label>Email : </label>
	      </div>
	      <div class="col-75">
	        <input type="email" name = "email" value ="{{old('email')}}">
			<span style = "color:red" >@error('email') {{$message}} @enderror</span>
	      </div>
	    </div>

		<div class="row">
	      <div class="col-25">
	        <label>Phone Number : </label>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "phone_number" max = "9999999999" value ="{{old('phone_number')}}">
			<span style = "color:red" >@error('phone_number') {{$message}} @enderror</span>
	      </div>
	    </div>
		
		<div class="row">
	      <div class="col-25">
	        <label>Note Sheet file number : </label>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "note_sheet_no">
	      </div>
	    </div>

		

	    <div class="row">
	      <div class="col-25">
	        <label>Note Sheet : </label>
	      </div>
	      <div class="col-75">
	        <textarea id = "notesheet" name="notesheet"></textarea>
	      </div>   							
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Remarks : </label>
	      </div>
	      <div class="col-75">
	        <textarea id = "remarks" name="remarks"></textarea>
	      </div>   							
	    </div>

	    <div class="row">
	    <div class="col-25">
	        <label>Terms and Conditions : </label>
	      </div>
	    <div class="col-75">
	         <input type="checkbox" name="terms" id="terms" required> 
			 I hereby declare that all the documents attached are verified with originals 
			<br><br>
	      </div>   							

	</fieldset>
      
	<div class = "wrapper">	
		<button type="submit" class="registerbtn" action = "action.php">SUBMIT</button>  
    </div>

  </form>
</div>


</body>
</html>