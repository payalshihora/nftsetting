<?php
ob_start();
$addme=$_POST["addme"];
global $wpdb;
$table_name = $wpdb->prefix . "nftsetting";
if($_POST['submit']=="Save Settings")
{
extract($_POST);
$wpdb->query("update $table_name set apikey='$apikey',nftprojectid='$nftprojectid',countnft='$countnft',lovelace='$lovelace',addresstext='$addresstext',amounttext='$amounttext',afteramounttxt='$afteramounttxt' where nid=1");
header("Location:admin.php?page=myplug/muyplg.php&info=update");}


$getm=$wpdb->get_row("select * from  $table_name");

?>
<div xmlns="http://www.w3.org/1999/xhtml" class="wrap nosubsub">
  <div class="icon32" id="icon-edit"><br/>
  </div>
  <div id="col-left backendsettingform">
    <div class="col-wrap">
      <div>
        <div class="form-wrap">
          <h3>Update Your NFT API Settings</h3>
          <form class="validate backendset_form" action="" method="post" id="addtag" enctype="multipart/form-data">
            <div class="form-field">
              <div class="labelfrm">
                <label for="tag-name">apikey</label>
                <span class="desc">string</span> <span class="desc">(Path)</span> </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->apikey; ?>" id="apikey" name="apikey"/>
              </div>
            </div>
            <div class="form-field">
              <div class="labelfrm">
                <label for="tag-slug">nftprojectid</label>
                <span class="desc">integer ($int32)</span> <span class="desc">(Path)</span> </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->nftprojectid; ?>" id="nftprojectid" name="nftprojectid"/>
              </div>
            </div>
            <div class="form-field">
              <div class="labelfrm">
                <label for="email">countnft</label>
                <span class="desc">integer ($int32)</span> <span class="desc">(Path)</span> </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->countnft; ?>" id="countnft" name="countnft"/>
              </div>
            </div>
            <div class="form-field">
              <div class="labelfrm">
                <label for="email">lovelace</label>
                <span class="desc">integer ($int64)</span> <span class="desc">(Path)</span> </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->lovelace; ?>" id="lovelace" name="lovelace"/>
              </div>
            </div>
            <hr class="hrline" />
            <h3>After API call Result Text change</h3>
            <div class="form-field">
              <div class="labelfrm">
                <label for="email">Address Text</label>
                </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->addresstext; ?>" id="addresstext" name="addresstext"/>
              </div>
            </div>
            <div class="form-field">
              <div class="labelfrm">
                <label for="email">Amount Text</label>
                </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->amounttext; ?>" id="amounttext" name="amounttext"/>
              </div>
            </div>
            <div class="form-field">
              <div class="labelfrm">
                <label for="email">After Amount Text</label>
                </div>
              <div class="inputfrm">
                <input type="text" size="40" value="<?php echo $getm->afteramounttxt; ?>" id="afteramounttxt" name="afteramounttxt"/>
              </div>
            </div>
            <div class="form-field submitclass">
              <input class="btn backendsubmit" type="submit" size="40" value="Save Settings" id="submit" name="submit"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>