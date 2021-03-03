
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
	.wrapper1 {
        text-align: center;
        padding-left:120px;
        
    } 
	button
	{   
		background-color: #008CBA;
        border-radius: 8px;
        /* border: 4px double #cccccc; */
        color: white;
		font-size:30px;
		width:15%;
	}
	button:hover {
  	background-color: green;
  	color: white;
}
button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    

#family
{
	border-collapse: collapse;
	text-align:center;

}

 .border
{
	border: 1px solid black;
  	padding: 5px;
	text-align:left;
	padding-right:50px;

}

	.center
	{
		text-align: center;
	}
	img
	{
		display: block;
		margin-left:300px;
  
	}
	label
	{
  		
		float:right;
		padding-right:200px;
	}
	.container
	{
		display: absolute;
		margin-left: auto;
  		margin-right: auto;
		
	}

	.info
	{
		  /* border-collapse: collapse; */
		  border: 3px solid black;
		  padding: 15px;
		  border-spacing: 5px;

		  
	}
	.left
	{
		text-align: left;
		padding-left: 20px;
		
		
	}
	#family td, #customers th {
	border: 1px solid black;
	text-align:center;
	
	}
	.right
	{
		text-align:right;
		padding-bottom:20px;
	}
	.footer {
    float:right;
    left:0;
	bottom:0;
  }
	

</style>
<body>
	<img class = "center" src="gov.jpg" alt="symbol" style="width:100px;height:100px;" > 
	<h4 class = "center">GOVERNMENT OF MIZORAM</h4>
	<h3 class = "center">FOOD CIVIL SUPPLIES AND CONSUMER AFFAIRS DEPARTMENT</h3>
	<h4 class = "center">FAMILY RATION CARD</h4>
	<!-- <h3 class = "right">Ration Card Number:{{$applicant->ration_no}} </h3>  -->

	<table  height = "800px" width="100%" class = "info">
		<tr>
			<th class = "left">Ration Card Number</th>
			<th class = "border">{{$applicant->ration_no}}</th>

		</tr>

		<tr>
			<th class = "left">District</th>
			<th class = "border">{{$applicant->district}}</th>

		</tr>

		<tr>
			<th class = "left">Name of Family Head</th>
			<th class = "border">{{$applicant->family_head}}</th>
		</tr>

		<tr>
			<th class = "left">Gender</th>
			<th class = "border">{{$applicant->gender}}</th>

		</tr>

		<tr>
			<th class = "left">Date of Birth</th>
			<th class = "border">{{$applicant->dob}}</th>

		</tr>

		<tr>
			<th class = "left">Occupation</th>
			<th class = "border">{{$applicant->occupation}}</th>
		</tr>

		<tr>
			<th class = "left">Address</th>
			<th class = "border">{{$applicant->location}}</th>

		</tr>
		
		<tr>
			<th class = "left">House No</th>
			<th class = "border">{{$applicant->door_no}}</th>

		</tr>

		<tr>
			<th class = "left">Landmark</th>
			<th class = "border">{{$applicant->sub_locality}}</th>
		</tr>


		<tr>
			<th class = "left">Pin Code</th>
			<th class = "border"> {{$applicant->pin_code}}</th>
		</tr>

		<tr>
			<th class = "left">Gas Connection</th>
			<th class = "border">{{$applicant->gas}}</th>
		</tr>

		<tr>
			<th class = "left">Electricity Connection</th>
			<th class = "border">{{$applicant->electricity}}</th>
		</tr>
        @php       
            $persons = explode(',', $applicant->family_members);
			$ages = explode(',', $applicant->family_ages);
			$count = count($persons);
        @endphp

	</table>

	<h2 class = center>DETAILS OF FAMILY MEMBERS</h2>
	<table id = "family" width="100%">
		<tr>
			<th>S.No</th>
			<th>Member Name</th>
			<th>Age</th>
			
		</tr>
		@for ($i = 0; $i < $count; $i++)
		<tr>
			<td>{{$i+1}}</td>
			<td>{{$persons[$i]}}</td>
			<td>{{$ages[$i]}}</td>	
		</tr>	
		@endfor
		
	</table>
	<br>
	<footer>
		<div class = "footer">
		<p class><strong> Signed By Officer<br>Aizawl, Mizoram</strong></p> 
	</footer>
	</div>

</body>
</html>