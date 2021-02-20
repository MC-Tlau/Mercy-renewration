

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

	.center
	{
		text-align: center;
	}
	img
	{
		display: block;
  		margin-left: auto;
  		margin-right: auto;
  
	}
	label
	{
  		
		float: left;
	}
	.container
	{
		display: absolute;
		margin-left: auto;
  		margin-right: auto;
		
	}
	.bord
	{
		border-style: groove;
  		border-right-width: thin;
  		
	}

	.info
	{
		  /border-collapse: collapse;/
		  border: 3px solid black;
		  padding: 15px;
	}
	.left
	{
		float:left;
		
	}
	.family
	{
		 border-style: solid;
		 width: 100%;
	}
	.right
	{
		float:right;
		/* padding-right: 200px; */
	}
	

</style>
<body>
	<img class = "center" src="government-of-india.jpg" alt="symbol" style="width:100px;height:100px;" > 
	<h5 class = "center">GOVERNMENT OF MIZORAM</h5>
	<h3 class = "center">FOOD CIVIL SUPPLIES AND CONSUMER AFFAIRS DEPARTMENT</h3>
	<h4 class = "center">FAMILY RATION CARD</h4>
	<h3 class = "right">Ration Card Number: </h3> 

	<table  height = "500px" width="100%" class = "info">
		<tr>
			<th class = "left">District</th>
			<th><label>{{$applicant->district}}</label></th>

		</tr>

		<tr>
			<th class = "left">Date of Issue</th>
			<th><label>{{$applicant->date}}</label></th>
		</tr>

		<tr>
			<th class = "left">Name of Family Head</th>
			<th><label>{{$applicant->family_head}}</label></th>
		</tr>

		<tr>
			<th class = "left">Gender</th>
			<th><label>{{$applicant->gender}}</label></th>

		</tr>

		<tr>
			<th class = "left">Date of Birth</th>
			<th><label>{{$applicant->dob}}</label></th>

		</tr>

		<tr>
			<th class = "left">Occupation</th>
			<th><label>{{$applicant->occupation}}</label></th>
		</tr>

		<tr>
			<th class = "left">Present Address</th>
			<th><label>House No : {{$applicant->door_no}}</label></th>

		</tr>

		<tr>
			<th class = "left">Landmark</th>
			<th><label>{{$applicant->sub_locality}} </label></th>
		</tr>

		<tr>
			<th class = "left">Address</th>
			<th><label>{{$applicant->location}}</label></th>
		</tr>


		<tr>
			<th class = "left">District</th>
			<th><label> {{$applicant->district}}</label></th>
		</tr>

		<tr>
			<th class = "left">Pin Code</th>
			<th><label> {{$applicant->pin_code}}</label></th>
		</tr>

		<tr>
			<th class = "left">Gas Connection</th>
			<th><label>{{$applicant->gas}}</label></th>
		</tr>

		<tr>
			<th class = "left">Electricity Connection</th>
			<th><label>{{$applicant->electricity}}</label></th>
		</tr>
        @php       
            $persons = explode(',', $applicant->family_members);
        @endphp

	</table>

	<h2 class = center>DETAILS OF FAMILY MEMBERS</h2>
	<table class = "family">
		<tr>
			<th>S.No</th>
			<th>Member Name</th>
			<th>Age</th>
			
		</tr>

		<tr>
			<td>{{$persons[0]}}</td>
			<td>This is </td>
			<td>This is </td>
			<td>This is </td>	

		</tr>	
		
	</table>

</body>
</html>