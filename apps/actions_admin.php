<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 1)
	require('views/actions_admin.phtml');
?>