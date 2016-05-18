<?php
if (isset($_SESSION['login']))
	require('views/commentaires_form_in.phtml');
else
	require('views/commentaires_form.phtml');
?>