<?php

$user = 'admin';				// your username for control panel (be original!)
$pass = 'password';			// your password for control panel

$display = 'display.php';	// the display file
$datfile = 'tag.txt';				// the data file
$datfileall = 'alltag.txt';		// where all tags are saved file
$ipbanfile = 'ipban.php';		// where the banned IPs are kept
$floodfile = 'flood.php';		// where flood protection is monitored
$flood_time = 15;				// the amount of seconds between posts

$view = 'desc';					// method of viewing the tags, desc = newest at the top, asc = newest at the bottom
$MAX_LENGTH = 200;			// the maximum length of posts (you will also need to change this in htmlcode.dat)
$NUM_COMMENTS = 25;  	// how many comments will be displayed on your tag board
$print_how_many = 1;  		// set to "1" displays number of tags on the tag board, "0" turns feature off
$stats = 1;							// set to "1" displays stats when hover over square image ("ip.gif")
$meta_refresh = 1;			// set to "1" tells the tag board to refresh, "0" turns feature off
$meta_refresh_rate = 120;	// if you want to refresh the tag board, enter the time in seconds to wait per refresh
$smilies = 1;						// set to "1" to allow smilies, "0" for no smilies : (
$printall = 1;						// set to "1" to save all tags and to show link to them, "0" to not bother
$tag_spacing = 2;				// distance in pixels between tags (cellpadding = ?)

$administer_amount = 200;  // this is also the amount of "all tags" to keep, keep this below 500 to avoid file corruption

// I suggest you put no for the next variable if you get alot of visitors!

$send_notify = 'no';			// send notification to you when a tag is made, put "yes" if you want email to be sent every tag

$yourname = 'Your Name';				// required if you put yes above
$email = 'yourname@email.com';		// required for notification AND post reporting
$yourwebsite = 'CJ Website Design';   // required for notification

// Edit the stylesheet here!

// Tag Board "Display Post" Colours --------------------------------------------------------------------------------//

$font = 'verdana';						// eg.  verdana, arial, tahoma
$fontcolor = '#000000';				// general font hex colour value
$fontsize = '8pt';							// enter size in 'pt' i.e: 10pt
$linkfont = '#666666';					// link font colour hex value
$vlinkfont = '#666666';				// visited link font colour hex value
$hlinkfont = '#000000';				// hover over link font colour hex value
$scrollbars = '#C5C5C5';				// scrollbar colours
$scrollarrows = '#FFFFFF';			// scrollbar arrow colours
$bgcolor1 = '#F1F1F1';				// alternate background colour 1
$bgcolor2 = '#FFFFFF';				// alternate background colour 1 (best kept #FFFFFF)

// Tag Board "Form" Colours -----------------------------------------------------------------------------------------//

$formfont = 'verdana';				// eg.  verdana, arial, tahoma
$formfontcolor = '#000000';			// general font hex colour value
$formfontsize = '8pt';				// enter size in 'pt' i.e: 10pt
$formlinkfont = '#000000';			// link font colour hex value
$formvlinkfont = '#000000';			// visited link font colour hex value
$formhlinkfont = '#FF0000';			// hover over link font colour hex value
$formbgcolor = '#F1F1F1';			// form background colour
$formfgcolor = '#000000';			// form font colour
$formscrollbars = '#C5C5C5';		// textarea scrollbar colour
$formscrollarrows = '#FFFFFF';		// textarea scrollbar arrow colour

// "Xtra" Button Colours ----------------------------------------------------------------------------------------------//

$xtrabgcolor = '#FFFFFF';			// colour of the xtra buttons background
$xtrafgcolor = '#000000';			// text colour of the xtra button

// Bad Word Filter - Add as many as you like!

$badword_array['fuck'] = 'f**k';
$badword_array['bitch'] = 'female dog';
$badword_array['shit'] = 'crap';
$badword_array['nigger'] = 'black man';
$badword_array['nigga'] = 'black man';
$badword_array['slut'] = 'sl*t';
$badword_array['whore'] = 'w**re';
$badword_array['cock'] = 'c**k';
$badword_array['pussy'] = 'p***y';
