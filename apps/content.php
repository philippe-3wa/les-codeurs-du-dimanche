<?php
if (!empty($error)) 
    require('apps/error.php');

if (!empty($message)) 
    require('apps/message.php');

require('views/content.phtml');
?>