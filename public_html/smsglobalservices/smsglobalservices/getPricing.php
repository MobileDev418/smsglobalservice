<div class="formdiv">

	<div style="width:620px; margin:auto;">

<?php

include_once "admin/ez_sql.php";
/* File to diplsay sms packages */

$packages=$db->get_results("select * from package where publish=1");

if ($packages)

{

	$i=1;

?>

<table width="100%" cellpadding="0" cellspacing="0" class="grid">

          <tr class="heading">

          	<td width="8%">Sr #</td>

          

            <td width="18%">SMS Range</td>

             <td width="16%">Cost/Unit</td>

            <td width="40%">Description</td>

            <?php if ($_SESSION['cus_login']=="yes")

           {

			   ?>

            <td colspan="2">Quantity Required</td>

            <?php

   

           }

		   ?>

          </tr>

<?php

	foreach ($packages as $pack)

	{

?>

          <tr>

          <td style="vertical-align:middle"><?php echo $i++; ?></td>

          <td style="vertical-align:middle" ><?php echo $pack->sms_lower."-".$pack->sms_upper; ?></td>

           <td style="vertical-align:middle" ><?php echo "$". $pack->cost; ?></td>

          <td style="vertical-align:middle" ><?php echo $pack->description; ?></td>

         

             <?php if ($_SESSION['cus_login']=="yes")

           {

			  ?>

			   

           <form method="post" action="sendpaypal.php" onsubmit="return checkrange(this, <?php echo $pack->sms_lower.",".$pack->sms_upper?>)"><td width="7%" style="vertical-align:middle"><input type="hidden" name="cost" value="<?php echo $pack->cost; ?>"  /><input type="hidden" name="packtitle" value="<?php echo $pack->package; ?>"  /><input type="text" name="amount" onkeypress="return isNumberKey(event)" size="7" /></td><td width="11%" style="vertical-align:middle"><input type="image" src="images/buynow.png" name="buynow" value="Buy Now"/></td></form>

            <?php



		   }

			?>

          </tr>

         <?php

	}

?>

        </table>

<?php

}

else

	echo "Currenlty no package is available";

?> 

</div>

</div>