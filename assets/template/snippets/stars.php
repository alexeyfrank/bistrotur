<?php
$count = $scriptProperties['count'];

  $res = '';
  for ($i = 1; $i <= 5; $i++) {
    if ($i <= $count) {
      $res .= '<span class="star orange">';
    } else {
      $res .= '<span class="star">';
    }
    $res .= '</span>';
  }

  return $res;