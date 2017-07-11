<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Limericks</title>
<style>
	textarea{
		line-height: 1.8em;
		font-weight: bold;
		font-size: 14px;
	}
</style>
</head>
<body>
<h1>Generate Limerick</h1>
<?php
//initialize arrays
$article=array("the","a","one","any","one","take","few","many","some");
$noun=array( "sky","bar","star","town","crown","fly","car","cry","clown","brown","sitar","jar","war","fuzzy","jury");
$verb=array("drove","jumped","ran","walked","skipped","slept","put","cut","grew");
$preposition=array("to","from","over","under","on","in","at","of","by");

$totalSentences=5;//total sentences
$sentence=array();//declare sentence array
$lastWordArr=array();
//get random strings from array
for($i=0;$i<$totalSentences;$i++){
	$rand=mt_rand(0,8);
	$sentence[$i]=ucfirst($article[mt_rand(0,8)])." ".
							$noun[mt_rand(0,14)]." ".
							$verb[mt_rand(0,8)]." ".
							$preposition[mt_rand(0,8)]." ".
							$article[mt_rand(0,4)]." ";
	$lastWord=$noun[mt_rand(0,14)];
	$lastWordArr[$i]=$lastWord;
	$sentence[$i] .= $lastWord.".\n";
	$firstRowLastChar=substr($lastWordArr[0],(strlen($lastWordArr[0])-1),1);
	
	//validate for last character of sentences
	if($i==1){
		$lastChar=substr($lastWord,(strlen($lastWord)-1),1);
		if($lastChar!=substr($lastWordArr[$i-1],(strlen($lastWordArr[$i-1])-1),1)){
			$i--;
		}
		else if($lastWord==$lastWordArr[$i-1]){
			$i--;
		}
	}
	
	else if($i==2){
		$lastChar=substr($lastWord,strlen($lastWord)-1,1);
		if($lastChar==substr($lastWordArr[$i-1],(strlen($lastWordArr[$i-1])-1),1)){
			$i--;
		}
	}
	else if($i==3){
		$lastChar=substr($lastWord,strlen($lastWord)-1,1);
		if($lastChar!=substr($lastWordArr[$i-1],(strlen($lastWordArr[$i-1])-1),1)){
			$i--;
		}
		else if($lastWord==$lastWordArr[$i-1]){
			$i--;
		}
	}
	else if($i==4){
		$lastChar=substr($lastWord,strlen($lastWord)-1,1);
		if($lastChar!=$firstRowLastChar){
			$i--;
		}
		else if($lastWord==$lastWordArr[$i-3] || $lastWord==$lastWordArr[$i-4]){
			$i--;
		}	
	}
}
?>
<textarea rows='6' cols="35">
<?php
//display content
for($i=0;$i<$totalSentences;$i++){
	echo $sentence[$i];
	}

?>
</textarea>
<p style="color: red">Click Refresh (or Reload) to run this script again</p>
</body>
</html>