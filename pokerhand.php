<?php
//The values assigned to $phs variable for each test case 
//-> Just comment out the case for test.

$phs = "D4C4C8D8S4"; // FH (Full House)
/*
$phs = "S8D3HQS3CQ"; // 2P
$phs = "S9D3H9D9C9"; // 4C
$phs = "S4C5H8D4C4"; // 3C
$phs = "S2C5H4D9C2"; // 1P
$phs = "S5H10D10C10S10"; // 1P (with attendance of the number 10)
$phs = "S3H4D6C9D10"; // No Hands Case.
$phs = "S3H4D6C9S10C4"; // Invalid Input (NOT 5 pairs [Suit an Rank])
*/

$phString = str_replace("10", "1", $phs);
$phString = array_map("strrev", str_split($phString, 2));

if (count($phString) == 5) {
	echo "Poker Hand Output: " . showPokerHand($phString);
} else {
	echo "5 pairs including Suit and Rank.";
}

function showPokerHand($phString) {
  $ret = [];
  foreach($phString as $k) {
	  if (strlen($k) == 2) {
      	if (isset($ret[substr($k, 0, 1)])) {
        	$ret[substr($k, 0, 1)]++;   
      	} else {
        	$ret[substr($k, 0, 1)] = 1;
      	}
	  } else {
	  	return "--";
	  }		  
      
}

  $ret_values = array_values($ret);

  switch (count($ret_values)) {
	case 4:
		return "1P";
		break;		
	case 3:
		if (in_array(3, $ret_values)) {
			return "3C";
		} else {
			return "2P";
		}	
		break;
	case 2:
		if (in_array(4, $ret_values)) {
			return "4C";
		} else {
			return "FH";
		}
		break;		
	default:
		return "--";
  }
  
} 
