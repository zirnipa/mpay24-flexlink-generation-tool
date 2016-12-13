<html>
<title>mPAY24 FlexLink generation tool</title>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="clipboard.min.js"></script>
<script>
  function validateForm(event) 
  {
		var success_url = document.form.success_url.value;
		var error_url = document.form.error_url.value;
		var confirmation_url = document.form.confirmation_url.value;
		if (success_url == "" & error_url == "" & confirmation_url == "")  
		  {  
			  return true;
		  }  
		  else if (success_url != "" & error_url != "" & confirmation_url != "")  
		  {  
 			  return true;
		  } 
		  else
		  { 
			if (success_url == ""){document.getElementById('successlabel').className = 'error';}
			if (error_url == ""){document.getElementById('errorlabel').className = 'error';}
			if (confirmation_url == ""){document.getElementById('confirmationlabel').className = 'error';}
			if (success_url != ""){document.getElementById('successlabel').className = '';}
			if (error_url != ""){document.getElementById('errorlabel').className = '';}
			if (confirmation_url != ""){document.getElementById('confirmationlabel').className = '';}
			document.getElementById('errordiv').style.display = 'block';
			event.preventDefault();
			return false;

		  } 

   }

  $( function() {
	    $( "#isvalidtill" ).datepicker({ dateFormat: 'yymmdd' });
	  } );
	
</script>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
</head>
<body>
<div id="wrapper">
<form name ="form" class="form" action="index.php" onsubmit="return validateForm(event);" method="post">
<h1>mPAY24 FlexLink generation tool</h1>
	<ul>
	<li>
	<label>TID*</label>
	  <input type="text" name="tid" required value="<?php echo isset($_POST['tid']) ? $_POST['tid'] : '' ?>">
	  <span>Enter your transaction ID e.g.: 123456789</span>
	</li>
	<li>
	  <label>Amount*</label>
	  <input type="text" name="amount" required pattern="^[0-9]*\.[0-9]{2}$" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : '' ?>">
	  <span>Enter the amount. e.g.: 10.00</span>
	</li>
	<li>
	  <label>Language</label>
	  <select name="language">
	    <option <?php if ($_POST["language"] == 'DE') { ?>selected <?php }; ?> value="DE">DE (default)</option>  
	    <option <?php if ($_POST["language"] == 'EN') { ?>selected <?php }; ?> value="EN">EN</option>  
	    <option <?php if ($_POST["language"] == 'BG') { ?>selected <?php }; ?> value="BG">BG</option>  
	    <option <?php if ($_POST["language"] == 'FR') { ?>selected <?php }; ?> value="FR">FR</option>  
	    <option <?php if ($_POST["language"] == 'HU') { ?>selected <?php }; ?> value="HU">HU</option>  
	    <option <?php if ($_POST["language"] == 'NL') { ?>selected <?php }; ?> value="NL">NL</option>  
	    <option <?php if ($_POST["language"] == 'ES') { ?>selected <?php }; ?> value="ES">ES</option>  
	    <option <?php if ($_POST["language"] == 'IT') { ?>selected <?php }; ?> value="IT">IT</option>  
	    <option <?php if ($_POST["language"] == 'CS') { ?>selected <?php }; ?> value="CS">CS</option>  
	    <option <?php if ($_POST["language"] == 'HR') { ?>selected <?php }; ?> value="HR">HR</option>  
	    <option <?php if ($_POST["language"] == 'SK') { ?>selected <?php }; ?> value="SK">SK</option>  
	    <option <?php if ($_POST["language"] == 'SL') { ?>selected <?php }; ?> value="SL">SL</option>  
	    <option <?php if ($_POST["language"] == 'SR') { ?>selected <?php }; ?> value="SR">SR</option>  
	    <option <?php if ($_POST["language"] == 'RO') { ?>selected <?php }; ?> value="RO">RO</option>  
	    <option <?php if ($_POST["language"] == 'RU') { ?>selected <?php }; ?> value="RU">RU</option>
	    <option <?php if ($_POST["language"] == 'PL') { ?>selected <?php }; ?> value="PL">PL</option>  
	    <option <?php if ($_POST["language"] == 'PT') { ?>selected <?php }; ?> value="PT">PT</option>  
	    <option <?php if ($_POST["language"] == 'TR') { ?>selected <?php }; ?> value="TR">TR</option>  
	    <option <?php if ($_POST["language"] == 'ZH') { ?>selected <?php }; ?> value="ZH">ZH</option>  
	    <option <?php if ($_POST["language"] == 'JA') { ?>selected <?php }; ?> value="JA">JA</option>  
	    <option <?php if ($_POST["language"] == 'DA') { ?>selected <?php }; ?> value="DA">DA</option>  
	    <option <?php if ($_POST["language"] == 'FI') { ?>selected <?php }; ?> value="FI">FI</option>  
	    <option <?php if ($_POST["language"] == 'SV') { ?>selected <?php }; ?> value="SV">SV</option>  
	    <option <?php if ($_POST["language"] == 'NO') { ?>selected <?php }; ?> value="NO">NO</option>  
	    <option <?php if ($_POST["language"] == 'UK') { ?>selected <?php }; ?> value="UK">UK</option>  
	    <option <?php if ($_POST["language"] == 'EL') { ?>selected <?php }; ?> value="EL">EL</option>  
	  </select>
	  <span>Choose the language of the payment page</span>
	</li>
	<li>
	  <label>Currency</label>
	  <input type="text" name="currency" pattern="[A-Z]{3}" value="<?php echo isset($_POST['currency']) ? $_POST['currency'] : '' ?>">
	  <span>Choose the currency e.g.: EUR, USD, CHF</span>
	</li>
	<li>
	  <label>CustomerID</label>
	  <input type="text" name="customerid" value="<?php echo isset($_POST['customerid']) ? $_POST['customerid'] : '' ?>">
	  <span>Define a customerID for profile creation e.g.: 123-456-789</span>
	</li>
	<li>
	  <label>Useprofile</label>
	  <select name="useprofile">
	    <option <?php if ($_POST['useprofile'] == 'false') { ?>selected <?php }; ?> value="false">False</option>  
	  	<option <?php if ($_POST['useprofile'] == 'true')  { ?>selected <?php }; ?> value="true">True</option>
	  </select>
	  <span>Should mPAY24 store the entered payment data?</span>
	</li>
	<li>
	  <label>Userfield</label>
	  <input type="text" name="userfield" value="<?php echo isset($_POST['userfield']) ? $_POST['userfield'] : '' ?>">
	  <span>Dummy field - is communicated over the URLs</span>
	</li>
	<li>
	  <label>GatherBillingAddress</label>
	  <select name="gatherbilladdress">
	    <option <?php if ($_POST['gatherbilladdress'] == 'true')  { ?>selected <?php }; ?> value="true">True</option>
	    <option <?php if ($_POST['gatherbilladdress'] == 'false') { ?>selected <?php }; ?> value="false">False</option>
	  </select>
	  <span>Should mPAY24 ask the customer for his BillingAddress?</span>
	</li>
	<li>
	  <label>BillingMode</label>
	  <select name="billingmode">
	  	<option <?php if ($_POST['billingmode'] == 'ReadWrite')  { ?>selected <?php }; ?> value="ReadWrite">ReadWrite</option>
	  	<option <?php if ($_POST['billingmode'] == 'ReadOnly')   { ?>selected <?php }; ?> value="ReadOnly">ReadOnly</option>  
	  </select>
	  <span>Should the BillingAddress editable?</span>
	</li>
	<li>
	  <label>Name</label>
	  <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
	  <span>Provide the customer name</span>
	</li>
	<li>
	  <label>IsValidTill</label>
	  <input type="text" name="isvalidtill"  id="isvalidtill" value="<?php echo isset($_POST['isvalidtill']) ? $_POST['isvalidtill'] : '' ?>">
	  <span>Provide a expiry date for the flex LINK</span>
	</li>	
	<li>
	  <label id="successlabel">SuccessURL</label>
	  <input type="url" name="success_url" pattern="https?://.+" title="Include http://" value="<?php echo isset($_POST['success_url']) ? $_POST['success_url'] : '' ?>">
	  <span>The redirect URL to your success page</span>
	</li>
	<li>
	  <label id="errorlabel">ErrorURL</label>
	  <input type="url" name="error_url" pattern="https?://.+" title="Include http://"value="<?php echo isset($_POST['error_url']) ? $_POST['error_url'] : '' ?>">
	  <span>The redirect URL to your error page</span>
	</li>
	<li>
	  <label id="confirmationlabel">ConfirmationURL</label>
	  <input type="url" name="confirmation_url" pattern="https?://.+" title="Include http://" value="<?php echo isset($_POST['confirmation_url']) ? $_POST['confirmation_url'] : '' ?>">
	  <span>The confirmation URL for payment notification</span>
	</li>
	<li>
  		<input type="submit" value="submit" name="submit">
  		<div id="errordiv">Please fill all URL fields, or leave them empty.</div>
	</li>
	</ul>
</form>
</body>
</html>

<?php 
/**
 *						A FlexLink generation tool (Link integration)
 * @author              mPAY24 GmbH <support@mpay24.com> - zirnipa
 * @version             1.0
 * @filesource          index.php
 * @license             http://ec.europa.eu/idabc/eupl.html EUPL, Version 1.1
 */

include_once ("core/MPAY24.php");
include_once ("config/config.php");

// Define default values
$TID = $_POST["tid"];
$AMOUNT = $_POST["amount"];
$LANGUAGE = $_POST["language"];
$CURRENCY = $_POST["currency"];
$CUSTOMER_ID = $_POST["customerid"];
$USEPROFILE = $_POST["useprofile"];
$USER_FIELD = $_POST["userfield"];
$MODE = $_POST["billingmode"]; 
$NAME = $_POST["name"];
$ISVALIDTILL = $_POST["isvalidtill"];
$GATHERBILLADDRESS = $_POST["gatherbilladdress"];
$SALUTATION = ''; // M or F
$STREET = '';
$STREET2 = '';
$ZIP = '';
$CITY = '';
$COUNTRY = '';
$EMAIL = '';
$PHONE = '';

//its recommended to set the URLs within the Merchant Interface (shortens the flex Link)
$SUCCESS_URL = $_POST["success_url"];
$ERROR_URL = $_POST["error_url"];
$CONFIRMATION_URL = $_POST["confirmation_url"];


/**
 * The class MyFlexLINK extends the abstract class MPay24flexLINK and implements the log-fuction for this class
 *
 * @author mPAY24 GmbH <support@mpay24.com>
 * @version $Id: test.php 6271 2015-04-09 08:38:50Z anna $
 * @filesource test.php
 * @license http://ec.europa.eu/idabc/eupl.html EUPL, Version 1.1
 */
class MyFlexLINK extends MPay24flexLINK {
	/**
	 * Write a flexLINK log into flexLINK.log
	 *
	 * @param string $info_to_log
	 *          The information, which is to log: request, response, etc.
	 */
	function write_flexLINK_log($info_to_log) {
		// This function should be only implemented in case the flexLINK functionality was implmented and will be used
		// $fh = fopen("logs/flexLINK.log", 'a+') or die("can't open file");
		// $MessageDate = date("Y-m-d H:i:s");
		// $Message= $MessageDate." ".$_SERVER['SERVER_NAME']." mPAY24 : ";
		// $result = $Message."$info_to_log\n";
		// fwrite($fh, $result);
		// fclose($fh);
	}
}

if(isset($_POST["submit"])) {
$myLink = new MyFlexLINK(SPID, FLEX_LINK_PASS, TEST_SYSTEM, DEBUG);
$encryptedParams = $myLink->getEncryptedParams(
		$TID,
		$AMOUNT,
		$CURRENCY,
		$CUSTOMER_ID,
		$USEPROFILE,
		$LANGUAGE,
		$USER_FIELD,
		$MODE,
		$SALUTATION,
		$NAME,
		$ISVALIDTILL,
		$GATHERBILLADDRESS,
		$STREET,
		$STREET2,
		$ZIP,
		$CITY,
		$COUNTRY,
		$EMAIL,
		$PHONE,
		$SUCCESS_URL,
		$ERROR_URL,
		$CONFIRMATION_URL
		);
$link = $myLink->getPayLink($encryptedParams);
$link = preg_replace( "/\r|\n/", "", $link );
?>
<div id="link" class="link">
<a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a>
<span class="span">
<button class="btn" type="button" data-clipboard-text="<?php echo $link ?>" id="btn">
<img class="clippy" src="clippy.svg" alt="Copy to clipboard" title="Copy to clipboard">
</button>
</span>
</div>

<?php
$linkencoded = urlencode($link);
?>
<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo $linkencoded; ?>' title='flexLINK' />
</div>
<?php
}
?>
<script>
   var btn = document.getElementById('btn');
   var clipboard = new Clipboard(btn);
   clipboard.on('success', function(e) {
       console.log(e);
   });
   clipboard.on('error', function(e) {
       console.log(e);
   });
</script>