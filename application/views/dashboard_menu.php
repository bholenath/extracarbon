<script src="<?php echo base_url()?>assets/js/jquery.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url()?>assets/css/jquery.akordeon.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>assets/js/jquery.akordeon.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#buttons').akordeon();
            $('#button-less').akordeon({ buttons: false, toggle: true, itemsOrder: [2, 0, 1] });
        });
    </script>
    <style type="text/css">
        .demobar
        {
            height: 90px;
            line-height: 90px;
        }
        .demobar .fleft
        {
            float: left;
            margin-left: 10px;
        }
        .demobar .fright
        {
            float: right;
            margin-top: 14px;
            margin-right: 10px;
        }
    </style>

	
    <div id="demo-wrapper">
        <div class="akordeon" id="buttons">
		
<!--
            <div class="akordeon-item expanded">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                          Metro
                        </div>
                    </div>
                </div>
                <div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                        <p>
                            <ul>
                                <li>
                                    <a href="<?php //echo base_url()?>earnpoint/upload_ticket"> Upload Ticket </a>
                                </li>
                                <li>
									<a href="<?php //echo base_url()?>showpoint/metro"> Points Earned</a>
								</li>
						
                                
                            </ul>
                        </p>
                    </div>
                </div>
			</div>
--
            <div class="akordeon-item">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                            Rideshare
                        </div>
                    </div>
                </div>
                <div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                         <p>
                            <ul>
                                <li>
									<a href="<?php //echo base_url()?>carpool/search">Search</a>
                                </li>
                                <li>
									<a href="<?php //echo base_url()?>carpool/offer">Offer</a>
                                </li>
								
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="akordeon-item">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                            Gift A Plant
                        </div>
                    </div>
                </div>
				<div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                       <p>
                            <ul>
                                <li>
                                    <a href="<?php //echo base_url()?>earnpoint/gift_plant">Send Gift </a>
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
	
            </div>-->
			
			<div class="akordeon-item">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                           Request a Kabadi
                        </div>
                    </div>
                </div>
                <div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                       <p>
                            <ul>
                                <li>
									<a href="<?php echo base_url()?>earnpoint/recycle_waste">Request a Kabadi</a>
                                </li>
								<!--<li>
									<a href="<?php //echo base_url()?>showpoint/waste_pick"> Show Points of Waste Pick  </a>
                                </li>
                                <li>
                                    <a href="<?php //echo base_url()?>earnpoint/recycle_bag"> Request A Recycle Bag </a>
                                </li>
                                <li>
                                    <a href=""> Recycle Waste Item Points Chart </a>
                                </li>-->
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
			
			<div class="akordeon-item">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                            Redeem Points
                        </div>
                    </div>
                </div>
				<div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                       <p>
                            <ul>
                                <li>
                                   <a href="<?php echo base_url()?>redeempoints">Redeem Points</a>
                                </li>
							
								<li>
                                   <a href="<?php echo base_url()?>redeempoints/coupon_details">Coupon Details</a>
								</li>
					
                            </ul>
                        </p>
                    </div>
                </div>
	
            </div>
			
			<div class="akordeon-item">
                <div class="akordeon-item-head">
                    <div class="akordeon-item-head-container">
                        <div class="akordeon-heading">
                            Second Hand Items
                        </div>
                    </div>
                </div>
				<div class="akordeon-item-body">
                    <div class="akordeon-item-content">
                       <p>
                            <ul>
                                <li>
                                   <a href="<?php echo base_url()?>resale">Upload Item </a>
                                </li>
							
								<!--<li>
                                   <a href="<?php //echo base_url()?>resale">Items History </a>
								</li>-->
					
                            </ul>
                        </p>
                    </div>
                </div>
	
            </div>			
			
        </div>
        
    </div>