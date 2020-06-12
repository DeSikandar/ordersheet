<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= APP_NAME ?></title>
        <style>
            *{margin: 0px;padding: 0px;}

            .main_body{
                margin: 10px auto 0px; width: auto; background: #ffffff; text-align: center;
            }
            .email{
                width: 100%; display: inline-block;
            }
            #myAdr{
                margin:0px 10px; font-family:Raleway, 'Helvetica 25 UltraLight', arial; font-style: normal;color: #484848; font-size: 13 px; width:100%; display:inline-block;text-align: left;vertical-align:top;
            }
            .cart_total{
                width: 100%; float: none; display: table;
            }
            .delivery_charge{
                width: 100%; float: none; display: table;
            }
            .charity{
                width: 100%; float: none; display: table; background:none repeat scroll 0 0 #f8c1c5;
            }
            .total{
                width: 100%; float: none; display: table; margin: 10px 0px; border-top: 2px dashed rgb(204, 204, 204);  border-bottom: 2px solid rgb(204, 204, 204);
            }
            .product_details{
                font-family: helvetica; font-size: 13px; font-style: normal; font-weight: 500; text-transform: capitalize; color: rgb(108, 115, 133); float: left; width: 300px;
            }
        </style>
    </head>

    <body>
        <div class="main_body">
            <div class="email">
                <div class="head_top" style="background: none repeat scroll 0% 0% rgb(82, 141, 154); text-align: center; height: 60px; display: inline-block; width: 100%;">
                    <h1 style="font-family:century gothic;color:#ffffff; text-transform:capitalize;font-weight:500; margin-top:10px;">
                        Order Receipt</h1>
                </div>
                <div class="mail_box" style="width:100%;">
<!--                    <table width="100%" 97%;="" width:="" 7px;="" 0px="" margin:="" none;="" medium="" border:="" style=" width: 100%;">-->
                    <table width="100%"  width:=""  style=" width: 100%; background: #EEEEEE;">


                        <tbody>
                            <tr style="width: 100%; float: none; display:table;">                                
                                <th style="font-family:century gothic; color:#484848;font-size:20px; font-weight:bold; padding-top: 10px;padding-bottom: 10px;
                                    text-transform:capitalize; text-align:left;">Order ID : <?= $order_id ?>
                                    <?php //if(isset($r_booking_id) && $r_booking_id){ echo $r_booking_id; } ?>
                                        
                                    </th>                                
                            </tr>	
                        </tbody>                        
                    </table>
                    <div class="add" style="background: #EEEEEE; border-bottom: 1px solid #bebebe;border-top: 1px solid #bebebe;">
                       <!--  <address id="myAdr" style="margin-bottom: 10px; width: 44%; font-family: century gothic">
                            
                        </address> -->
                        <address id="myAdr" style="width: 40%; padding-top: 46px; font-family: century gothic"">  
                             <p><b>Products : <?= $product_name ?> </b></p>
                        </address>
                    </div>
                    <div class="add" style="background: #EEEEEE;">
                        <address id="myAdr" style="margin-left: 35px; margin-bottom: 10px; font-family: century gothic"">
                            <span style="color:#e61929; font-size:20px; font-family:century gothic; text-transform: capitalize;"></span><br>
                            <p><b><?= ($delivery_type == 'pickup') ? 'Pickup Location' : 'Delivery Location' ?> </b></p>
                            <span style="font-size: 13px;font-weight: 500;color: #484848;">
                                <?= $address_type . ' ' . $building_name . ' ' . $pincode . ' ' . $city . ' ' . $state . ' ' . $landmark ?>
                            </span>
                        </address>
                        <!--                        <address id="myAdr">
                                                    <span style="color:#e61929; font-size:20px; font-family:Raleway, 'Helvetica 25 UltraLight', arial; text-transform: capitalize;">sender info :</span><br>
                        
                                                </address>-->
                    </div>
                    <div class="add" style="background: #EEEEEE;">
                        <address id="myAdr" style="margin-left: 35px; margin-bottom: 10px; font-family: century gothic"">
                            <span style="color:#e61929; font-size:20px; font-family:century gothic; text-transform: capitalize;"></span><br>
                            <p><b>Customer details </b></p>
                            <address id="myAdr" style="width: 40%; padding-top: 6px; font-family: century gothic"">  
                                     <p> <?= $first_name . ' '. $last_name ?> </p>
                                    <p> <?= $email ?> </p>
                                </address>
                        </address>
                    </div>
                
                    
                </div>
                <div class="add" style="border-top: 1px solid #bebebe; padding-bottom: 10px; background: #eeeeee;">
                    <address id="myAdr" style="text-align: center">
                        <br>
                        <p style="font-family: century gothic;">Amount </p>
                        <span style="font-size: 22px;color: green;">$ <?= $total ?> </span><br/>
                        <span style="font-size: 10px;font-family: century gothic;">Shipping charge : <?= $shipping_charge ?></span><br><br/>                           
                    </address>

                </div>
                <div class="head_top" style="background: none repeat scroll 0% 0% rgb(82, 141, 154); text-align: center; height: 60px; display: inline-block; width: 100%;"></div>
            </div>
    </body>
</html> 