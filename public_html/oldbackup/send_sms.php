<?php
	include_once "iscustomer.php";
	$heading='Send SMS';
	$menu=9;
?>
<?php
	include_once "header.php";
?>
<style>

</style>
<div class="formdiv">
 	<div class="actionform" style="text-align:left;">
	    <div class="smsoptions">
            <div><a href="single_sms.php"><span>1</span>&nbsp;&nbsp;&nbsp;Single SMS</a></div>
            <div><a href="bulksms.php"><span>2</span>&nbsp;&nbsp;&nbsp;Bulk SMS</a></div>
            <div><a href="contacts.php"><span>3</span>&nbsp;&nbsp;&nbsp;Contact SMS</a></div>
            <div><a href="groups.php"><span>4</span>&nbsp;&nbsp;&nbsp;Group SMS</a></div>
		</div>
       	
	</div>
</div>

<?php
	include_once "right.php";
	include_once "footer.php";
?>
