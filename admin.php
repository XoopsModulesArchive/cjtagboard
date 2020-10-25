<?php

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('Location: admin_index.php');

    exit;
}
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include 'config.php';

    if ('edit' == $_GET['action']) {
        printheader();

        editTag($_GET['tagid']);

        viewTags();
    } else {
        if ('delete' == $_GET['action']) {
            printheader();

            deleteTag($_GET['tagid']);

            viewTags();
        } else {
            if ('ipban' == $_GET['action']) {
                showBanned();
            } else {
                if ('logout' == $_GET['action']) {
                    logout();
                } else {
                    if ('about' == $_GET['action']) {
                        about();
                    } else {
                        if ('support' == $_GET['action']) {
                            print '<font size=3><b>CJ Tag Board V3.0 Support</b></font><p>';

                            print 'For support on the CJ Tag Board V3.0 go to the CJ Website Design forums by clicking the link below:<br><br><A HREF="http://www.cj-design.com/forum">CJ Website Design Forums</A>';
                        } else {
                            printheader();

                            viewTags();
                        }
                    }
                }
            }
        }
    }
}

function printheader()
{
    print '<font size=3><b>CJ Tag Board V3.0 Adminstration</b></font><p>';
}

function editTag($tag)
{
    global $datfileall, $datfile, $administer_amount, $NUM_COMMENTS;

    if ('submit' == $_POST['submit']) {
        $tagid = $_POST['tagid'];

        $newtag = $_POST['cjmsg'];

        $newtag = str_replace('&lt;', '<', $newtag);

        $newtag = str_replace('&gt;', '>', $newtag);

        $newtag = stripslashes($newtag);

        $newtag = smileyfiyer($newtag);

        $newtag = ubbCode($newtag);

        if ($tagid < $NUM_COMMENTS) {
            $fp2 = @fopen($datfile, 'rb');

            if ($fp2) {
                $array2 = explode("\n", fread($fp2, filesize($datfile)));

                fclose($fp2);

                $delete = array_pop($array2);

                $new = replacer($array2[$tagid], $newtag);

                $array2[$tagid] = $new; // inserting new

                $fpwrite2 = fopen($datfile, 'wb');

                for ($a = 0, $aMax = count($array2); $a < $aMax; $a++) {
                    fwrite($fpwrite2, $array2[$a] . "\n");
                }

                fclose($fpwrite2);

                print "<li>Tag Successfully Edited in \"$datfile\"";
            } else {
                print "<li>$datfile Does not exist, please check the location of {$datfile}!";

                print "<li>Tag Unsuccessfully Edited in \"$datfile\"";
            }
        }

        $fp = @fopen($datfileall, 'rb');

        if ($fp) {
            $array = explode("\n", fread($fp, filesize($datfileall)), $administer_amount + 1);

            $delete = array_pop($array);

            $new = replacer($array[$tagid], $newtag);

            $array[$tagid] = $new; // inserting new

            $fpwrite = fopen($datfileall, 'wb');

            for ($b = 0, $bMax = count($array); $b < $bMax; $b++) {
                fwrite($fpwrite, $array[$b] . "\n");
            }

            fclose($fpwrite);

            print "<li>Tag Successfully Edited in \"$datfileall\"<p>";
        } else {
            print "<li>$datfileall Does not exist, please check the location of {$datfileall}!";

            print "<li>Tag Unsuccessfully Edited in \"$datfileall\"<p>";
        }
    } else {
        $fp = @fopen($datfileall, 'rb');

        if ($fp) {
            $array = explode("\n", fread($fp, filesize($datfileall)), $administer_amount + 1);

            fclose($fp);

            $delete = array_pop($array);

            $show = remover($array[$tag], '<!--@-->', '<!--#-->');

            $show = desmileyfier($show);

            print '<font size=2><b>Edit Tag</b></font>';

            print "<form method=post action=$PHP_SELF?action=edit name=\"tagboard\">";

            print '<input type=hidden name=submit value=submit>';

            print "<input type=hidden name=tagid value=$tag>";

            print "<textarea name=cjmsg cols=\"45\" rows=\"8\">$show</textarea><br><br>";

            print "<input type=\"submit\" value=\"Save Changes\">&nbsp;<input type=\"reset\" value=\"Reset\">&nbsp;<input type=\"button\" class=\"xtra\" value=\"Insert Code\" OnClick=\"popXtras('insert.php')\">";

            print '</form>';

            print '<p>';
        } else {
            print "<b>$datfileall Does not exist, please check the location of {$datfileall}!";
        }
    }
}

function deleteTag($tag)
{
    global $datfileall, $datfile, $administer_amount, $NUM_COMMENTS;

    $tagid = $_GET['tagid'];

    if ($tagid < $NUM_COMMENTS) {
        $fp2 = @fopen($datfile, 'rb');

        if ($fp2) {
            $array2 = explode("\n", fread($fp2, filesize($datfile)));

            fclose($fp2);

            $delete = array_pop($array2);

            unset($array2[$tagid]); // delete it!

            $newarray2 = array_values($array2);

            $fpwrite2 = fopen($datfile, 'wb');

            for ($a = 0, $aMax = count($newarray2); $a < $aMax; $a++) {
                fwrite($fpwrite2, $newarray2[$a] . "\n");
            }

            fclose($fpwrite2);

            print "<li>Tag Successfully Deleted in \"$datfile\"";
        } else {
            print "<li>$datfile Does not exist, please check the location of {$datfile}!";

            print "<li>Tag Unsuccessfully Deleted in \"$datfile\"";
        }
    }

    $fp = @fopen($datfileall, 'rb');

    if ($fp) {
        $array = explode("\n", fread($fp, filesize($datfileall)), $administer_amount + 1);

        $delete = array_pop($array);

        unset($array[$tagid]); // delete it!

        $newarray = array_values($array);

        $fpwrite = fopen($datfileall, 'wb');

        for ($b = 0, $bMax = count($newarray); $b < $bMax; $b++) {
            fwrite($fpwrite, $newarray[$b] . "\n");
        }

        fclose($fpwrite);

        print "<li>Tag Successfully Deleted in \"$datfileall\"<p>";

        require 'tagcount.txt';

        $countfilename = 'tagcount.txt';

        $increment = $tagcount - 1;

        $incrementoutput = '<? $' . 'tagcount = ' . $increment . '; ?>';

        $countwrite = fopen($countfilename, 'wb');

        fwrite($countwrite, $incrementoutput);

        fclose($countwrite);
    } else {
        print "<li>$datfileall Does not exist, please check the location of {$datfileall}!";

        print "<li>Tag Unsuccessfully Deleted in \"$datfileall\"<p>";
    }
}

function viewTags()
{
    global $datfileall, $administer_amount;

    $bgcolor1 = '#F1F1F1';

    $bgcolor2 = '#FFFFFF';

    $fp = @fopen($datfileall, 'rb');

    if ($fp) {
        $array = explode("\n", fread($fp, filesize($datfileall)), $administer_amount + 1);
    } else {
        print "<b>$datfileall Does not exist, please check the location of {$datfileall}!";
    }

    $delete = array_pop($array);

    print '<table border="0" cellpadding="5" cellspacing="0" width="550" style="border: 1 solid #000000">';

    $bgcolor = true;

    for ($i = 0, $iMax = count($array); $i <= $iMax; $i++) {
        $atag = $array[$i];

        if (mb_strlen($atag) > 1) {
            print "\n<tr>\n";

            if ($bgcolor) {
                if (mb_strlen($atag) > 300) {
                    $atag = wordwrap($atag, 55, "\n", 1);
                }

                print "<td width=\"98%\" bgcolor=\"$bgcolor1\">$atag</td>\n";

                print "<td width=\"1%\" bgcolor=\"$bgcolor1\">\n<input type=\"button\" value=\"Edit\" onclick=\"LoadEdit('$PHP_SELF?action=edit&tagid=$i')\">\n</td>";

                print "<td width=\"1%\" bgcolor=\"$bgcolor1\">\n<input type=\"button\" value=\"Delete\" onclick=\"ConfirmDelete('$PHP_SELF?action=delete&tagid=$i')\">\n</td>\n";

                $bgcolor = false;
            } else {
                if (mb_strlen($atag) > 300) {
                    $atag = wordwrap($atag, 55, "\n", 1);
                }

                print "<td width=\"98%\" bgcolor=\"$bgcolor2\">$atag</td>\n";

                print "<td width=\"1%\" bgcolor=\"$bgcolor2\">\n<input type=\"button\" value=\"Edit\" onclick=\"LoadEdit('$PHP_SELF?action=edit&tagid=$i')\">\n</td>";

                print "<td width=\"1%\" bgcolor=\"$bgcolor2\">\n<input type=\"button\" value=\"Delete\" onclick=\"ConfirmDelete('$PHP_SELF?action=delete&tagid=$i')\">\n</td>";

                $bgcolor = true;
            }

            print "</tr>\n";
        }
    }

    print '</table>';
} // end function

function remover($string, $sep1, $sep2)
{
    $string = mb_substr($string, 0, mb_strpos($string, $sep2));		// gives start to <!--#-->
       $string = mb_substr(mb_strstr($string, $sep1), 0);					// gives <!--@--> to <!--#-->
       $string = str_replace($sep1, '', $string);					// deletes <!--@-->
       return $string;
}
function replacer($oldtag, $newtag)
{
    $firstpart = mb_substr($oldtag, 0, mb_strpos($oldtag, '<!--@-->'));

    $secondpart = mb_substr($oldtag, mb_strpos($oldtag, '<!--#-->'), mb_strlen($oldtag));

    $new = $firstpart . '<!--@-->' . $newtag . $secondpart;

    return $new;
}
function desmileyfier($cjmsg)
{
    $cjmsg = str_replace('<img src="e/grin.gif">', ':D ', $cjmsg);

    $cjmsg = str_replace('<img src="e/smile.gif">', ':) ', $cjmsg);

    $cjmsg = str_replace('<img src="e/lol.gif">', ':lol ', $cjmsg);

    $cjmsg = str_replace('<img src="e/razz.gif">', ':p ', $cjmsg);

    $cjmsg = str_replace('<img src="e/evil.gif">', ':evil ', $cjmsg);

    $cjmsg = str_replace('<img src="e/sad.gif">', ':( ', $cjmsg);

    $cjmsg = str_replace('<img src="e/shocked.gif">', ':| ', $cjmsg);

    $cjmsg = str_replace('<img src="e/wink.gif">', ';) ', $cjmsg);

    $cjmsg = str_replace('<img src="e/mad.gif">', ':x ', $cjmsg);

    $cjmsg = str_replace('<img src="e/cry.gif">', ':cry ', $cjmsg);

    $cjmsg = str_replace('<img src="e/rolleyes.gif">', ':blink ', $cjmsg);

    $cjmsg = str_replace('<img src="e/suprised.gif">', ':o ', $cjmsg);

    $cjmsg = str_replace('<img src="e/question.gif">', ':? ', $cjmsg);

    $cjmsg = str_replace('<img src="e/confused.gif">', ':s ', $cjmsg);

    $cjmsg = str_replace('<img src="e/cool.gif">', 'B) ', $cjmsg);

    $cjmsg = str_replace('<img src="e/redface.gif">', ':red ', $cjmsg);

    return $cjmsg;
}
function ubbCode($text)
{
    // Array of tags with opening and closing

    $tagArray['b'] = ['open' => '<b>', 'close' => '</b>'];

    $tagArray['i'] = ['open' => '<i>', 'close' => '</i>'];

    $tagArray['u'] = ['open' => '<u>', 'close' => '</u>'];

    $tagArray['url'] = ['open' => '<a target="_blank" href="', 'close' => '">\\1</a>'];

    $tagArray['email'] = ['open' => '<a href="mailto:', 'close' => '">\\1</a>'];

    $tagArray['url=(.*)'] = ['open' => '<a target="_blank" href="', 'close' => '">\\2</a>'];

    $tagArray['email=(.*)'] = ['open' => '<a href="mailto:', 'close' => '">\\2</a>'];

    $tagArray['color=(.*)'] = ['open' => '<font color="', 'close' => '">\\2</font>'];

    foreach ($tagArray as $tagName => $replace) {
        $tagEnd = preg_replace('/\W/Ui', '', $tagName);

        $text = preg_replace("|\[$tagName\](.*)\[/$tagEnd\]|Ui", "$replace[open]\\1$replace[close]", $text);
    }

    return $text;
}
function smileyfiyer($cjmsg)
{
    $cjmsg = str_replace(':D', '<img src="e/grin.gif">', $cjmsg);

    $cjmsg = str_replace(':)', '<img src="e/smile.gif">', $cjmsg);

    $cjmsg = str_replace(':lol', '<img src="e/lol.gif">', $cjmsg);

    $cjmsg = str_replace(':p', '<img src="e/razz.gif">', $cjmsg);

    $cjmsg = str_replace(':evil', '<img src="e/evil.gif">', $cjmsg);

    $cjmsg = str_replace(':(', '<img src="e/sad.gif">', $cjmsg);

    $cjmsg = str_replace(':|', '<img src="e/shocked.gif">', $cjmsg);

    $cjmsg = str_replace(';)', '<img src="e/wink.gif">', $cjmsg);

    $cjmsg = str_replace(':x', '<img src="e/mad.gif">', $cjmsg);

    $cjmsg = str_replace(':cry', '<img src="e/cry.gif">', $cjmsg);

    $cjmsg = str_replace(':blink', '<img src="e/rolleyes.gif">', $cjmsg);

    $cjmsg = str_replace(':o', '<img src="e/suprised.gif">', $cjmsg);

    $cjmsg = str_replace(':?', '<img src="e/question.gif">', $cjmsg);

    $cjmsg = str_replace(':s', '<img src="e/confused.gif">', $cjmsg);

    $cjmsg = str_replace('B)', '<img src="e/cool.gif">', $cjmsg);

    $cjmsg = str_replace(':red', '<img src="e/redface.gif">', $cjmsg);

    return $cjmsg;
}
function showBanned()
{
    print '<font size="3"><b>IP Banning</b></font><p>';

    global $ipbanfile;

    if ('submit' == $_POST['submit']) {
        $ban = $_POST['banned'];

        if (is_writable($ipbanfile)) {
            $fp = @fopen($ipbanfile, 'wb');

            if ($fp) {
                fwrite($fp, $ban);

                print "<li>Successfully Updated \"$ipbanfile\"<p>";
            } else {
                print "<li>$ipbanfile Does not exist, please check the location of {$ipbanfile}!<p>";
            }
        } else {
            print "<li>$ipbanfile Does not appear to be writable, make sure it is CHMOD to 777<p>";
        }

        fclose($fp);
    } ?>
<font size="2">Banned IP's (one per line)</font>
<form action="<?php echo $PHP_SELF; ?>?action=ipban" method="post">
<input type=hidden name=submit value=submit>
<textarea cols="20" rows="20" name="banned">
<?php include $ipbanfile; ?>
</textarea><br>
<input type="submit" value="Save Changes">
</form>
<?php
}
function logout()
{
    session_destroy(); ?>
			   <font size="3"><b>Logged out successfully</b></font>
				<br>
				<br>
				<li><A HREF="admin_index.php">Log In</A>
				<li><a href="javascript:self.close()">Close Window</a>   
<?php
}
function about()
{
    ?>

			   <font size="3"><b>About CJ Tag Board V3.0</b></font>
				<br>
				<br>
				The CJ Tag Board V3.0 was created by CJ Website Design.  The script is released under the GPL License.<br>
				The author of the script is <A HREF="mailto:webmaster@cj-design.com">James Crooke</A><br><br>
				Support CJ Website Design by visiting <A HREF="http://www.cj-design.com/?id=donate">this link</A>.<br><br>
				<b>Enjoy the CJ Tag Board V3.0!</b>
   
<?php
}
?>
