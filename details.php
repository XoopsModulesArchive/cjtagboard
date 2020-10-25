<HTML>
<HEAD>
<TITLE>Poster Details</TITLE>
<link rel="stylesheet" href="stylesheet.php" type="text/css">
</HEAD>
<body topmargin="0" leftmargin="0">
<?php
include 'config.php';
$date = $_GET['date'];
$time = $_GET['time'];
$name = $_GET['name'];
$ip = $_GET['ip'];
$agent = $_GET['agent'];

if ('report' == $action) {
    $subject = 'Reported Tag';

    $message = "A visitor has reported a tag posted on the $date at $time\n\n";

    $message .= "The tag was posted by $name with the IP $ip\n\n";

    $message .= "Regards\nCJ Tag Board V3.0";

    $headers = "From: CJ Tag Board V3.0 <$email>\r\nReply-To: $email\r\n";

    $success = mail($email, $subject, $message, $headers);

    if ($success) {
        $report = 'Tag has been reported to the admin';
    } else {
        $report = 'There was an error reporting the tag';
    }
}
?>
  
  <table border="0" cellspacing="0" width="100%" cellpadding="5">
    <tr>
      <td width="100%" colspan="2" bgcolor="<?php echo $bgcolor1; ?>"><font size=2><b><?php echo $name; ?><b></font></td>
    </tr>
    <tr>
      <td width="1%">Date:</td>
      <td width="99%"><?php echo $date; ?></td>
    </tr>
    <tr>
      <td width="1%">Time:</td>
      <td width="99%"><?php echo $time; ?></td>
    </tr>
    <tr>
      <td width="1%">IP:</td>
      <td width="99%"><?php echo $ip; ?></td>
    </tr>
    <tr>
      <td width="1%">Browser:</td>
      <td width="99%"><?php echo $agent; ?></td>
    </tr>
  </table>
  <br>
  <?php
  if (isset($report)) {
      ?>
  <div align="center"><font color=red><?php echo $report; ?></font></div><br>
  <?php
  }
  ?>
  <div align="center"><a href="javascript:self.close()">Close Window</a> | <A HREF="?action=report&name=<?php echo $name; ?>&ip=<?php echo $ip; ?>&date=<?php echo $date; ?>&time=<?php echo $time; ?>&agent=<?php echo $agent; ?>">Report to Admin</A></div>
