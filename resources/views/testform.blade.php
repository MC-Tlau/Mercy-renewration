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
	                        "<input type='text' style = 'width:100%' id='txtFName' placeholder='Name' name = member_number[] autofocus />"+
	                    "</td>"+

	                    "<td>"+
	                        "<input type='number' id='txtLName' style = 'width:100%'placeholder='Age' name = age_number[]/>"+
	                    "</td>"+

	                "</tr>";
	    }
	    tbl += "</table>";

	    $("#AddControll").append(tbl);
	}

	</script>
</head>
<body>


<div>  
  <center>  <h1>Ration Card Renewal Form</h1> </center>
  <center>  <h3>Mandatory fields are marked by <span class="required">*</span></h3> </center>  
  <hr> 
  </div>
<!-- <div class="container"> -->
  <form action ="/action" method = "POST" enctype = "multipart/form-data">
  @csrf
  	<fieldset class="f1">

  		<legend>Registration Info</legend>

	    <div class="row">
	      <div class="col-25">
	        <label >Registration Number:</label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name="register_no" placeholder="Enter registration number">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Ration Card Number: </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name="ration_no" placeholder="Enter Ration card number">
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
	        <input type="text" name="door_no" placeholder="Enter door no">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Adress Sub Locality 1 : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "sub_locality1" placeholder="Enter locality">
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
	        <input type="text" name = "ward_door_no" placeholder= "6-digit">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label >Address- Location : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "address_location"  placeholder="Enter location">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Pin Code : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "pin_code"  placeholder="Enter pin code">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Police Station : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "police_station"  placeholder="Enter police station">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Residing Period of Above Address : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "residing_period" placeholder="Please enter in years">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Address Post Office : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name = "post_office"  placeholder="Enter post office">
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
	        <label>Select State  : </label><span class="required">*</span>
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
	       <select name = "gender" required>  
		      <option value="male">Male</option>  
		      <option value="female">Female</option>  
		      <option value="other">Other</option>  
		    </select>
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Religion : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
			 <select required name = "religion">  
			    <option value="Christian ">Christian</option>  
			    <option value="Islam">Islam</option>  
			    <option value="Hindu">Hindu</option>
			    <option value="Other">Other</option>

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
	        <input type="text" name = "family_head"  placeholder="Enter head of family">
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Monthly income of  Karta (Head) : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "income"  placeholder="Enter income">
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
			    <option value="Son_of ">S/o</option>  
			    <option value="Daughter_of">D/o</option>  
			    <option value="Wife_of">W/o</option>
			    <option value="Husband_of">H/o</option>  
			    <option value="Father_of">F/o</option>  
			    <option value="Mother_of">M/o</option>  >
   			</select>
	      </div>
	    </div>

	     <div class="row">
	      <div class="col-25">
	        <label>Occupation : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="text" name="occupation" placeholder = "Enter occupation">
	      </div>
	    </div>


	    <div class="row">
	      <div class="col-25">
	        <label>Enter Number of Family Members : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <div >
	            <input type="text" id="txtNoOfRec" />
	            <input type="button" value="CREATE" id="btnNoOfRec" />
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
	        <input type = "radio" name = "electricity" id = "yes" value = "yes" >
		    <label for = "yes">Yes</label>
		    <input type = "radio" name = "electricity" id = "no" value = "no" >
		    <label>No </label> <br>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Gas Connection : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	       <input type = "radio" name = "gas" id = "yes" value = "yes" >
		    <label for = "yes">Yes</label>
		    <input type = "radio" name = "gas" id = "no" value = "no" >
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
	        <input type="file"id="scanned_documents" name="scanned_documents">
			<br>
			<span style="color: orange" >file size should not exceed 2 mb</span>
	        
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-25">
	        <label>Aadhaar Card : </label><span class="required">*</span>
	      </div>
	      <div class="col-75">
	        <input type="file"id="scanned_documents" name="scanned_documents"> 
			<br>
			<span style="color: orange" >file size should not exceed 2 mb</span>
	      </div>
	    </div>

	</fieldset>

	<fieldset>
		<legend>Misc</legend>
		
		<div class="row">
	      <div class="col-25">
	        <label>Email : </label>
	      </div>
	      <div class="col-75">
	        <input type="email" name = "email">
	      </div>
	    </div>

		<div class="row">
	      <div class="col-25">
	        <label>Phone Number : </label>
	      </div>
	      <div class="col-75">
	        <input type="number" name = "phone_number" max = "9999999999">
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
<!-- </div> -->


</body>
</html>