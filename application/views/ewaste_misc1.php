<?php 

		if(isset($_POST["model"]&&$_POST["year"]&&$_POST["screen1"]&&$_POST["battery"]&&$_POST["wifi"]&&$_POST["water"]
		&&$_POST["microphone"]&&$_POST["headphones"]))
    	{
		$model = $_POST["model"];
		$year = $_POST["year"];
		$screen1 = $_POST["screen1"];
		$battery = $_POST["battery"];
		$wifi = $_POST["wifi"];
		$water = $_POST["water"];
		$microphone = $_POST["microphone"];
		$headphones = $_POST["headphones"];
    	}

		echo "<span name='show_price' id='show_price' style='width=100%; position:relative; z-index:4;'>";
		
		if($model=='s4')
		{
		$b = 8000;
		}
		else if($model=='i5')
		{
		$b = 10000;
		}
		if($year=='yes')
		{
		$red1 = (10/100)*$b;
		}
		else
		{
		$red1 = (8/100)*$b;
		}
		if($screen1=='yes')
		{
		$red2 = (13/100)*$b;
		}
		else
		{
		$red2 = (10/100)*$b;
		}
		if($battery=='yes')
		{
		$red3 = (15/100)*$b;
		}
		else
		{
		$red3 = (10/100)*$b;
		}
		if($wifi=='yes')
		{
		$red4 = (17/100)*$b;
		}
		else
		{
		$red4 = (5/100)*$b;
		}
		if($water=='yes')
		{
		$red5 = (10/100)*$b;
		}
		else
		{
		$red5 = (5/100)*$b;
		}
		if($microphone=='yes')
		{
		$red6 = (15/100)*$b;
		}
		else
		{
		$red6 = (5/100)*$b;
		}
		if($headphones=='yes')
		{
		$red7 = (13/100)*$b;
		}
		else
		{
		$red7 = (9/100)*$b;
		}
				
		$price = $b - ($red1+$red2+$red3+$red4+$red5+$red6+$red7);
		
		echo "Extra Carbon price for your E-Waste is : Rs. ". $price;
		 
		echo "</span>";
		
?>