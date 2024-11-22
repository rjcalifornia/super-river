<?php
$file = $vars['file'];
$subject = $vars['subject'];
$twig = $vars['twig'];
$menu = $vars['menu'];

$data = [
    'entity' => $file, 
    'username' => $subject->name,
    'site_url' => elgg_get_site_url(),
	'user_url' => $subject->getUrl(),
    'entity_url' => $file->getUrl(),
    'published' => date(("F j, Y"), $file->time_created),
    'url' => $file->getDownloadURL(),
    'site_name' => elgg_get_site_entity()->name,
	'icon' =>  elgg_get_simplecache_url('graphics/favicon-16.png'),
    'categories' => $file->tags,
    'menu' => $menu,
];
 
echo $twig->render(
	'river/file/image.html.twig',
	[
		'data' => $data,
		
	]
);