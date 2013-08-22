<?php
$id = $modx->resource->get('id');
$tplName = $modx->resource->get('template'); //$modx->db->getValue( $modx->db->select( 'templatename', $modx->getFullTableName('site_templates'), 'id='.$modx->documentObject['template'] ));

switch ($tplName) {
  case 1:  // BaseTemplate
    return '';
  case 4: // Category
    return 'category-bg-'. $id;

  case 5: // Content
  case 6: // List
    return 'content-bg';
}