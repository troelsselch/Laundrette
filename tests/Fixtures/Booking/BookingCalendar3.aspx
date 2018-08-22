

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
    
    <link href="../Script/jquery.qtip.min.css" rel="stylesheet" type="text/css" />
    <script src="../Script/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../Script/jquery.qtip.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var btnCheck;
        var btnAll;
        $(document).ready(function () {
            //All active buttons.
            btnAll = $("input[language='javascript'");
            $(btnAll).each(function() {
                $(this).qtip({
                    content: {
                        text: $(this).title
                    }
                });
            });
            //All that are booked.
            btnCheck = $("input[data-bookedby^='key,'");
            $(btnCheck).each(function() {
                $(this).qtip({
                    content: {
                        text: function(event, api) {
                            $.ajax({
                                url: "GetBookedBy.aspx?a=" + api.elements.target.context.id + "&b=" + api.elements.target.data('bookedby')
                            })
                                .then(function(content) {
                                    // Set the tooltip content upon successful retrieval
                                    api.set('content.text', api.elements.target.context.title + content);
                                }, function(xhr, status, error) {
                                    // Upon failure... set the tooltip content to error
                                    api.set('content.text', status + ': ' + error);
                                });

                            return 'Loading...'; // Set some initial text
                        }
                    },
                    position: {
                        viewport: $(window)
                    }
                });
            });
        });
    </script>
</head>
<body>
    <form name="aspnetForm" method="post" action="BookingCalendar.aspx" id="aspnetForm">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE4MTU4ODI1ODMPZBYCZg9kFgICAw9OSBOb3YgMToxNyBBTR4JRm9yZUNvbG9yCQAAAAAeBF8hU0ICBGRkAthxjIq22okf" />

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


<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="B0BF4E" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWQwKf0/H0DALJm/e8BAKA6dy/CgLQ4o2BBQLjr9TEBgKa+MPhDQK2+PfJCwK886fmBwKYhAo6infUCArqIy8sGAp/ylL8A==" />
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
                        <span id="_ctl0_lbTid" class="ELS_S" style="color:#000000;">Lørdag 19 Nov 1:17 AM</span>
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
                        <span id="_ctl0_MessageText"></span>    
                    </div>
                    
                    <input type="hidden" name="_ctl0:MessageType" id="_ctl0_MessageType" value="ERROR" />
                
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
                    <span id="_ctl0_ContentPlaceHolder1_lblCalenderHead">Bestille</span>
                </div>
            </div>
        </div>
        <div id="_ctl0_ContentPlaceHolder1_infostatus">
            
            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                <tr>
                    <td align="left" width="75">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:btCalendarPrevious" value="&lt;&lt;" id="_ctl0_ContentPlaceHolder1_btCalendarPrevious" tabindex="1" class="ELS_M" />
                    </td>
                    <td align="center" width="80%">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarCaption" class="ELS_L" style="color:#0000F0;">Bestil vasketid (Vælg dag og tid)</span>
                    </td>
                    <td align="right" width="10%">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:btCalendarNext" value=">>" id="_ctl0_ContentPlaceHolder1_btCalendarNext" tabindex="2" class="ELS_M" />
                    </td>
                </tr>
            </table>
            
            <table cellspacing="0" cellpadding="0" border="0">
                <tr valign="top">
                    <td width="50" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDatum" class="ELS_S">Dec</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag0" class="ELS_S">Lør<br>30</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag1" class="ELS_S">Søn<br>31</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag2" class="ELS_S">Man<br>1</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag3" class="ELS_S">Tir<br>2</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag4" class="ELS_S">Ons<br>3</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag5" class="ELS_S">Tor<br>4</span>
                    </td>
                    <td align="center" width="85" height="14">
                        <span id="_ctl0_ContentPlaceHolder1_lbCalendarDag6" class="ELS_S">Fre<br>5</span>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="50" style="height: 628px">
                        <table cellspacing="0" cellpadding="0" align="left" border="0">
                            <tr valign="top" height="20">
                                <td class="MINITEXT" style="height: 20px">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime0" class="MINITEXT">07:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime1" class="MINITEXT">08:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime2" class="MINITEXT">09:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime3" class="MINITEXT">10:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime4" class="MINITEXT">11:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime5" class="MINITEXT">12:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime6" class="MINITEXT">13:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime7" class="MINITEXT">14:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime8" class="MINITEXT">15:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime9" class="MINITEXT">16:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime10" class="MINITEXT">17:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime11" class="MINITEXT">18:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime12" class="MINITEXT">19:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime13" class="MINITEXT">20:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime14" class="MINITEXT">21:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime15" class="MINITEXT">22:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime16" class="MINITEXT">23:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime17" class="MINITEXT_gra">00:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime18" class="MINITEXT_gra">01:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime19" class="MINITEXT_gra">02:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime20" class="MINITEXT_gra">03:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime21" class="MINITEXT_gra">04:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime22" class="MINITEXT_gra">05:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime23" class="MINITEXT_gra">06:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime24" class="MINITEXT_gra">07:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime25" class="MINITEXT_gra">08:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime26" class="MINITEXT_gra">09:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime27" class="MINITEXT_gra">10:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime28" class="MINITEXT_gra">11:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime29" class="MINITEXT_gra">12:00 -</span>
                                </td>
                            </tr>
                            <tr valign="top" height="20">
                                <td class="MINITEXT_gra">
                                    <span id="_ctl0_ContentPlaceHolder1_lbTime30" class="MINITEXT_gra">13:00 -</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl0" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,1,1," value="" onclick="javascript:__doPostBack('BookPass0,1,1,','0,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_0,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,2,1," value="" id="_ctl0_ContentPlaceHolder1_0,2,1," disabled="disabled" title="09:00-11:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,3,1," value="" onclick="javascript:__doPostBack('BookPass0,3,1,','0,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_0,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,4,1," value="" id="_ctl0_ContentPlaceHolder1_0,4,1," disabled="disabled" title="13:00-15:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,5,1," value="" id="_ctl0_ContentPlaceHolder1_0,5,1," disabled="disabled" title="15:00-17:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,6,1," value="" onclick="javascript:__doPostBack('BookPass0,6,1,','0,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_0,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:0,7,1," value="" onclick="javascript:__doPostBack('BookPass0,7,1,','0,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_0,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl1" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,1,1," value="" onclick="javascript:__doPostBack('BookPass1,1,1,','1,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_1,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,2,1," value="" onclick="javascript:__doPostBack('BookPass1,2,1,','1,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_1,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,3,1," value="" id="_ctl0_ContentPlaceHolder1_1,3,1," disabled="disabled" title="11:00-13:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,4,1," value="" id="_ctl0_ContentPlaceHolder1_1,4,1," disabled="disabled" title="13:00-15:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,5,1," value="" id="_ctl0_ContentPlaceHolder1_1,5,1," disabled="disabled" title="15:00-17:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,6,1," value="" onclick="javascript:__doPostBack('BookPass1,6,1,','1,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_1,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:1,7,1," value="" onclick="javascript:__doPostBack('BookPass1,7,1,','1,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_1,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl2" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,1,1," value="" onclick="javascript:__doPostBack('BookPass2,1,1,','2,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,2,1," value="" onclick="javascript:__doPostBack('BookPass2,2,1,','2,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,3,1," value="" onclick="javascript:__doPostBack('BookPass2,3,1,','2,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,4,1," value="" onclick="javascript:__doPostBack('BookPass2,4,1,','2,4,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,4,1," title="13:00-15:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,5,1," value="" onclick="javascript:__doPostBack('BookPass2,5,1,','2,5,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,5,1," title="15:00-17:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,6,1," value="" onclick="javascript:__doPostBack('BookPass2,6,1,','2,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:2,7,1," value="" onclick="javascript:__doPostBack('BookPass2,7,1,','2,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_2,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl3" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,1,1," value="" onclick="javascript:__doPostBack('BookPass3,1,1,','3,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,2,1," value="" onclick="javascript:__doPostBack('BookPass3,2,1,','3,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,3,1," value="" onclick="javascript:__doPostBack('BookPass3,3,1,','3,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,4,1," value="" onclick="javascript:__doPostBack('BookPass3,4,1,','3,4,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,4,1," title="13:00-15:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,5,1," value="" onclick="javascript:__doPostBack('BookPass3,5,1,','3,5,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,5,1," title="15:00-17:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,6,1," value="" onclick="javascript:__doPostBack('BookPass3,6,1,','3,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_3,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:3,7,1," value="" id="_ctl0_ContentPlaceHolder1_3,7,1," disabled="disabled" title="19:00-21:00 (Kan ikke bestilles)" style="height: 40px; width: 78px; color: 000000; background-color: #F00000; border: solid 1px #808080;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl4" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,1,1," value="" onclick="javascript:__doPostBack('BookPass4,1,1,','4,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,2,1," value="" onclick="javascript:__doPostBack('BookPass4,2,1,','4,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,3,1," value="" onclick="javascript:__doPostBack('BookPass4,3,1,','4,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,4,1," value="" onclick="javascript:__doPostBack('BookPass4,4,1,','4,4,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,4,1," title="13:00-15:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,5,1," value="" onclick="javascript:__doPostBack('BookPass4,5,1,','4,5,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,5,1," title="15:00-17:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,6,1," value="" onclick="javascript:__doPostBack('BookPass4,6,1,','4,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:4,7,1," value="" onclick="javascript:__doPostBack('BookPass4,7,1,','4,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_4,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl5" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,1,1," value="" onclick="javascript:__doPostBack('BookPass5,1,1,','5,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,2,1," value="" onclick="javascript:__doPostBack('BookPass5,2,1,','5,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,3,1," value="" onclick="javascript:__doPostBack('BookPass5,3,1,','5,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,4,1," value="" onclick="javascript:__doPostBack('BookPass5,4,1,','5,4,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,4,1," title="13:00-15:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,5,1," value="" onclick="javascript:__doPostBack('BookPass5,5,1,','5,5,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,5,1," title="15:00-17:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,6,1," value="" onclick="javascript:__doPostBack('BookPass5,6,1,','5,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:5,7,1," value="" onclick="javascript:__doPostBack('BookPass5,7,1,','5,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_5,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                    <td width="85" style="height: 628px">
                        <input type="submit" name="_ctl0:ContentPlaceHolder1:_ctl6" value="" disabled="disabled" style="height: 10px; width: 80px; color: #000000; background-color: #FFFFFF; border: none;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,1,1," value="" onclick="javascript:__doPostBack('BookPass6,1,1,','6,1,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,1,1," title="07:00-09:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,2,1," value="" onclick="javascript:__doPostBack('BookPass6,2,1,','6,2,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,2,1," title="09:00-11:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,3,1," value="" onclick="javascript:__doPostBack('BookPass6,3,1,','6,3,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,3,1," title="11:00-13:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,4,1," value="" onclick="javascript:__doPostBack('BookPass6,4,1,','6,4,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,4,1," title="13:00-15:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,5,1," value="" onclick="javascript:__doPostBack('BookPass6,5,1,','6,5,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,5,1," title="15:00-17:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,6,1," value="" onclick="javascript:__doPostBack('BookPass6,6,1,','6,6,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,6,1," title="17:00-19:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" /><input type="submit" name="_ctl0:ContentPlaceHolder1:6,7,1," value="" onclick="javascript:__doPostBack('BookPass6,7,1,','6,7,1,');" language="javascript" id="_ctl0_ContentPlaceHolder1_6,7,1," title="19:00-21:00 (Ledigt)" style="height: 40px; width: 78px; color: 000000; background-color: #00A000; border: solid 1px #808080; padding: 0px; margin: 0px;" />
                    </td>
                </tr>
            </table>
            <br />
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
