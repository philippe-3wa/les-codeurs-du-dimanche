<?php
function tri_default($a, $b)
{
	return 0;
}
function tri_create($a, $b)
{
	$dateA = DateTime::createFromFormat('d/m/Y H\hi', $a['create'])->getTimestamp();
	$dateB = DateTime::createFromFormat('d/m/Y H\hi', $b['create'])->getTimestamp();
	return $dateA - $dateB;
}
function tri_priority($a, $b)
{
	return $b['priority'] - $a['priority'];
}
function tri_deadline($a, $b)
{
	$dateA = DateTime::createFromFormat('d/m/Y H\hi', $a['create'])->getTimestamp();
	$dateB = DateTime::createFromFormat('d/m/Y H\hi', $b['create'])->getTimestamp();
	return $dateB - $dateA;
}
function tri_author($a, $b)
{
	return strcasecmp($a['author'], $b['author']);
}
$sort = 'default';
$sort_access = array('default', 'create', 'priority', 'deadline', 'author');
if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_access))
	$sort = $_GET['sort'];
$json = file_get_contents('tasks.json');
$data = json_decode($json, true);
$list = $data['list'];
usort($list, "tri_".$sort);
$count = 0;
$max = sizeof($list);
while ($count < $max)
{
	$task = $list[$count];
	require('views/article.phtml');
	$count++;
}
?>