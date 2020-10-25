<?php

function tagboard()
{
    session_start();

    $block['content'] = "<div style='text-align: center;'>
<center><IFRAME SRC='" . XOOPS_URL . "/modules/cjtagboard/index.php' width='100%' height='430' SCROLLING='auto' FRAMEBORDER='0'></IFRAME></center>

</div>
";

    return $block;
}


