<?php

$item = $vars['item'];
/* @var ElggRiverItem $item */



$twig = super_river_twig();


$file = $item->getObjectEntity();
$subject = $item->getSubjectEntity();

$menu = elgg_view_menu('social', [
    'entity' => $file,
    'item' => $item,
    'class' => 'elgg-menu-hz',
]);

$menu .= elgg_view_menu('river', array(
	'item' => $item,
	'sort_by' => 'priority',
	'class' => ' ml-2',
    'prepare_dropdown' => true,
));




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
            'menu' => $menu,
        ]);
        break;
    case 'pdf':
        echo elgg_view('super-river/pdf', [
            'file' => $file,
            'subject' => $subject,
            'twig' => $twig,
            'menu' => $menu,
        ]);
        break;
    default:
        echo elgg_view('river/elements/layout', $vars);
        break;
}