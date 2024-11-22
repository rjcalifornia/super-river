<?php

$item = $vars['item'];
/* @var ElggRiverItem $item */

$menu = elgg_view_menu('river', array(
	'item' => $item,
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$twig = super_river_twig();


$file = $item->getObjectEntity();
$subject = $item->getSubjectEntity();

$type_mapping = [
	'audio' => 'music',
	'image' => 'image',
	'document' => 'text',
	'video' => 'video',
    'application/pdf' => 'pdf',
];

$mime = $file->getMimeType();

$type = 'unknown';
if (!empty($mime)) {
	$type = elgg_extract($mime, $type_mapping, elgg_extract($file->getSimpleType(), $type_mapping, 'unknown'));
}


switch ($type) {
    case 'image':
        echo elgg_view('super-river/image', [
            'file' => $file,
            'subject' => $subject,
            'twig' => $twig,
        ]);
        break;
    case 'pdf':
        echo 'test';
        break;
    default:
        echo elgg_view('river/elements/layout', $vars);
        break;
}