

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
    
</head>
<body>
    <form name="aspnetForm" method="post" action="MachineGroup.aspx" id="aspnetForm">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQwMTEzOTIzNA9kFgJmD2QWAgIDD2QW=" />

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


<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="660AE50D" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWDgKtz+aZCwLJm/e8BAKA6dy/CgLQ4o2BBQLjr9TEBgKa+MPhDQK2+PfJCwK886fmBwKYhs/kAgKuqLpMjpO" />
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
                        <span id="_ctl0_lbTid" class="ELS_S" style="color:#000000;">Søndag 20 Nov 12:15 AM</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="buttons" style="float:left" >
                          
                        <a id="_ctl0_LinkButtonInformation" class="regular" href="javascript:__doPostBack('_ctl0$LinkButtonInformation','')">
                                <img src="//grafik/information.png" alt=""/>
                               Info </a>

                        <a id="_ctl0_LinkMain" class="regular" href="javascript:__doPostBack('_ctl0$LinkMain','')" style="min-width: 75px;">
                                <img src="//grafik/person.png" alt="" />
                                Min side</a>

                        <a id="_ctl0_LinkBooking" class="regular" href="javascript:__doPostBack('_ctl0$LinkBooking','')" style="min-width:75px;border:2px solid #9CF;cursor:default;">
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
                        <span id="_ctl0_MessageText">Du har 6 bestillinger tilbage.</span>    
                    </div>
                    
                    <input type="hidden" name="_ctl0:MessageType" id="_ctl0_MessageType" value="INFO" />
                
</div>    
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    
    <div class="panel">
        <div id="_ctl0_ContentPlaceHolder1_infodivexpand">
            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                <div style="float: left">
                    <img src="../grafik/calendar.png" alt="" width="20px" height="20px" /></div>
                <div style="float: left; margin-left: 5px; text-align: center">
                    <span id="_ctl0_ContentPlaceHolder1_lbMaskingruppRubrik" style="color:#000000;">Bestille</span>
                </div>
            </div>
        </div>
        <div id="_ctl0_ContentPlaceHolder1_infostatus" style="min-height: 247px">
            <div style="height: 5px">
            </div>
            <div style="">
                <div align="center">
                    <span id="_ctl0_ContentPlaceHolder1_lbMaskingruppValdtidRubrik" class="ELS_L" style="color:#000000;">Valgt tid:</span><br>
                    <table width="400">
                        <tr>
                            <td align="center" width="50%">
                                <span id="_ctl0_ContentPlaceHolder1_lbMaskingruppValdDag" class="ELS_M" style="color:#000000;">Sunday 20 November</span>
                            </td>
                            <td align="center" width="50%">
                                <span id="_ctl0_ContentPlaceHolder1_lbMaskingruppValdTid" class="ELS_M" style="color:#000000;">07:00 - 09:00</span>
                            </td>
                        </tr>
                    </table>
                    <br>
                    
                    <br>
                    
                    <table width="500" align="center">
                        <tr>
                            <td align="center" width="25%">
                                <input type="submit" name="_ctl0:ContentPlaceHolder1:bt2Maskingrupp0" value="VASK 1" id="_ctl0_ContentPlaceHolder1_bt2Maskingrupp0" disabled="disabled" tabindex="2" style="width: 120px; height: 50px; color: C0C0C0; background-color: #F00000; border: solid 1px #000;" />
                            </td>
                            <td align="center" width="25%">
                                <input type="submit" name="_ctl0:ContentPlaceHolder1:bt2Maskingrupp1" value="VASK 2" id="_ctl0_ContentPlaceHolder1_bt2Maskingrupp1" tabindex="3" style="width: 120px; height: 50px; color: 000000; background-color: #00A000; border: solid 1px #000;" />
                            </td>
                            <td align="center" width="25%">
                                <input type="submit" name="_ctl0:ContentPlaceHolder1:bt2Maskingrupp2" value="VASK 3" id="_ctl0_ContentPlaceHolder1_bt2Maskingrupp2" tabindex="4" style="width:120px;height:50px;color:000000;background-color:#00A000;border:solid 3px #000;" />
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                            <td align="center" width="25%">
                                
                            </td>
                        </tr>
                    </table>
                    <br>
                    
                    <br>
                    <br>
                    <input type="submit" name="_ctl0:ContentPlaceHolder1:btMaskingruppBack" value="Tilbage" id="_ctl0_ContentPlaceHolder1_btMaskingruppBack" tabindex="20" class="ELS_M" />
                    <input type="submit" name="_ctl0:ContentPlaceHolder1:btMaskingruppRandom" value="Bestille" id="_ctl0_ContentPlaceHolder1_btMaskingruppRandom" tabindex="1" class="ELS_M" /><br/>
                    <br>
                </div>
            </div>
        </div>
        <br>
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
