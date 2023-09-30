<?php
$apikey = $_POST['apikey'];
$projectid = $_POST['projectid'];
$countft = $_POST['countft'];
$lovelace = $_POST['lovelace'];
$addresstext = $_POST['addresstext'];
$amounttext = $_POST['amounttext'];
$afteramounttxt = $_POST['afteramounttxt'];

$url = 'https://api.nft-maker.io/GetAddressForRandomNftSale/'.$apikey.'/'.$projectid.'/'.$countft.'/'.$lovelace;

// Initializes a new cURL session
$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request
curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'GET' );

// Execute cURL request with all previous settings
$response = curl_exec($curl);

if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
}
curl_close($curl);

if (isset($error_msg)) {
    // TODO - Handle cURL error accordingly
	echo $error_msg;
}

// Close cURL session
curl_close($curl);

//echo $response . PHP_EOL;
$fetchdata =  json_decode($response,true);

//print_r($fetchdata);

$fetchaddress = $fetchdata['paymentAddress'];
$fetchada = $fetchdata['adaToSend'];

if (isset($fetchdata['errorMessage']))
{
	echo '<div class="errormsghere">'.$fetchdata['errorMessage'].'</div>';
}
else
{
?>
<div class="com_info">
<h2><?php echo $addresstext;?></h2>
<h3><?php echo $fetchaddress;?></h3>
<!--<span class="buttonholderspn"><button onclick="myFunctiontocopy()" class="spanbtn">Click to copy Address</button></span>-->

<h2><?php echo $amounttext;?></h2>
<h3><?php echo $fetchada;?> <?php echo $afteramounttxt;?> </h3>
</div>
<?php }?>
<script>
function myFunctiontocopy() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>