

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

                <!--

        var newwin = null;



        function doPopup() {

            newwin = window.open('paywin.aspx', '');

            newwin.focus();

            return true;

        }

        //-->

    </script>
</head>
<body>
    <form name="aspnetForm" method="post" action="LoadBalance.aspx" id="aspnetForm">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTEyODYwNDI0Mg9kFgJmD2QWAgIDD2QWGGYPDxYGHgRUZXh0BRZTw7huZGFnIDE" />

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


<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="FCFEFF" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWCgLm/vSvAgLJm/e8BAKA6dy/CgLQ4o2BBQLjr9TEBgKa" />
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
                        <span id="_ctl0_lbTid" class="ELS_S" style="color:#000000;">Søndag 13 Nov 6:07 PM</span>
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

                        <a id="_ctl0_LinkStatus" class="regular" href="javascript:__doPostBack('_ctl0$LinkStatus','')" style="min-width: 75px">
                            <img  src="//grafik/status.png" alt=""/>
                                Status</a>

                        <a id="_ctl0_LinkBalance" class="regular" href="javascript:__doPostBack('_ctl0$LinkBalance','')" style="min-width:75px;border:2px solid #9CF;cursor:default;">
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
                    <img src="../grafik/balance.png" alt="" width="20px" height="20px" /></div>
                <div style="float: left; margin-left: 5px;">
                    <span id="_ctl0_ContentPlaceHolder1_lblBalance">Saldo</span>
                </div>
            </div>
        </div>
        <div style="text-align: center; min-height:247px">

                <div id="_ctl0_ContentPlaceHolder1_pnLoadBalance">

                    <div>
                        <span id="_ctl0_ContentPlaceHolder1_lbCurrentBalance" class="ELS_L" style="color:#000000;">Aktuel saldo: 12.42</span>
                    </div>

                    <br />
                    <br />
                    <span id="_ctl0_ContentPlaceHolder1_lbLastTransactions" class="ELS_M" style="color:#000000;">Seneste transaktioner</span><br>

                            <table border="0" cellspacing="15" style="margin-right: auto;margin-left: auto;text-align: left">
                                <tr>
                                    <td>
                                        <b>
                                            Dato</b>
                                    </td>
                                    <td>
                                        <b>
                                            Tid</b>
                                    </td>
                                    <td>
                                        <b>
                                            Objekt</b>
                                    </td>
                                    <td>
                                        <b>
                                            Beløb</b>
                                    </td>
                                </tr>

                            <tr>
                                <td style="text-align: left">
                                    2016-10-31
                                </td>
                                <td style="text-align: left">
                                    17:40:52
                                </td>
                                <td style="text-align: left">
                                    VASK 1
                                </td>
                                <td style="text-align: right">
                                    10.00
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left">
                                    2016-10-31
                                </td>
                                <td style="text-align: left">
                                    17:40:37
                                </td>
                                <td style="text-align: left">
                                    TØR 5
                                </td>
                                <td style="text-align: right">
                                    40.50
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left">
                                    2016-10-31
                                </td>
                                <td style="text-align: left">
                                    17:37:01
                                </td>
                                <td style="text-align: left">
                                    VASK 2
                                </td>
                                <td style="text-align: right">
                                    10.00
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left">
                                    2016-10-31
                                </td>
                                <td style="text-align: left">
                                    17:36:44
                                </td>
                                <td style="text-align: left">
                                    TØR 4
                                </td>
                                <td style="text-align: right">
                                    22.50
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left">
                                    2016-10-31
                                </td>
                                <td style="text-align: left">
                                    17:35:14
                                </td>
                                <td style="text-align: left">
                                    VASK 3
                                </td>
                                <td style="text-align: right">
                                    10.00
                                </td>
                            </tr>

                            </table>

                    <a id="_ctl0_ContentPlaceHolder1_hlPrevious" disabled="disabled" style="color:Blue;">Foregående</a>
                    <span id="_ctl0_ContentPlaceHolder1_Label2">  </span>
                    <a id="_ctl0_ContentPlaceHolder1_hlNext" disabled="disabled" href="javascript:__doPostBack('_ctl0$ContentPlaceHolder1$hlNext','')" style="color:Blue;">Næste</a>

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
