
<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" type="text/css" href="/css/formstyle.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
                        "<input type='text' id='txtFName' placeholder='Name' name = member_number[] autofocus />"+
                    "</td>"+

                    "<td>"+
                        "<input type='integer' id='txtLName' placeholder='Age' name = age_number[]/>"+
                    "</td>"+

                "</tr>";
    }
    tbl += "</table>";

    $("#AddControll").append(tbl);
}
</script>


@section('content')
<body>   
  <div>  
  <center>  <h1>Renewal Form</h1> </center>
  <center>  <h3>Mandatory fields are marked by * </h3> </center>  
  <hr> 
  </div>

  <form class="form-inline" action = "/action" method = "POST" enctype = "multipart/form-data"> 
    @csrf   <!-- cross site request forgery -->
    <fieldset class = "reg">
    <div >
      <legend>REGISTRATION INFO</legend>
      <label> Registration Number * : </label>   
      <input type="number" name="register_no" placeholder= "Registration No" class = "form-control" required />   
      <label> Ration Card Number * : </label>   
      <input type="number" name="ration_no" placeholder="Ration Card No" class = "form-control"  required />   
    </div>
    </fieldset>
    
    <fieldset class = "address_form">
    <div class = "form-group">  
      <legend>ADDRESS INFO</legend>
      <label>Address- Door number * :  </label> 
      <input type = "text" class = "form-control" name = "door_no" placeholder = "Enter door number "  required> 

      <label>Address- Sub-Locality 1 * :  </label> 
      <input type = "text" class = "form-control" name = "sub_locality1" placeholder = "Enter sub_locality 1 "  required> 
      
      <label>Address - Sub locality 2 : </label> 
      <input type = "text" class = "form-control" name = "sub_locality2" placeholder = "Enter sub_locality 2 "  > 

    </div>

    <div class = "form-group">
      <label> Address- Ward Number * :  </label> 
      <input type = "number" class = "form-control" name = "ward_door_no" placeholder = "6-digit"  required> 

      <label> Address- Location :  </label> 
      <input type = "text" class = "form-control" name = "address_location"  placeholder = "Enter location"  > 

      <label> Address Pin Code * : </label> 
      <input type = "number" class = "form-control" name = "pin_code"  placeholder = "Enter Pin Code"  required> 
    </div>

    <div class = "form-group">
     <!--  <label> Address- Location : </label> 
      <input type = "text" class = "form-control" name = "address_location"  placeholder = "Enter location" size = "20" > -->

      <label> Address- Police Sation * : </label> 
      <input type = "text" class = "form-control" name = "police_station"  placeholder = "Enter police station" required >

      <label> Address- Post Office * :  </label> 
      <input type = "text" class = "form-control" name = "post_office"  placeholder = "Enter post office" required>

      <!-- <label>Phone : </label>   -->
      <!-- <input type="text" class = "form-control" name="country_code" placeholder="Country Code"  value="+91" size="2"/>
      <input type="text"  class = "form-control" name="phone_no" placeholder="phone no."  required> -->

    </div>
    <!-- </fieldset> -->

   <!-- <fieldset class="misc"> -->
   <div class="form-group">

   <label>Select Sub-District * : </label>    
      <select class = "form-select" name = "sub_district" required>  
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

  <label> Select State * :  </label>    
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

  <label>Gender * : </label> 
    <select name = "gender" required>  
      <option value="male">Male</option>  
      <option value="female">Female</option>  
      <option value="other">Other</option>  
    </select>
    
  <label>Religion * : </label>
  <select required name = "religion">  
    <option value="Christian ">Christian</option>  
    <option value="Islam">Islam</option>  
    <option value="Hindu">Hindu</option>
  </select>
  
  </div>

  </fieldset>

  <fieldset class="family">
  <legend>FAMILY INFO</legend>
  
  <div class = "form-group">
  <label>Name of Head of the Family * : </label>
    <input type="text"class = "form-control" name="family_head" placeholder="Enter name of head of family" required>
  
  <label>Monthly income of  Karta (Head) * : </label>
    <input type="number" class="form-control" name="income" placeholder="Enter income" required>    
  
  <label>Date of Birth * :</label>
    <input type = "date" class = "form-control" name = "dob" required>

  </div>

  <div class = "form-group">
<!--   
  <label>Name of  the Family Members * : </label>
    <input type="text" class = "form-control" name="family_member" placeholder="Enter name of the family members" required>  -->
    
  <label>Appellation : </label>
  <input type="text" class="form-control" name="appellation" placeholder = "Mr/Mrs/Dr" >
  
  <label>Suffix : </label>
  <input type="text" class="form-control" name="suffix" placeholder = "Enter suffix" >
  
  <label>Relationship Type * :</label>    
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
  <div class = "form-group">
  <label>Occupation * : </label>
    <input type="text" class="form-control" name="occupation" placeholder = "Enter occupation" required>
  

  <!-- <label>Age of Family Members * :</label>
  <input type="number" name = "family_age" placeholder="Enter age" class="form-control" required> -->


  <label>Residing Period of Above Address * :</label>
  <input type="number" name = "residing_period" placeholder="Please enter in years" class="form-control" required>
  </div>
  </fieldset>

  <fieldset class = "conn">
  <div class = "form-group">

   

  <label>Electricity Connection: </label>
    <input type = "radio" name = "electricity" id = "yes" value = "yes" >
    <label for = "yes">Yes</label>
    <input type = "radio" name = "electricity" id = "no" value = "no" >
    <label>No </label> <br>

  <label>Gas Connection: </label>
    <input type = "radio" name = "gas" id = "yes" value = "yes" >
    <label for = "yes">Yes</label>
    <input type = "radio" name = "gas" id = "no" value = "no" >
    <label>No </label>
  </div>

  <div class="form-group">
  <label>List of Scanned supporting documents : </label>
    <input type="number" class="form-control" name="documents" placeholder="Enter no of documents">

    <!-- <form > -->
      <input type="file" id="scanned_documents" class = "form-control" name="scanned_documents"> 
    <!-- </form> -->

  </div>
  </fieldset>

  <fieldset class = "extra">
  <div class="form-group">
        <div >
            <label id="lblNoOfRec"> Enter Number of Family Members </label>
            <input type="text" id="txtNoOfRec" />
            <input type="button" value="CREATE" id="btnNoOfRec" />
        </div>
        <br />
        <div id="AddControll">

        </div>
    </div>
  <div class="form-group">

  <label>Note Sheet file number</label>
    <input type="number" name = "note_sheet_no" class="form-control"> 

  <label for="notesheet">Note Sheet</label>
    <textarea id = "notesheet" name="notesheet" class="form-control" >
    </textarea>

  <label for="remarks">Remarks</label>
    <textarea id = "remarks" name="remarks" class = "form-control">
    </textarea>

  </div>
  </fieldset>

  <button type="submit" class="registerbtn" >Register</button>  
  </form> 

</body>  
</html>  
@section('endcontent')
