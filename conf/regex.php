<?php

// some examples. feel free to add, edit, or delete any of the below replacements

$clid = preg_replace('/("|\+)/', '', $clid);
$clid = preg_replace('/(.*)\<([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])\>/', '<a href="tel:$2">$1</a>', $clid);
$clid = preg_replace('/(.*)\<([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])\>/', '<a href="tel:$2">$1</a>', $clid);

$dst = preg_replace('/STARTMEETME/', 'conference', $dst);
$dst = preg_replace('/^s$/', 'IVR', $dst);
$dst = preg_replace('/hang/', 'Hung Up', $dst);
$dst = preg_replace('/(.*)\<([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])\>/', '<a href="tel:$2">$1</a>', $dst);
$dst = preg_replace('/(.*)\<([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])\>/', '<a href="tel:$2">$1</a>', $dst);

foreach ($trunks as $trunk)
{
  $channel = preg_replace("/.*$trunk.*/i", "$trunk", $channel);
}

foreach ($trunks as $trunk)
{
  $lastdata = preg_replace("/.*$trunk.*/i", "$trunk", $lastdata);
}

?>
