<?php
	$q=$_GET["q"];
	$r=$_GET["r"];
//	echo "$r";
	//$mysql_host = "mysql15.000webhost.com";
	//$mysql_database = "a4418029_words";
	//$mysql_user = "a4418029_dbuser";
	//$mysql_password = "Balt4zar";
	
	$con = mysql_connect('mysql15.000webhost.com', 'a4418029_dbuser', 'Balt4zar');
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("a4418029_words", $con);
	mysql_query("SET names 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION='utf8_unicode_ci'");
 
	$str = str_replace("Č", "C", $q);
	$str = str_replace("Ć", "C", $str);
	$str = str_replace("Š", "S", $str);
	$str = str_replace("Ž", "Z", $str);
	$str = str_replace("Đ", "D", $str);
	$str = str_replace("ć", "c", $str);
	$str = str_replace("č", "c", $str);
	$str = str_replace("š", "s", $str);
	$str = str_replace("ž", "z", $str);
	$str = str_replace("đ", "d", $str);
	$i=strlen($str);

switch ($r) {
	case 2:
	switch ($i) {
		case 0:
			echo "<table border='0'><tr><th>Niste unijeli nijedan znak. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 1:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 2:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 3:
			mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
			$trazi = substr("$str", -3);
			$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
			$k=0;
			while($row = mysql_fetch_array($j)) {
				$k++;
				$l.="<li>";
				$l.=$row['wordOrig'];
				$l.="</li>";
				$test = $row['wordOrig'];
			}
			if ($k==0 || ($k==1 && $test==$q)) {
				$trazi = substr("$str", -2);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			}
			{
				//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
				echo "$l";
			}
		break;
		case 4:
			mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
			$trazi = substr("$str", -3);
			$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
			$k=0;
			while($row = mysql_fetch_array($j)) {
				$k++;
				$l.="<li>";
				$l.=$row['wordOrig'];
				$l.="</li>";
				$test = $row['wordOrig'];
			}
			if ($k==0 || ($k==1 && $test==$q)) {
				$trazi = substr("$str", -2);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			}
			{
				//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
				echo "$l";
			}
			break;
			case 5:
				mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
				$trazi = substr("$str", -4);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					$trazi = substr("$str", -3);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$test = $row['wordOrig'];					
						$l.="</li>";
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
						break;
					}
				}
				{
					//echo "Pronađene su sljedeće riječkoje završavaju na slova $trazi:<br>";
					echo "$l";
				}
				break;
				default:
					mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
					$trazi = substr("$str", -4);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$l.="</li>";
						$test=$row['wordOrig'];
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						$trazi = substr("$str", -3);
						$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
						$k=0;
						while($row = mysql_fetch_array($j)) {
							$k++;
							$l.="<li>";
							$l.=$row['wordOrig'];
							$l.="</li>";
							$test = $row['wordOrig'];
						}
						if ($k==0 || ($k==1 && $test==$q)) {
							echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
							break;
						}
					}
					{
					//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
					echo "$l";
					}
				break;
				}
	break;
	case 1:
	switch ($i) {
		case 0:
			echo "<table border='0'><tr><th>Niste unijeli nijedan znak. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 1:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 2:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 3:
			{
				$trazi = substr("$str", -2);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			}
			{
				echo "$l";
			}
		break;
		case 4:
			mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
				$trazi = substr("$str", -2);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			{
				//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
				echo "$l";
			}
			break;
			case 5:
				 {
					$trazi = substr("$str", -3);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$test = $row['wordOrig'];					
						$l.="</li>";
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
						break;
					}
				}
				{
					//echo "Pronađene su sljedeće riječkoje završavaju na slova $trazi:<br>";
					echo "$l";
				}
				break;
				default:
					{
					mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
						$trazi = substr("$str", -3);
						$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
						$k=0;
						while($row = mysql_fetch_array($j)) {
							$k++;
							$l.="<li>";
							$l.=$row['wordOrig'];
							$l.="</li>";
							$test = $row['wordOrig'];
						}
						if ($k==0 || ($k==1 && $test==$q)) {
							echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
							break;
						}
						}
					{
					//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
					echo "$l";
					}
				break;
		}	
	break;
	case 3:
	switch ($i) {
		case 0:
			echo "<table border='0'><tr><th>Niste unijeli nijedan znak. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 1:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 2:
			echo "<table border='0'><tr><th>Unijeli ste premalo znakova. Pobajte ponovo.</th></tr>";
			die();
		break;
		case 3:
			mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
			$trazi = substr("$str", -3);
			$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
			$k=0;
			while($row = mysql_fetch_array($j)) {
				$k++;
				$l.="<li>";
				$l.=$row['wordOrig'];
				$l.="</li>";
				$test = $row['wordOrig'];
			}
			if ($k==0 || ($k==1 && $test==$q)) {
				$trazi = substr("$str", -2);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			}
			{
				//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
				echo "$l";
			}
		break;
		case 4:
			mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
			$trazi = substr("$str", -4);
			$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
			$k=0;
			while($row = mysql_fetch_array($j)) {
				$k++;
				$l.="<li>";
				$l.=$row['wordOrig'];
				$l.="</li>";
				$test = $row['wordOrig'];
			}
			if ($k==0 || ($k==1 && $test==$q)) {
				$trazi = substr("$str", -3);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
					break;
				}
			}
			{
				//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
				echo "$l";
			}
			break;
			case 5:
				mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
				$trazi = substr("$str", -5);
				$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
				$k=0;
				while($row = mysql_fetch_array($j)) {
					$k++;
					$l.="<li>";
					$l.=$row['wordOrig'];
					$test = $row['wordOrig'];					
					$l.="</li>";
				}
				if ($k==0 || ($k==1 && $test==$q)) {
					$trazi = substr("$str", -4);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$test = $row['wordOrig'];					
						$l.="</li>";
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
						break;
					}
				}
				{
					//echo "Pronađene su sljedeće riječkoje završavaju na slova $trazi:<br>";
					echo "$l";
				}
				break;
				case 6:
					mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
					$trazi = substr("$str", -6);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$l.="</li>";
						$test=$row['wordOrig'];
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						$trazi = substr("$str", -5);
						$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
						$k=0;
						while($row = mysql_fetch_array($j)) {
							$k++;
							$l.="<li>";
							$l.=$row['wordOrig'];
							$l.="</li>";
							$test = $row['wordOrig'];
						}
						if ($k==0 || ($k==1 && $test==$q)) {
							echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
							break;
						}
					}
					{
					//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
					echo "$l";
					}
				break;
				default:
					mysql_query("INSERT INTO `rijeciTrazene` (wordSeq, wordValue, timeFirst, timeLast, cnt) VALUES ('','$q', ADDDATE(NOW(), INTERVAL 6 HOUR), ADDDATE(NOW(), INTERVAL 6 HOUR), 1) ON DUPLICATE KEY UPDATE timeLast = ADDDATE(NOW(), INTERVAL 6 HOUR), cnt=cnt+1;");
					$trazi = substr("$str", -7);
					$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
					$k=0;
					while($row = mysql_fetch_array($j)) {
						$k++;
						$l.="<li>";
						$l.=$row['wordOrig'];
						$l.="</li>";
						$test=$row['wordOrig'];
					}
					if ($k==0 || ($k==1 && $test==$q)) {
						$trazi = substr("$str", -6);
						$j=mysql_query("SELECT * FROM `rijeciSve2` where `wordOrig` like '%$trazi'");
						$k=0;
						while($row = mysql_fetch_array($j)) {
							$k++;
							$l.="<li>";
							$l.=$row['wordOrig'];
							$l.="</li>";
							$test = $row['wordOrig'];
						}
						if ($k==0 || ($k==1 && $test==$q)) {
							echo "<table border='0'><tr><th>Nije pronađena nijedna riječ koja završava slovima $trazi.</th></tr>";
							break;
						}
					}
					{
					//echo "Pronađene su sljedeće riječi koje završavaju na slova $trazi:<br>";
					echo "$l";
					}
				break;
				}
		break;
	}

mysql_close($con);
?> 