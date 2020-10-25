<?php

include 'config.php';
?>

BODY	{
			font-family: <?php echo $font; ?>; 
			color: <?php echo $fontcolor; ?>; 
			font-size: <?php echo $fontsize; ?>; 
			SCROLLBAR-BASE-COLOR: <?php echo $scrollbars; ?>; 
			SCROLLBAR-ARROW-COLOR: <?php echo $scrollarrows; ?>;
			}

TD		{
			font-family: <?php echo $font; ?>; 
			color: <?php echo $fontcolor; ?>; 
			font-size: <?php echo $fontsize; ?>;
			}

A:link	{
			text-decoration: none; 
			color: <?php echo $linkfont; ?>;
			}

A:visited	{
				text-decoration: none; 
				color: <?php echo $vlinkfont; ?>;
				}

A:hover	 {
			  font-style: normal; 
			  color: <?php echo $hlinkfont; ?>; 
			  text-decoration: none;
			  }

.cjfont	{
			font-family: <?php echo $formfont; ?>; 
			color: <?php echo $formfontcolor; ?>; 
			font-size: <?php echo $formfontsize; ?>;			
			}

A:link.cjfont		{
						text-decoration: none; 
						color: <?php echo $formlinkfont; ?>;
						}

A:visited.cjfont	{
						text-decoration: none; 
						color: <?php echo $formvlinkfont; ?>;
						}

A:hover.cjfont	{
						text-decoration: bold;
						color: <?php echo $formhlinkfont; ?>;
						}

.cjmsg  {
			background: <?php echo $formbgcolor; ?>;
			color: <?php echo $formfgcolor; ?>; 
			font-family: <?php echo $formfont?>;
			font-size: <?php echo $formfontsize?>; 
			SCROLLBAR-BASE-COLOR: <?php echo $formscrollbars; ?>;
			SCROLLBAR-ARROW-COLOR: <?php echo $formscrollarrows; ?>;
			}

.xtra {
		background: <?php echo $xtrabgcolor; ?>;
		color: <?php echo $xtrafgcolor; ?>; 
		font-family:<?php echo $font?>;
		font-size:<?php echo $fontsize?>; 
		}
