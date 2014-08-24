 <style>
       
	   #map-canvas {
        height:600px;
		width:98%;
		margin:auto 1%;
		margin-bottom:2.5%;
       	border:2px #b3b3b3 solid;
		border-right:3px #b3b3b3 solid;
		overflow:hidden;
        }
				
		#c_cont{border:hidden 1px #cacaca; cursor:default; width:100%; height:auto; margin:auto; padding:0.3% 0; 
		font-family:'Open Sans',Arial,sans-serif;}	
		  	  
 </style>
	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script>

var locations = [
				['Valley View', 28.43562, 77.13629],
				['Essel Tower', 28.47605, 77.07464],
				['Wellington Estate', 28.44715, 77.09566],
				['M2K Aura', 28.42658, 77.05519],
				['Park View II', 28.40142, 77.04258],
				['Parshvnath Greenville', 28.40946, 77.04269],
				['Omaxe Nile', 28.41035, 77.05183],
				['Lilac 1', 28.41397, 77.05087],
				['Galaxy Apartments', 28.45413, 77.09548],
				['Unitech South Close', 28.41017, 77.05818],
				['Unitech North Close', 28.41017, 77.05818],
				['Unitech World Spa East', 28.46038, 77.05789],
				['Unitech World Spa West', 28.46038, 77.05789],
				['Uppal South End', 28.41049, 77.04637]
				];

function initialize() {
  
  var mapOptions = 
  {
    zoom: 14,
    center: new google.maps.LatLng(28.44715, 77.09566),
	mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  
  var infowindow = new google.maps.InfoWindow();
  var marker,i;
  var bounds = new google.maps.LatLngBounds();
  
  for (i = 0; i < locations.length; i++) 
	{ 
	var mylatlng =  new google.maps.LatLng(locations[i][1] , locations[i][2]);
	marker = new google.maps.Marker({position: mylatlng , map: map , title: 'Click to Zoom'});
	bounds.extend(mylatlng);
				
	google.maps.event.addListener(marker, 'click', (function(marker, i) {
	return function() {
	infowindow.setContent(locations[i][0]);
    infowindow.open(map, marker);
	map.setZoom(15);
	map.panTo(marker.getPosition());
	}
  	})(marker, i));	
	
	google.maps.event.addListener(marker, 'zoom_changed', (function(marker) {
	return function() {
	window.setTimeout(function() {
    map.panTo(marker.getPosition());
    }, 1000);
	}
	})(marker));
		
	}	
	map.fitBounds(bounds);
   
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div id="main_container" style="border-width:0 0 3px 0; -moz-border-image:url(../../assets/images/menu_back1.png) 
25% 30% 10% 20% repeat; -webkit-border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; 
border-image:url(../../assets/images/menu_back1.png) 25% 30% 10% 20% repeat; font-family:'Open Sans',Arial,sans-serif;">

<!-- <center>

	<div id="c_cont">
	
		<table style="background-color:#DCDF5E;" width="100%" cellpadding="3" cellspacing="2" border="1" height="100%">
						
						<h2><strong><u>Our Clients</u></strong></h2>
						
							<tr>
								
								<th width='20%'> <h3>Name</h3></th>
								<!-- <th width='15%'> <h3>Tower</h3></th> -->
								<!-- <th width='30%'> <h3>Address</h3></th> -->
								<!-- <th width='15%'> <h3>Phone</h3></th>
								<th width='20%'> <h3>Starting date</h3></th> -->
							<!-- </tr>
						
							<tr></tr>
						
							<tr> -->
								
								<!-- <td> <h3>Valley View</h3></td>
								<td> <h3>Sector 48 - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
							
							<tr>
								 -->
								<!-- <td> <h3>Essel Tower</h3></td>
								<td> <h3>M.G Road - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
							
							<tr> -->
								
								<!-- <td> <h3>Wellington Estate</h3></td>
								<td> <h3>Sector 51 - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
							
							<tr> -->
								
								<!-- <td> <h3>M2K Aura</h3></td>
								<td> <h3>Sector 22 - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
							
							<tr>
								
								<td> <h3>Lilac 1</h3></td>
								<td> <h3>Sector 46 - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
							
							<tr>
								
								<td> <h3>Unitech World Spa East</h3></td>
								<td> <h3>Sector 63 - Gurgaon.</h3></td> -->
								<!-- <td> <h3>EC 1-F201</h3></td>
								<td> <h3>9711178312</h3></td>
								<td> <h3>29/05/2013</h3></td> -->
								
							<!-- </tr> 
  
		</table>
		
	</div>
	
</center>	 --> 

<center>

<div id="c_cont">

<h1><strong>Our <font style="color:#7DC142;">Network</font></strong></h1>

</div>

</center>
	
<div style="display:block;" align="center" id="map-canvas"></div>

</div>

<?php
if($this->session->flashdata('reply'))
echo '<script>alert("'.$this->session->flashdata('reply').'")</script>';
?> 