<style>

.team_member { float:left; width:100%; margin:2% 0; cursor:pointer; position:relative; z-index:0; padding:0; }
.team_member:first-child { float:left; width:100%; margin:0; cursor:pointer; margin-bottom:2%; padding:0; }
.team_member:last-child { float:left; width:100%; margin:0; cursor:pointer; margin-top:2%; padding:0; }
.name { float:left; width:77%; padding:1% 1.5% 2% 1.5%; border:1px solid #d3d3d3; border-width:1px 0 1px 1px; position:relative;  
background:url(<?php echo base_url()?>assets/images/arrow1.png) right 10px center no-repeat #f9f9f9; height:18px; margin:6% 0; 
border-radius:5px 0 0 5px; -moz-border-radius:5px 0 0 5px; -webkit-border-radius:5px 0 0 5px; font-weight:bolder; z-index:1; }
#info1,#info2,#info3,#info4,#info5,#info6 { float:right; width:19.6%; margin:0; padding:0; position:relative; z-index:1; }
.team_img { border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px; border:1px solid #cacaca; vertical-align:middle; 
float:right; cursor:pointer; position:relative; z-index:1; }
#details_info1,#details_info2,#details_info3,#details_info4,#details_info5,#details_info6,#details_info7
{
top:-18px; left:0; background:#fff; border:1px solid #d3d3d3; border-radius:4px; -moz-border-radius:4px; -webkit-border-radius:4px; 
width:92%; padding:4.7% 3% 3% 3%; display:none; text-align:justify; font-family:'Open Sans',Arial,sans-serif; line-height:22px; 
font-size:15px; cursor:default; position:relative; float:left; margin:0; cursor:default; z-index:0;
}

</style>

<script>

$(document).ready(function()
{

$("#down4").toggle(function()
{
$("#details_info1,#details_info2,#details_info3,#details_info4,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info2,#details_info3,#details_info4,#details_info6").hide("fast");
$("#details_info5").stop(true,true).slideDown(600, "swing");
$("#details_info5").show();
},function()
{
$("#details_info5").stop(true,true).slideUp(300, "swing");
$("#details_info5").hide("fast");
});

$("#down").toggle(function()
{
$("#details_info5,#details_info2,#details_info3,#details_info4,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info5,#details_info2,#details_info3,#details_info4,#details_info6").hide("fast");
$("#details_info1").stop(true,true).slideDown(600, "swing");
$("#details_info1").show();
},function()
{
$("#details_info1").stop(true,true).slideUp(300, "swing");
$("#details_info1").hide("fast");
});

$("#down1").toggle(function()
{
$("#details_info1,#details_info5,#details_info3,#details_info4,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info5,#details_info3,#details_info4,#details_info6").hide("fast");
$("#details_info2").stop(true,true).slideDown(600, "swing");
$("#details_info2").show();
},function()
{
$("#details_info2").stop(true,true).slideUp(300, "swing");
$("#details_info2").hide("fast");
});

$("#down2").toggle(function()
{
$("#details_info1,#details_info2,#details_info5,#details_info4,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info2,#details_info5,#details_info4,#details_info6").hide("fast");
$("#details_info3").stop(true,true).slideDown(600, "swing");
$("#details_info3").show();
},function()
{
$("#details_info3").stop(true,true).slideUp(300, "swing");
$("#details_info3").hide("fast");
});

$("#down3").toggle(function()
{
$("#details_info1,#details_info2,#details_info3,#details_info5,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info2,#details_info3,#details_info5,#details_info6").hide("fast");
$("#details_info4").stop(true,true).slideDown(600, "swing");
$("#details_info4").show();
},function()
{
$("#details_info4").stop(true,true).slideUp(300, "swing");
$("#details_info4").hide("fast");
});

$("#down5").toggle(function()
{
$("#details_info1,#details_info2,#details_info3,#details_info4,#details_info5").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info2,#details_info3,#details_info4,#details_info5").hide("fast");
$("#details_info6").stop(true,true).slideDown(600, "swing");
$("#details_info6").show();
},function()
{
$("#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info6").hide("fast");
});

$("#down6").toggle(function()
{
$("#details_info1,#details_info2,#details_info3,#details_info5,#details_info6").stop(true,true).slideUp(300, "swing");
$("#details_info1,#details_info2,#details_info3,#details_info5,#details_info6").hide("fast");
$("#details_info7").stop(true,true).slideDown(600, "swing");
$("#details_info7").show();
},function()
{
$("#details_info7").stop(true,true).slideUp(300, "swing");
$("#details_info7").hide("fast");
});

});

</script>

<div id="main_container">

<div id="slider" style="background:#fff;">

<span id="about_heading">

Extracarbon's mission is to build a platform where the local community within a city could help the kabadiwala's to collect more 
recyclable stuff for responsible recycling.

</span>

<span id="box1" style="margin:2% 0; height:auto;">
			 
			<span id="slide1" style="background:#fff; height:auto;">			
			
			<span class="slide_heading">
			How We <font style="color:#7DC142;">Started</font>		
			</span>
			
			<span id="slide_data1" style="font-family:'Open Sans',Arial,sans-serif; font-style:normal; color:#555; height:auto;">			 
			Gaurav & Anant were on a business trip to Rewari where Gaurav shared the idea of ExtraCarbon with Anant. After the 
			conversation, Anant said lets do it and the ball started rolling.		
			</span> 
						
			</span>
			
			<span class="line" style="height:210px;"></span>
			
			<span id="slide2" style="background:#fff; height:auto; overflow:visible; z-index:99;">
			
			<span class="slide_heading">			
			People Behind <font style="color:#7DC142;">ExtraCarbon</font>
			</span>
			
			<span id="slide_data2" style="font-family:'Open Sans',Arial,sans-serif; font-style:normal; color:#555; height:auto; 
			z-index:99; overflow:visible;">		
				
			<ul style="list-style:square; margin:0; padding:0 2% 0 7%;">
			
			<span class="team_member" id="down"> <span class="name"> <li>Gaurav</li> </span> <span id="info1"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/gaurav.png" width="100%" height="60px"> </span>
			
			<span id="details_info1"> Gaurav co-founded and launched "extracarbon.com" in 2013. Organically developed & scaled business 
			from scratch. Extracarbon is a leading brand name in collecting scrap from homes & shopping malls in Gurgaon. Extracarbon is 
			working with an aim of pan-India presence in next 3 years.</span> </span>
			 
			<span class="team_member" id="down1"> <span class="name"> <li>Anant</li> </span> <span id="info2"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/anant1.jpg" width="100%" height="60px"> </span>
			
			<span id="details_info2"> Anant co-founded extracarbon.com which is a start-up based in Gurgaon. We are a team of highly 
			motivated professionals committed in creating models to motivate consumers to reduce their carbon footprint by imbibing 
			achievable changes in their day to day consumption and waste disposal behaviour.</span> </span>
			
			<span class="team_member" id="down2"> <span class="name"> <li>Jitendra</li> </span> <span id="info3"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/jitendra.png" width="100%" height="60px"> </span>
			
			<span id="details_info3"> Jitendra has 8 years of business development experience in automobiles & education. Currently, he 
			is challenging himself in operation & business development both.</span> </span>
			 
			<span class="team_member" id="down3"> <span class="name"> <li>Firasat</li> </span> <span id="info4"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/firasat.png" width="100%" height="60px"> </span>
			
			<span id="details_info4"> Firasat has more than 6 years experience as a kabadiwala & he is the man with know-how & core 
			skills which is transforming extracarbon.com as a loved brand.</span> </span>
			
			<span class="team_member" id="down4"> <span class="name"> <li>Pankaj</li> </span> <span id="info5"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/pankaj.png" width="100%" height="60px"> </span> 
			 
			<span id="details_info5"> Completed his B.Tech in computer science and engineering from Dehradun Institute of Technology, 
			Dehradun. After his graduation he joined Dev Bhoomi group of institutions as head of information cell. After successful one 
			year completion he left the college and joined WNS Global services as research analyst in Market research field. He worked 
			with many clients like Kantar, UniLever and Millward Brown.</span> </span>
			
			<span class="team_member" id="down5"> <span class="name"> <li>Pradeep</li> </span> <span id="info6"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/pradeep.png" width="100%" height="60px"> </span>
			 
			<span id="details_info6"> Pradeep is the most youngest in the team. By education he is an engineer but currently like others 
			he is also challenging himself in operation & administration.</span> </span>
			
			<!--<span class="team_member" id="down6"> <span class="name"> <li>Krishna</li> </span> <span id="info6"> <img class="team_img"
			align="absmiddle" src="<?php echo base_url()?>assets/images/members/krishna.jpg" width="100%" height="60px"> </span>
			 
			<span id="details_info7"> Was allied with snapdeal.com and dealsandyou.com  as Department Head for new market places. Previous stints include management position in Binary Semantics ltd, an online outbound Travel portal for south east Asian countries</span> </span>-->
			
			</ul>
			
			</span> 
						 
			</span>
			
			<span class="line" style="height:210px;"></span>
			
			<span id="slide3" style="background:#fff; height:auto;"> 
			
			<span class="slide_heading">			
			Our <font style="color:#7DC142;">Facts</font>
			</span>
			
			<span id="slide_data3" style="font-family:'Open Sans',Arial,sans-serif; font-style:normal; color:#555; height:auto;">			
			
			<span class="facts"><strong>Founded</strong><br>2013</span>
			<span class="facts"><strong>Founders</strong><br>Gaurav and Anant</span>
			<span class="facts"><strong>Head Office</strong><br>O-425, Jalvayu Vihar, Sector 30, Gurgaon - 122001. INDIA</span>
						
			</span>  
			
			</span>
			
			</span>		

</div>		

</div>