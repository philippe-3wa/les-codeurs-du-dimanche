<?php
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'editer')
{
	$ligne = intval($_GET['id']);
	$json = file_get_contents('tasks.json');
	$data = json_decode($json, true);
	$list = $data['list'];
	$count = 0;
	$max = sizeof($list);
	$task = null;
	while ($count < $max && $task == null)
	{
		if ($list[$count]['id'] == $ligne)
			$task = $list[$count];
		$count++;
	}
	if ($task != null)
	{
		$task['deadline'] = date('Y\-m\-d\TH\:i', DateTime::createFromFormat('d/m/Y H\hi', $task['deadline'])->getTimestamp());
		require('views/edittask.phtml');
	}
	else
		$error = 'Tache inexistante';
}
else
	require('views/admin.phtml');
?>