<?php
/**
 * File river view.
 */

$item = elgg_extract('item', $vars);
if (!$item instanceof ElggRiverItem) {
	return;
}

$twig = super_river_twig();

$object = $item->getObjectEntity();
//dd($object->description);
$vars['message'] = thewire_filter((string) $object->description);
$entity = get_entity($object->guid);
$subject = $item->getSubjectEntity();

$data = [
	'entity' => $entity,
	'username' => $subject->username,
	'site_url' => elgg_get_site_url(),
	'published' => date(("F j, Y"), $entity->time_created),
	'entity_url' => $entity->getURL(),
	'collection_url' => elgg_generate_url('collection:object:thewire:owner', [
		'username' => $subject->name,
	]),
];
//dd($subject);
$subject_link = elgg_view_entity_url($subject, ['class' => 'elgg-river-subject']);

$object_link = elgg_view('output/url', [
	'href' => elgg_generate_url('collection:object:thewire:owner', [
		'username' => $subject->name,
	]),
	'text' => elgg_echo('thewire:wire'),
	'class' => 'elgg-river-object',
	'is_trusted' => true,
]);

$vars['summary'] = elgg_echo('river:object:thewire:create', [$subject_link, $object_link]);

echo $twig->render(
	'river/thewire.html.twig',
	[
		'data' => $data,
		
	]
);
echo elgg_view('river/elements/layout', $vars);
