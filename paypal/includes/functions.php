<?php
// Function to convert NTP string to an array
function NVPToArray($NVPString) {
  $proArray = array();
  while (strlen($NVPString)) {
    // name
    $keypos = strpos($NVPString, '=');
    $keyval = substr($NVPString, 0, $keypos);
    // value
    $valuepos = strpos($NVPString, '&') ? strpos($NVPString, '&') : strlen($NVPString);
    $valval = substr($NVPString, $keypos + 1, $valuepos - $keypos - 1);
    // decoding the respose
    $proArray[$keyval] = urldecode($valval);
    $NVPString = substr($NVPString, $valuepos + 1, strlen($NVPString));
  }
  return $proArray;
}

function timeInXMonths($monthToAdd) {
  #http://stackoverflow.com/questions/10724305/how-to-add-1-month-on-a-date-without-skipping-i-e-february
  $date = gmdate('Y-m-d H:i:s', time());
  $d1 = DateTime::createFromFormat('Y-m-d H:i:s', $date);
  $year = $d1->format('Y');
  $month = $d1->format('n');
  $day = $d1->format('d');
  $year += floor($monthToAdd/12);
  $monthToAdd = $monthToAdd%12;
  $month += $monthToAdd;
  if($month > 12) {
    $year ++;
    $month = $month % 12;
    if($month === 0)
    $month = 12;
  }
  if(!checkdate($month, $day, $year)) {
    $d2 = DateTime::createFromFormat('Y-n-j', $year.'-'.$month.'-1');
    $d2->modify('last day of');
  }else {
    $d2 = DateTime::createFromFormat('Y-n-d', $year.'-'.$month.'-'.$day);
  }
  $d2->setTime($d1->format('H'), $d1->format('i'), $d1->format('s'));
  $final= $d2->format('Y-m-d\TH:i:s\Z');
  return $final;
}
