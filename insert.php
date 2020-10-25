
<HTML>
<HEAD>
<TITLE>Insert Smilies/UBB Code</TITLE>
<link rel="stylesheet" href="stylesheet.php" type="text/css">
<script language="javascript" type="text/javascript">
<!--
function insertcode(code) {
	code = ' ' + code + ' ';
	opener.document.forms['tagboard'].cjmsg.value  += code;
	if(document.my.ifClose.checked === true){
		opener.document.forms['tagboard'].cjmsg.focus();
        window.close();
     }
}
function insertsmilie(smilie) {
	smilie = ' ' + smilie + ' ';
	opener.document.forms['tagboard'].cjmsg.value  += smilie;
	if(document.my.ifClose.checked === true){
		opener.document.forms['tagboard'].cjmsg.focus();
        window.close();
     }
}
//-->
</script>

</HEAD>

<?php
include 'config.php';
?>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="50%" valign="top">
          <table border="0" cellpadding="5" cellspacing="0" width="100%">
            <tr>
              <td width="100%" bgcolor="<?php echo $bgcolor1; ?>"><b>Text Effects</b></td>
            </tr>
            <tr>
              <td width="100%">
              <a href="javascript:insertcode('[b]'+ prompt('Enter Text you want to be Bold', '') +'[/b]')">Bold Text</a><br>
    			<a href="javascript:insertcode('[i]'+ prompt('Enter Text you want to be Italic', '') +'[/i]')">Italic Text</a><br>
    			<a href="javascript:insertcode('[u]'+ prompt('Enter Text you want to be Underlined', '') +'[/u]')">Underlined Text</a><br>
			   <a href="javascript:insertcode('[color=' + prompt('Enter colour of the text','') + ']' + prompt('Enter the text to be in this colour','') + '[/color]')">Coloured Text</a></td>
            	</tr>
            <tr>
              <td width="100%" bgcolor="<?php echo $bgcolor1; ?>"><b>Creating Links</b></td>
            </tr>
            <tr>
              <td width="100%">
               <a href="javascript:insertcode('[url=' + prompt('Enter the complete URL of the webpage', 'http://') + ']' + prompt('Enter the title of the webpage', '') + '[/url]' )">Insert URL</a><br>
				 <a href="javascript:insertcode('[email=' + prompt('Enter your email address', 'yourname@email.com') + ']' + prompt('Enter the link text', '') + '[/email]' )">Insert Email</a>
    			<br>
    			<form name=my>
                    <div align="center">
                      <center>
                      <table border="0" cellspacing="0" width="100%">
                        <tr>
                          <td width="1%">
					<input type=checkbox checked name=ifClose>
                          </td>
                          <td width="99%">
				    <font size="1">Close Window<br>
                    After Insert</font>
                          </td>
                        </tr>
                        <tr>
                          <td width="1%" valign="top">
						  <br>
                    <font size="1"><b>Tip:</b></font>
                          </td>
                          <td width="99%">
						  <br>
                    <font size="1">&nbsp;Hit ENTER to Tag!</font>
                          </td>
                        </tr>
                      </table>
                      </center>
                    </div>
                    &nbsp;
				</form>
        		</td>
            </tr>
          </table>
      </td>
      <td width="50%" valign="top">
          <table border="0" cellpadding="5" cellspacing="0" width="100%">
            <tr>
              <td width="100%" bgcolor="<?php echo $bgcolor1; ?>"><b>Smilies</b></td>
            </tr>
            <tr>
              <td width="100%">
 
 <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="1%"><A HREF="javascript:insertcode(':D')"><img border="0" src="e/grin.gif"></A></td>
    <td width="99%"><A HREF="javascript:insertcode(':D')"><b>:D</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':evil')"><img border="0" src="e/evil.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':evil')"><b>:evil</b></a></td>
   </tr> 
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':)')"><img border="0" src="e/smile.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':)')"><b>:)</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':|')"><img border="0" src="e/shocked.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':|')"><b>:|</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':(')"><img border="0" src="e/sad.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':(')"><b>:(</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':cry')"><img border="0" src="e/cry.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':cry')"><b>:cry</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':o')"><img border="0" src="e/suprised.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':o')"><b>:o</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode('B)')"><img border="0" src="e/cool.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode('B)')"><b>B)</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':red')"><img border="0" src="e/redface.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':red')"><b>:red</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':s')"><img border="0" src="e/confused.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':s')"><b>:s</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':p')"><img border="0" src="e/razz.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':p')"><b>:p</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(';)')"><img border="0" src="e/wink.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(';)')"><b>;)</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':x')"><img border="0" src="e/mad.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':x')"><b>:x</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':blink')"><img border="0" src="e/rolleyes.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':blink')"><b>:blink</b></a></td>
  </tr>
  <tr> 
    <td width="1%"><A HREF="javascript:insertcode(':lol')"><img border="0" src="e/lol.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':lol')"><b>:lol</b></a></td>
    <td width="1%"><A HREF="javascript:insertcode(':?')"><img border="0" src="e/question.gif"></a></td>
    <td width="99%"><A HREF="javascript:insertcode(':?')"><b>:?</b></a></td>
  </tr>
</table>
<div align="right"><br><br><font size="1">Click to Add</font></div>
              </td>
            </tr>
          </table>
      </td>
    </tr>
  </table>
	
