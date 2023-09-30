<?php global $wpdb;
$table_name = $wpdb->prefix . "nftsetting";
$getm=$wpdb->get_row("select * from  $table_name");
$apikey = $getm->apikey;
$projectid = $getm->nftprojectid;
$countft = $getm->countnft;
$lovelace = $getm->lovelace;
$addresstext = $getm->addresstext;
$amounttext = $getm->amounttext;
$afteramounttxt = $getm->afteramounttxt;

?>
<div class="wp-block-button has-custom-font-size mynftsetting"><a class="wp-block-button__link has-white-color has-text-color has-background" id="btnclickcall"><?php echo $atts['btnname']; ?> </a></div>

<div class="toggledatadv" style="display:none">
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#btnclickcall").click(function(){
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo plugins_url(); ?>/nftsetting/nftsetting_api_call.php',
				data : { apikey : '<?php echo $apikey;?>', projectid : '<?php echo $projectid;?>', countft : '<?php echo $countft;?>', lovelace : '<?php echo $lovelace;?>', addresstext : '<?php echo $addresstext;?>', amounttext : '<?php echo $amounttext;?>', afteramounttxt : '<?php echo $afteramounttxt;?>' },
                success: function(data) {
					//alert (data);
                   jQuery(".toggledatadv").html(data);
                }
            });
   });
});

</script>
<script>jQuery(".mynftsetting").click(function(){
    jQuery(".toggledatadv").toggle('show');
	 jQuery(this).hide("slow");
});</script>
