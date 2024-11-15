<?php

$item = $vars['item'];
/* @var ElggRiverItem $item */

$menu = elgg_view_menu('river', array(
	'item' => $item,
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));




$file = $item->getObjectEntity();


$type_mapping = [
	'application/excel' => 'excel',
	'application/msword' => 'word',
	'application/ogg' => 'music',
	'application/pdf' => 'pdf',
	'application/powerpoint' => 'ppt',
	'application/vnd.ms-excel' => 'excel',
	'application/vnd.ms-powerpoint' => 'ppt',
	'application/vnd.oasis.opendocument.text' => 'openoffice',
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'word',
	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'excel',
	'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'ppt',
	'application/x-gzip' => 'archive',
	'application/x-rar-compressed' => 'archive',
	'application/x-stuffit' => 'archive',
	'application/zip' => 'archive',
	'text/directory' => 'vcard',
	'text/v-card' => 'vcard',
	'application' => 'application',
	'audio' => 'music',
	'image' => 'image',
	'document' => 'text',
	'video' => 'video',
];

$mime = $file->getMimeType();

$type = 'unknown';
if (!empty($mime)) {
	$type = elgg_extract($mime, $type_mapping, elgg_extract($file->getSimpleType(), $type_mapping, 'unknown'));
}
$data = [
    'title' => $file->title,
    'description' => $file->description,
    'page_url' => $file->getUrl(),
    'url' => $file->getDownloadURL()
];
 
//dd($type);