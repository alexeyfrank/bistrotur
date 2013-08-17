<?php
$category = $scriptProperties['category'];
  $total = 0;
  $filter = array(
    //'modResource.template' => 4,
    'published' => '1'
  );

  $parent = null;

  if ($category == 'all') {
    $parent = array(7, 8, 9, 12);
  } else {
    $parent = array($category);
  }

  $filter["modResource.parent:IN"] = $parent;
  $query = $modx->newQuery('modResource', $filter);
  $query->select('id');
  $collection = $modx->getCollection('modResource', $query);

  $total = count($collection);
  $offset = ceil($total / 3);

  $ids = array_map(function($value) {
    $arr = $value->toArray();
    return $arr['id'];
  }, $collection);

  $chunks = array_chunk($ids, $offset);

  $result = '';

  foreach ($chunks as $chunk) {
    $result .= '<div class="column">';
    $result .= $modx->runSnippet('getResources', array(
      'published' => '1',
      //'parents' => implode(',', $parent),
      'resources' => implode(',', $chunk),
      'includeTVs' => '1',
      'tpl' => 'Tour'
    ));
    $result .= '</div>';
  }

  return $result;