

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	ELS Boka Direkt
</title><meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <script src='//Script/jquery-1.6.4.min.js' type="text/javascript"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><meta content="R-CARD M5 Webbokning för ELS (ELS Boka Direkt)" name="description"><link href="../styles.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript">
        $(document).ready(function () {
            var messagediv = $('div[id$="PanelMessage"]');
            messagediv.hide();

            var message = $('span[id$="MessageText"]');

            var msgImg = $('img[id$="MessageImg"]');
            
            if (message.text().length > 0) {
                var msgType = $('input[id$="MessageType"]');
                if (msgType.val() == 'ERROR') {
                    msgImg.attr('src', '//'  +  'grafik/error.png');
                } else if (msgType.val() == 'OK') {
                    msgImg.attr('src', '//' + 'grafik/Ok32.png');
                }
                else if(msgType.val() == 'INFO') {
                    msgImg.attr('src', '//' + 'grafik/information.png');
                }
                else if(msgType.val() == 'WARN') {
                    msgImg.attr('src', '//' + 'grafik/warning.png');
                }
                messagediv.show('fast');  
            }
            
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            var status = $('div[id$="status"]');
            status.each(function (index, val) {

                if (val.id.indexOf("_status") > -1 && $(val).find(":hidden").val() == "false") {
                    $(val).hide("fast");
                    $("#" + val.id.replace("status", "divexpand")).click(open);
                    $("#" + val.id.replace("status", "openimg")).attr("src", "../grafik/opener_opened.png");
                }
                else {
                    $(val).show();
                    $("#" + val.id.replace("status", "divexpand")).click(close);
                }

            });
        });


        function open() {
            $("#" + this.id.replace("divexpand", "status")).show("fast");
            $("#" + this.id.replace("divexpand", "openimg")).attr("src", "../grafik/opener_closed.png");
            $(this).unbind('click');
            $(this).click(close);
        }
        function close() {
            $("#" + this.id.replace("divexpand", "status")).hide("fast");
            $("#" + this.id.replace("divexpand", "openimg")).attr("src", "../grafik/opener_opened.png");
            $(this).unbind('click');
            $(this).click(open);
        }

    </script>
</head>
<body>
    <form name="aspnetForm" method="post" action="BookingMain.aspx" id="aspnetForm">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJNjQ2Mzg3OTE0D2QWAmYPZBYCAgMPZBYYZg8PFgYeBFRleHQFFlPDuG5kYWcgMTMgTm92IDE6MjQgUE0eCUZvcmVopE" />

<script type="text/javascript">
<!--
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
// -->
</script>


<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="C94A2B88" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWDALcnu6tDALJm/e8BAKA6dy/CgLQ4o2BBQLjr9TEBgKa+MPhDQK2+PJ+n+Q" />
    <div style="border: 1px solid #808080; min-height: 470px; width: 772px; margin-left: auto; -moz-border-radius: 5px; border-radius: 5px;
        margin-right: auto">
        <table style="background-color: #fff" cellspacing="6" cellpadding="0" width="680"
            align="center" border="0">
            <tr>
                <td colspan="2">
                    <img src='//grafik/logo.jpg'>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="right">
                        <span id="_ctl0_lbTid" class="ELS_S" style="color:#000000;">Søndag 13 Nov 1:24 PM</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="buttons" style="float:left" >
                          
                        <a id="_ctl0_LinkButtonInformation" class="regular" href="javascript:__doPostBack('_ctl0$LinkButtonInformation','')">
                                <img src="//grafik/information.png" alt=""/>
                               Info </a>

                        <a id="_ctl0_LinkMain" class="regular" href="javascript:__doPostBack('_ctl0$LinkMain','')" style="min-width:75px;border:2px solid #9CF;cursor:default;">
                                <img src="//grafik/person.png" alt="" />
                                Min side</a>

                        <a id="_ctl0_LinkBooking" class="regular" href="javascript:__doPostBack('_ctl0$LinkBooking','')" style="min-width: 75px">
                                <img src="//grafik/calendar.png" alt=""/>
                                Bestille</a>

                        <a id="_ctl0_LinkStatus" class="regular" href="javascript:__doPostBack('_ctl0$LinkStatus','')" style="min-width: 75px">
                            <img  src="//grafik/status.png" alt=""/>
                                Status</a>

                        <a id="_ctl0_LinkBalance" class="regular" href="javascript:__doPostBack('_ctl0$LinkBalance','')" style="min-width: 75px">
                                <img src="//grafik/balance.png" alt=""/>
                                Saldo</a>

                        <a id="_ctl0_LinkSettings" class="regular" href="javascript:__doPostBack('_ctl0$LinkSettings','')" style="min-width: 75px">
                                <img src="//grafik/settings.png" alt=""/>
                                Indstillinger</a>
                        
                    </div>
                    
                    <div class="buttons" style="text-align: right; margin-bottom:10px">
                            <a id="_ctl0_LinkLogOut" class="regular" href="javascript:__doPostBack('_ctl0$LinkLogOut','')" style="min-width: 75px">
                                 <img src="//grafik/unlock.png" alt=""/>
                                 Log ud</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div id="_ctl0_PanelMessage" class="panel">
	
                    <div  style="margin-top: 1px;float:left; margin-right: 5px; margin-left: 5px">
                        <img id="_ctl0_MessageImg" src="../grafik/error.png" align="bottom" border="0" style="height:20px;width:20px;" />    
                    </div>
                    <div  style="margin-top: 5px">
                        <span id="_ctl0_MessageText"></span>    
                    </div>
                    
                    <input type="hidden" name="_ctl0:MessageType" id="_ctl0_MessageType" value="ERROR" />
                
</div>    
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    
    
    <div class="panel">
        <div id="_ctl0_ContentPlaceHolder1_divexpand" style="cursor: pointer">
            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                <div style="float: left">
                    <img src="../grafik/calendar.png" alt="" width="20px" height="20px" /></div>
                <div style="float: left; margin-left:5px">
                    <span id="_ctl0_ContentPlaceHolder1_lbBokningarRubrik" style="color:#000000;">Dine nuværende bestillinger ( 2 )</span>
                </div>
                <div id="imgExpand" style="text-align: right">
                    <img src="../grafik/opener_closed.png" id="_ctl0_ContentPlaceHolder1_openimg" />
                </div>
            </div>
        </div>
        <div id="_ctl0_ContentPlaceHolder1_status" style="">
            <div style="height: 5px">
                <input type="hidden" name="_ctl0:ContentPlaceHolder1:ShowExpand" id="_ctl0_ContentPlaceHolder1_ShowExpand" value="true" />
            </div>
            
            <div style="margin-left: 20px;min-height: 100px">
                <table class="ELS_S" cellspacing="3" cellpadding="0" border="0" id="_ctl0_ContentPlaceHolder1_DataGridBookings" style="color:#000000;border-width:0px;">
	<tr style="background-color:#EFF3FB;">
		<td style="width:150px;">Tirsdag 15 Nov</td><td style="width:150px;">VASK 2</td><td>19:00</td><td>-</td><td style="width:55px;">21:00</td><td><input type="submit" name="_ctl0:ContentPlaceHolder1:DataGridBookings:_ctl2:_ctl0" value="Afbestille" /></td>
	</tr><tr style="background-color:White;">
		<td style="width:150px;">Tirsdag 15 Nov</td><td style="width:150px;">VASK 3</td><td>19:00</td><td>-</td><td style="width:55px;">21:00</td><td><input type="submit" name="_ctl0:ContentPlaceHolder1:DataGridBookings:_ctl3:_ctl0" value="Afbestille" /></td>
	</tr>
</table>
                
            </div>
        </div>
    </div>

    
    
    

                    
                </td>
            </tr>
        </table>
    </div>
    <div align="center">
        <span id="_ctl0_lbCopyright" style="font-family:Arial;"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span id="_ctl0_lbVersion" style="font-family:Arial;">Version 1.2.0.2 Copyright Electrolux Laundry System Sweden AB</span>
    </div>
    <div align="center">
        
    </div>
    </form>
</body>
</html>
