<!--Right side of template-->
				</div>

			</div>

		</div>

	</div>

</div>



<?php

if($_SESSION['cus_login']=='yes' || $_SESSION['cus_activated']=='yes')
//Check for customer login if user is login then show user menu
{
	

	?>

<div class="rt-grid-3 ">

<div id="rt-sidebar-b">

    <div class="box7">

            <div class="rt-block">

                <div class="module-content">

                    <div class="module-title"><h2 class="title">Welcome <?php echo $_SESSION['cus_uname']; ?></h2></div>

                    <div class="clear"></div>

                    <div class="module-inner">

                    <?php

						$cus=$db->get_row("select credits, balance, credits_used, free_sms  from customer where cus_id=".$_SESSION['cus_id']);

						echo '<em class="color">Credit Alloted: </em>'.$cus->credits;

						echo '<em class="color"><br/>Credit Used: </em>'.$cus->credits_used;

						echo '<em class="color"><br/>Balance: </em>'.$cus->balance;

						/*if($cus->buy_status==0)

						{

							echo '<em class="color"><br/>Todays Free SMS: </em>'.$cus->free_sms;

						}*/	

                    	

					?>

                    </div>

                 </div>

             </div>

    </div>



    <div class="box5">

    	<div class="rt-block">

			<div class="module-content">

	        	<div class="module-title"><h2 class="title">User Menu</h2></div>

				<div class="clear"></div>

                <div class="module-inner">

                	<ul class="menu level1" >

                    	<li class="item8 <?php

						if($menu==1)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="index.php"><span>Home</span></a></li>	

						<li class="item9 <?php

						if($menu==9)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="send_sms.php"><span>Send SMS</span></a></li>	

                         <li class="item10 <?php

						if($menu==10)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="sms_history.php"><span>Delivery Report</em></span></a></li>

                        <li class="item11 <?php

						if($menu==11)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="sms_q.php"><span>SMS in Queue</em></span></a></li>	

						<li class="item12 <?php

						if($menu==4)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="pricing.php"><span>Purchase SMS</span></a></li>	

						<li class="item13 <?php

						if($menu==13)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="groups.php"><span>Groups</em></span></a></li>	

						<li class="item14 <?php

						if($menu==14)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="contacts.php"><span>Contacts</em></span></a></li>

                         <li class="item15 <?php

						if($menu==15)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="profile.php"><span>My Profile</em></span></a></li>	

                         <li class="item16 <?php

						if($menu==16)

							echo "active";

						else

							echo "parent";

						 ?>" ><a class="orphan item" href="change_password.php"><span>Change Password</em></span></a></li>		

						



                         <li class="item17" ><a class="orphan item" href="cus_signout.php" onclick="return confirm('Are you sure to Log out?')"><span>Log Out</span></a></li>	

                        </ul>

                </div>

   			 </div>

         </div>

      </div>

      </div>

      </div>



    <?php

}

else

{

?>

<div class="rt-grid-3 ">

	<div id="rt-sidebar-b">

    	<div class="box5">

        	<div class="rt-block">

            	<div class="module-content">

                	<div class="module-title"><h2 class="title">User login</h2></div>

                    	<div class="clear"></div>

                        	<div class="module-inner">

							<?php echo $_SESSION['login_err'];

							$_SESSION['login_err']="";

							 ?>

                            	<form action="cus_signin.php" method="post" name="login" id="form-login" >

                                	<fieldset class="input">

                                    	<p id="form-login-username">

                                        	<label for="modlgn_username">Username</label><br />

                                            <input id="modlgn_username" type="text" name="username" class="inputbox" alt="username" size="18" />

										</p>

										<p id="form-login-password">

											<label for="modlgn_passwd">Password</label><br />

                                            <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" alt="password" />

										</p>

										<!--<p id="form-login-remember">

											<input type="checkbox" name="remember" class="checkbox" value="yes" alt="Remember Me" />

											<label class="remember">Remember Me</label>

										</p>-->

                                        <div class="readon"><input type="submit" name="Submit" class="button" value="Login" /></div>

									</fieldset>

                                    <ul>

                                        <li><a href="register.php">Create an account</a></li>

                                        <li><a href="activate_code.php">Activate your account</a></li>

                                        <li><a href="recoverpassword.php">Forgot your password?</a></li>

                                    </ul>

                                    <input type="hidden" name="option" value="com_user" />

                                    <input type="hidden" name="task" value="login" />

                                    <input type="hidden" name="return" value="L3Ntc2dsb2JhbHNlcnZpY2VzLw==" />

                                    <input type="hidden" name="d87a362f13cbb350aaf437fb715c9597" value="1" /></form>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

<?php

}

?>

		<div class="clear"></div>

	</div>



<?php

if($menu!=1)

	echo "</div>";

?>



