<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 0)
	require('views/actions_user.phtml');
?>