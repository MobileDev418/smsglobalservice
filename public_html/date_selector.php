<link rel="stylesheet" type="text/css" href="css/epoch_styles.css" />
<script type="text/javascript" src="js/epoch_classes.js"></script>
<script type="text/javascript">
/*You can also place this code in a separate file and link to it like epoch_classes.js*/
	var dp_cal;      
window.onload = function () {
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container'));
};
</script>
<tr>
		<td ></td>
        <td width="72%" align="left" ><input name="send_opt" id="send_opt1" type="radio" checked="checked" value="1" onclick="changeSendOpt(1)" />
          <span class="caption">          Send Message 
        Instantantly</span><br />
        <input name="send_opt" id="send_opt2" type="radio" onclick="changeSendOpt(2)" value="2"  />
        <span class="caption">Select Data and Time</span></td>
        </tr>
 <tr align="center" id="date_row">
        <td colspan="2">
        <span id='date_time' style="color:#CCCCCC">
        Date: 
        <input id="popup_container"  type="text" value="" name="send_date"  readonly="readonly" style="width:90px" disabled />&nbsp;
        <select disabled name="send_time" id="time_picker"
        ><option value="01:00:00" >1:00 </option>
        <option value="02:00:00" s>2:00 </option>
        <option value="03:00:00">3:00 </option>
        <option value="04:00:00">4:00 </option>
        <option value="05:00:00">5:00 </option>
        <option value="06:00:00">6:00 </option>
        <option value="07:00:00">7:00 </option>
        <option value="08:00:00">8:00 </option>
        <option value="09:00:00">9:00 </option>
        <option value="10:00:00">10:00 </option>
        <option value="11:00:00">11:00 </option>
        <option value="12:00:00" selected="selected">12:00 </option>
        <option value="13:00:00">13:00 </option>
        <option value="14:00:00">14:00 </option>
        <option value="15:00:00">15:00 </option>
        <option value="16:00:00">16:00 </option>
        <option value="17:00:00">17:00 </option>
        <option value="18:00:00">18:00 </option>
        <option value="19:00:00">19:00 </option>
        <option value="20:00:00">20:00 </option>
        <option value="21:00:00">21:00 </option>
        <option value="22:00:00">22:00 </option>
        <option value="23:00:00">23:00 </option>
        <option value="00:00:00">00:00 </option>
        </select>
        
        o, clock<br/>
        ( * Messages will be sent according to time GMT +1)
        </span></td>
</tr>


