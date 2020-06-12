<table style="border-left:thin #2A7271 solid; border-right:thin #2A7271 solid; border-bottom:thin #2A7271 solid;" bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
    <tbody>
        <tr>
            <td width="100%" height="20">
            </td>
        </tr>
        <tr>
            <td>
                <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
                    <tbody>
                        <!-- title -->

                        <tr>
                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;">
                                <p>
                                    Dear Admin,
                                </p>
                                <p>
                                   
                                </p>
                            </td>
                        </tr>
                        <!-- end of title -->

                        <!-- Spacing -->

                        <tr>
                            <td width="100%" height="10">
                            </td>
                        </tr>
                        <!-- Spacing -->

                        <!-- content -->

                        <tr>
                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #666666; text-align:left;line-height: 24px;">
                                <p>
                                    <?php if(isset($product_id) && $product_id){
                                        echo "Seller update Product.";
                                    } else {
                                        echo "Seller add Product.";
                                    } 
                                    ?>
                                </p><br/>
                                <p>
                                    Product Name :  <?=  $product_name ?>
                                </p><br/><br/>
                                <p>
                                     See the product and verify it.
                                </p>
                            </td>
                        </tr>
                        <!-- end of content -->

                        <!-- Spacing -->

                        <tr>
                            <td width="100%" height="10">
                            </td>
                        </tr>
                        <!-- button -->

                        <!-- /button -->

                        <!-- Spacing -->

                        <tr>
                            <td width="100%" height="20">
                            </td>
                        </tr>
                        <!-- Spacing -->

                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>