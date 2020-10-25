<?php

require dirname(__DIR__, 2) . '/mainfile.php';
require XOOPS_ROOT_PATH . '/header.php';
session_start();
header('Cache-control: private'); // IE 6 Fix.
include 'config.php';
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<title>CJ Tag Board V3.0 Admin</title>
<link rel="stylesheet" href="admin_stylesheet.php" type="text/css">
<script language = "JavaScript">
<!-- Begin
function popUp(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=no,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=150,left = 262,top = 184');");
}
function popXtras(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=no,location=0,statusbar=0,menubar=0,resizable=0,width=300,height=250,left = 262,top = 184');");
}
function ConfirmDelete(url)
{
if (confirm("Are you sure you want to delete this tag?"))
	location.href=url;
}
function LoadEdit(url)
{
	location.href=url;	
}
// End -->
</script>
</head>
<body>
  <table border="0" cellpadding="5" cellspacing="0" width="100%">
    <tr>
      <td>
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td width="100%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="100%">
		  				<img border="0" src="topleft.jpg" width="120" height="70"></td>
                  </tr>
                  <tr>
                    <td width="100%"><img border="0" src="top.jpg" width="700" height="23"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="100%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="1%" bgcolor="#F1F1F1" valign="top" style="border-left: 1 solid #C5C5C5; border-right: 1 solid #C5C5C5">
                      <table border="0" cellpadding="5" cellspacing="0" width="120">
                        <tr>
                          <td>
						  	<?php
                            if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
                                print 'You must be logged in to view the Admin Control Panel';
                            } else {
                                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                                    ?>
						  <b>Operations</b><br>
                  &nbsp; <A class="menu" HREF="?action=view">Administer Tags</A><br>
				  &nbsp; <A class="menu" HREF="?action=ipban">IP Banning</A><br>
				  &nbsp; <A class="menu" HREF="?action=support">Support</A><br>
				  &nbsp; <A class="menu" HREF="?action=about">About</A><br>
                  &nbsp; <font color=red><A class="menu" HREF="?action=logout">Logout</A></font>
				  		  <?php
                                }
                            }
                            ?>
						</td>
                        </tr>
                      </table>
                    </td>
                    <td width="99%" valign="top">
                      <table border="0" cellpadding="5" cellspacing="0" width="100%">
                        <tr>
                          <td width="100%">
						  	<?php
                            if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
                                include 'login.php';
                            } else {
                                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                                    include 'admin.php';
                                }
                            }
                            ?>						  
						  </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="100%"><img border="0" src="bottom.jpg" width="700" height="23"></td>
            </tr>
          </table>
      </td>
    </tr>
  </table>
</body>
</html>
<?php
/*
print "Testing Security:<br>";
print '<pre>';
print_r($GLOBALS);
PRINT '</pre>';
*/
require XOOPS_ROOT_PATH . '/footer.php';
?>
