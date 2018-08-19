

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
    
    <script src="../Script/jquery.countdown.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            //$("#imgExpand").click(open);
            var status = $('div[id$="status"]');
            status.each(function (index, val) {
                
                /*Do the machine group belongs to me?*/
                if ($(val).find(":hidden").val() == "False") {
                    $(val).hide();
                    $("#" + val.id.replace("status", "divexpand")).click(open);
                } else {
                    $("#" + val.id.replace("status", "divexpand")).click(close);
                    $("#" + val.id.replace("status", "openimg")).attr("src", "../grafik/opener_closed.png");
                }
                
            });
        });


        function open() {
            $("#" + this.id.replace("divexpand", "status")).show("slow");
            $("#" + this.id.replace("divexpand", "openimg")).attr("src", "../grafik/opener_closed.png");
            $(this).unbind('click');
            $(this).click(close);
        }
        function close() {
            $("#" + this.id.replace("divexpand", "status")).hide("slow");
            $("#" + this.id.replace("divexpand", "openimg")).attr("src", "../grafik/opener_opened.png");
            $(this).unbind('click');
            $(this).click(open);
        }

    </script>
</head>
<body>
    <form name="aspnetForm" method="post" action="MachineGroupStat.aspx" id="aspnetForm">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE3Njg5NTM4ODEPZBYCZg9kFgICAw9kFhhmDw8WBh4EVGV4dAUWU8O4bmRhZyAxMyBOb3YgNjowOCBQTR4JRm9yZUNvbG9yCQAA" />

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


<script type='text/javascript'>$(function () {
$('#' + '_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_Repeater3__ctl1_divTimeLeft').countdown({ until: '+0h +27m +46s,', layout: '{hnn}:{mnn}:{snn}' });
$('#' + '_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_Repeater3__ctl1_divTimeLeft').countdown({ until: '+0h +28m +46s,', layout: '{hnn}:{mnn}:{snn}' });
 });</script>
<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="2332A06C" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWDgLQnoH6BgLJm/e8BAKA6dy/CgLQ4o2BBQLjr9TEBgKa+MPhDQK2+PfJCwK886fmBwKYh" />
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
                        <span id="_ctl0_lbTid" class="ELS_S" style="color:#000000;">Søndag 13 Nov 6:08 PM</span>
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

                        <a id="_ctl0_LinkBooking" class="regular" href="javascript:__doPostBack('_ctl0$LinkBooking','')" style="min-width: 75px">
                                <img src="//grafik/calendar.png" alt=""/> 
                                Bestille</a>

                        <a id="_ctl0_LinkStatus" class="regular" href="javascript:__doPostBack('_ctl0$LinkStatus','')" style="min-width:75px;border:2px solid #9CF;cursor:default;">
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
                    
    
    
            <div style="clear: left; height: 29px;">
                <div style="float: left">
                    <img id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_ImageSymbol" src="../grafik/SymWash.png" border="0" style="height:25px;width:25px;" />
                </div>
                <div style="height: 25px;padding-top: 6px; padding-left: 28px;" >
                    <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_MachineName">Bestil vasketid</span>    
                </div>
                
            </div>
            
            
                    <div style="border: thin solid #99CCFF; -moz-border-radius: 5px; border-radius: 5px;
                        width: 365px; float: left; margin-right: 2px;margin-top: 5px">
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_divexpand" style="cursor:pointer">
                            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                                <div style="float: left">
                                    <img src="../grafik/gears.png" /></div>
                                <div style="float: left">
                                   <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_MaskGrpTitle">VASK 1 (Ledig)</span>
                                   
                                </div>
                                <div id="imgExpand" style="text-align: right">
                                    <img src="../grafik/opener_opened.png" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_openimg" />
                                </div>
                            </div>
                        </div>
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_status" style="min-height: 100px">
                            <input type="hidden" name="_ctl0:ContentPlaceHolder1:Repeater1:_ctl0:Repeater2:_ctl0:BookedByMe" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_BookedByMe" value="False" />
                            <div style="height: 5px">
                            </div>
                            
                            
                                   <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                    </tr>
                                
                                    <tr style="background-color:#F0F0F0;">
                                        <td>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_Repeater3__ctl1_divMachineStatus" style="float: left">
	
                                                <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_Repeater3__ctl1_LabelStatus">VASK 1 Afsluttedes 09:40</span>    
                                            
</div>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl0_Repeater3__ctl1_divTimeLeft" style="text-align: right">
	
                                                
                                            
</div>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </div>
                    </div>
                    
                
                    <div style="border: thin solid #99CCFF; -moz-border-radius: 5px; border-radius: 5px;
                        width: 365px; float: left; margin-right: 2px;margin-top: 5px">
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_divexpand" style="cursor:pointer">
                            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                                <div style="float: left">
                                    <img src="../grafik/gears.png" /></div>
                                <div style="float: left">
                                   <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_MaskGrpTitle">VASK 2 (Optaget, startet)</span>
                                   
                                </div>
                                <div id="imgExpand" style="text-align: right">
                                    <img src="../grafik/opener_opened.png" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_openimg" />
                                </div>
                            </div>
                        </div>
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_status" style="min-height: 100px">
                            <input type="hidden" name="_ctl0:ContentPlaceHolder1:Repeater1:_ctl0:Repeater2:_ctl1:BookedByMe" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_BookedByMe" value="False" />
                            <div style="height: 5px">
                            </div>
                            
                            
                                   <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                    </tr>
                                
                                    <tr style="background-color:#F0F0F0;">
                                        <td>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_Repeater3__ctl1_divMachineStatus" style="float: left">
	
                                                <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_Repeater3__ctl1_LabelStatus">VASK 2 Klar ca: 18:36</span>    
                                            
</div>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl1_Repeater3__ctl1_divTimeLeft" style="text-align: right">
	
                                                
                                            
</div>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </div>
                    </div>
                    
                
                    <div style="border: thin solid #99CCFF; -moz-border-radius: 5px; border-radius: 5px;
                        width: 365px; float: left; margin-right: 2px;margin-top: 5px">
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_divexpand" style="cursor:pointer">
                            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                                <div style="float: left">
                                    <img src="../grafik/gears.png" /></div>
                                <div style="float: left">
                                   <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_MaskGrpTitle">VASK 3 (Optaget, startet)</span>
                                   
                                </div>
                                <div id="imgExpand" style="text-align: right">
                                    <img src="../grafik/opener_opened.png" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_openimg" />
                                </div>
                            </div>
                        </div>
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_status" style="min-height: 100px">
                            <input type="hidden" name="_ctl0:ContentPlaceHolder1:Repeater1:_ctl0:Repeater2:_ctl2:BookedByMe" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_BookedByMe" value="False" />
                            <div style="height: 5px">
                            </div>
                            
                            
                                   <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                    </tr>
                                
                                    <tr style="background-color:#F0F0F0;">
                                        <td>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_Repeater3__ctl1_divMachineStatus" style="float: left">
	
                                                <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_Repeater3__ctl1_LabelStatus">VASK 3 Klar ca: 18:37</span>    
                                            
</div>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl0_Repeater2__ctl2_Repeater3__ctl1_divTimeLeft" style="text-align: right">
	
                                                
                                            
</div>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </div>
                    </div>
                    
                
              <div style="clear: left; height: 10px">
               </div>
        
        
            <div style="clear: left; height: 29px;">
                <div style="float: left">
                    <img id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_ImageSymbol" src="../grafik/SymTumbler.png" border="0" style="height:25px;width:25px;" />
                </div>
                <div style="height: 25px;padding-top: 6px; padding-left: 28px;" >
                    <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_MachineName">TØR</span>    
                </div>
                
            </div>
            
            
                    <div style="border: thin solid #99CCFF; -moz-border-radius: 5px; border-radius: 5px;
                        width: 365px; float: left; margin-right: 2px;margin-top: 5px">
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_divexpand" style="cursor:pointer">
                            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                                <div style="float: left">
                                    <img src="../grafik/gears.png" /></div>
                                <div style="float: left">
                                   <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_MaskGrpTitle">TØR 4 (Ledig)</span>
                                   
                                </div>
                                <div id="imgExpand" style="text-align: right">
                                    <img src="../grafik/opener_opened.png" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_openimg" />
                                </div>
                            </div>
                        </div>
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_status" style="min-height: 100px">
                            <input type="hidden" name="_ctl0:ContentPlaceHolder1:Repeater1:_ctl2:Repeater2:_ctl0:BookedByMe" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_BookedByMe" value="False" />
                            <div style="height: 5px">
                            </div>
                            
                            
                                   <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                    </tr>
                                
                                    <tr style="background-color:#F0F0F0;">
                                        <td>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_Repeater3__ctl1_divMachineStatus" style="float: left">
	
                                                <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_Repeater3__ctl1_LabelStatus">TØR 4 Afsluttedes 17:58</span>    
                                            
</div>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl0_Repeater3__ctl1_divTimeLeft" style="text-align: right">
	
                                                
                                            
</div>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </div>
                    </div>
                    
                
                    <div style="border: thin solid #99CCFF; -moz-border-radius: 5px; border-radius: 5px;
                        width: 365px; float: left; margin-right: 2px;margin-top: 5px">
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_divexpand" style="cursor:pointer">
                            <div style="height: 20px; margin-left: 5px; margin-top: 5px;">
                                <div style="float: left">
                                    <img src="../grafik/gears.png" /></div>
                                <div style="float: left">
                                   <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_MaskGrpTitle">TØR 5 (Ledig)</span>
                                   
                                </div>
                                <div id="imgExpand" style="text-align: right">
                                    <img src="../grafik/opener_opened.png" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_openimg" />
                                </div>
                            </div>
                        </div>
                        <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_status" style="min-height: 100px">
                            <input type="hidden" name="_ctl0:ContentPlaceHolder1:Repeater1:_ctl2:Repeater2:_ctl1:BookedByMe" id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_BookedByMe" value="False" />
                            <div style="height: 5px">
                            </div>
                            
                            
                                   <table style="width: 100%">
                                    <tr>
                                        <td></td>
                                    </tr>
                                
                                    <tr style="background-color:#F0F0F0;">
                                        <td>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_Repeater3__ctl1_divMachineStatus" style="float: left">
	
                                                <span id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_Repeater3__ctl1_LabelStatus">TØR 5 Afsluttedes 17:41</span>    
                                            
</div>
                                            <div id="_ctl0_ContentPlaceHolder1_Repeater1__ctl2_Repeater2__ctl1_Repeater3__ctl1_divTimeLeft" style="text-align: right">
	
                                                
                                            
</div>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </div>
                    </div>
                    
                
              <div style="clear: left; height: 10px">
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
