<?php
$category = $scriptProperties['category'];
  $total = 0;
  $filter = array(
    //'Resource.template' => 4,
    'published' => '1'
  );

  if ($category == 'all') {
    $filter["modResource.parent:IN"] = array(7,8,9,12);
  } else {
    $filter["parent"] = $category;
  }
  $query = $modx->newQuery('modResource', $filter);
  $query->select('id');
  $collection = $modx->getCollection('modResource', $query);

  $total = count($collection);
  $offset = ceil($total / 3);

  $ids = array_map(function($value) {
    return $value->toArray()['id'];
  }, $collection);

  $chunks = array_chunk($ids, $offset);

  $result = '<div class="column">';

  foreach ($chunks as $chunk) {
    $result .= $modx->getChunk('Column', array('ids' => implode(', ', $chunk)));
  }

  $result .= '</div>';
  return $result;