<?php
if(isset($_GET['type']))
    {
$category_type = $_GET['type'];
    }

echo "<span name='items_display' id='items_display'>";	
echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Product</strong></u>";
echo "</font>";
echo "</center>";
echo "<div style='width:96%; margin: 0.5% auto; padding:0;'>";
$this->load->database();
$this->db->select('name, base_value, item_image');
$this->db->where('type', '$category_type');
$query = $this->db->get('ewaste_items');

echo "<div align='center' style='float:left; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>";
$query1 = $this->db->query("SELECT DISTINCT company_image, company FROM ewaste_items WHERE type='$category_type'");
for($j=0; $j<$query1->num_rows(); $j++)
{
$comp_image = $query1->row($j)->company_image;
echo "<div id='disp1' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; font-weight:bold; 
font-size:16px; text-align:center; border:1px solid grey; cursor:pointer;'>";
echo "<img src='".base_url()."assets/images/ewaste_items/".$comp_image."' width='190px' height='150px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query1->row($j)->company; 
echo "</font>";
echo "</div>";
}
echo "</div>";
echo "<br><br>";

echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Model</strong></u>";
echo "</font>";
echo "</center>";
echo "<br>";
for($i=0; $i<$query->num_rows(); $i++)
{
$image = $query->row($i)->item_image;
/*$aExtraInfo1 = getimagesize(echo base_url()."assets/images/ewaste_items/".$image);
$sImage1 = 'data:' . $aExtraInfo1['mime'] . ';base64,' . base64_encode(file_get_contents(echo base_url()."assets/images/ewaste_items/".
$image));*/
echo "<div id='disp2' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; border:1px solid grey; 
font-weight:bold; font-size:16px; text-align:center; cursor:pointer;'>"; 
echo "<img src='".base_url()."assets/images/ewaste_items/".$image."' width='120px' height='220px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query->row($i)->name; 
echo "</font>";
echo "</div>";
}	
echo "</div>";	
echo "</span>";


<?php 

/*echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Product</strong></u>";
echo "</font>";
echo "</center>";
echo "<div style='width:96%; margin: 0.5% auto; padding:0;'>";
$this->load->database();
$this->db->select('name, base_value, item_image');
$this->db->where('type', 'smartphone');
$query = $this->db->get('ewaste_items');

echo "<div align='center' style='float:left; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'>";
$query1 = $this->db->query("SELECT DISTINCT company_image, company FROM ewaste_items WHERE type='smartphone'");
for($j=0; $j<$query1->num_rows(); $j++)
{
$comp_image = $query1->row($j)->company_image;
echo "<div id='disp1' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; font-weight:bold; 
font-size:16px; text-align:center; border:1px solid grey; cursor:pointer;'>";
echo "<img src='".base_url()."assets/images/ewaste_items/".$comp_image."' width='190px' height='150px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query1->row($j)->company; 
echo "</font>";
echo "</div>";
}
echo "</div>";
echo "<br><br>";

echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Model</strong></u>";
echo "</font>";
echo "</center>";
echo "<br>";
for($i=0; $i<$query->num_rows(); $i++)
{
$image = $query->row($i)->item_image;
/*$aExtraInfo1 = getimagesize(echo base_url()."assets/images/ewaste_items/".$image);
$sImage1 = 'data:' . $aExtraInfo1['mime'] . ';base64,' . base64_encode(file_get_contents(echo base_url()."assets/images/ewaste_items/".
$image));
echo "<div id='disp2' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; border:1px solid grey; 
font-weight:bold; font-size:16px; text-align:center; cursor:pointer;'>"; 
echo "<img src='".base_url()."assets/images/ewaste_items/".$image."' width='120px' height='220px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query->row($i)->name; 
echo "</font>";
echo "</div>";
}	
echo "</div>";*/
?>

$("#items_display").show().html("<center><font style='font-weight:bold; text-align:center; font-size:20px;'><u>Choose your Product Company</u></font> </center> "+ idx +" <div style='width:96%; margin:0.5% auto; padding:0;'> <div align='center' style='float:left; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'> <div id='disp1' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; font-weight:bold; font-size:16px; text-align:center; border:1px solid grey; cursor:pointer;'> <img src='<?php echo base_url()?>assets/images/ewaste_items/#' width='190px' height='150px' style='vertical-align:middle; padding:5% 0;'> <br><br> <font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'> </font> </div> </div> </div>");



$.each(pictures, function(idx, picture) { $("#items_display").show().html("<center><font style='font-weight:bold; text-align:center; font-size:20px;'><u>Choose your Product Company</u></font> </center> "+ picture.company_image +" <div style='width:96%; margin:0.5% auto; padding:0;'> <div align='center' style='float:left; position:relative; width:100%; margin: 1% 0 3% 0; padding:0;'> <div id='disp1' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; font-weight:bold; font-size:16px; text-align:center; border:1px solid grey; cursor:pointer;'> <img src='<?php echo base_url()?>assets/images/ewaste_items/"+ picture.company_image +"' width='190px' height='150px' style='vertical-align:middle; padding:5% 0;'> <br><br> <font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'> </font> </div> </div> </div>");


<?php $data=new array(); $data="+ pictures +"; $length=sizeof($data); for($i=0;$i<$length;$i++) { echo $data[$i]['company_image']; } ?>


<?php $data=new array(); $data="+ data +"; $length=sizeof($data); for($i=0;$i<$length;$i++){ echo $data[$i];} ?>");





echo "<center>";
echo "<font style='font-weight:bold; text-align:center; font-size:20px;'>";
echo "<u><strong>Choose your Model</strong></u>";
echo "</font>";
echo "</center>";
echo "<br>";
$this->db->select('name, base_value, item_image');
$this->db->where('type', '$model');
$query = $this->db->get('ewaste_items');
for($i=0; $i<$query->num_rows(); $i++)
{
$image = $query->row($i)->item_image;
/*$aExtraInfo1 = getimagesize(echo base_url()."assets/images/ewaste_items/".$image);
$sImage1 = 'data:' . $aExtraInfo1['mime'] . ';base64,' . base64_encode(file_get_contents(echo base_url()."assets/images/ewaste_items/".
$image));*/
echo "<div id='disp2' align='center' style='float:left; position:relative; width:22.7%; padding:auto; margin:1%; border:1px solid grey; 
font-weight:bold; font-size:16px; text-align:center; cursor:pointer;'>"; 
echo "<img src='".base_url()."assets/images/ewaste_items/".$image."' width='120px' height='220px' style='vertical-align:middle; 
padding:5% 0;'>";
echo "<br><br>";
echo "<font style='font-weight:bold; text-align:center; font-size:16px; color:brown;'>";
echo $query->row($i)->name; 
echo "</font>";
echo "</div>";
}	