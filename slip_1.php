<html>
<body>

<form method="GET" action="#">
 Enter the String : <input type="text" name="inputStr"><br>
<input type="submit" name="Submit">
</form>

</body>

<?php

$string = $_GET['inputStr'];

$vowels = array("a"=>0,"e"=>0,"i"=>0,"o"=>0,"u"=>0);

for($i=0; $i<strlen($string); $i++) {
if(strtolower($string[$i]) == 'a') {
++$cnt;
++$vowels['a'];
}
if(strtolower($string[$i]) == 'e') {
++$cnt;
++$vowels['e'];
}
if(strtolower($string[$i]) == 'i') {
++$cnt;
++$vowels['i'];
}
if(strtolower($string[$i]) == 'o') {
++$cnt;
++$vowels['o'];
}
if(strtolower($string[$i]) == 'u') {
++$cnt;
++$vowels['u'];
}
}

echo "<h1>Display The String : ".$string."<h1>";
echo "<h1>Total number of vowels found : ".$cnt."<h1>";
echo "Occurence of 'a' : ".$vowels['a']."<br>";
echo "Occurence of 'e' : ".$vowels['e']."<br>";
echo "Occurence of 'i' : ".$vowels['i']."<br>";
echo "Occurence of 'o' : ".$vowels['o']."<br>";
echo "Occurence of 'u' : ".$vowels['u']."<br>";
$str=strrev($string);
$a=strlen($string);
$f=0;
for($j=0;$j<$a;$j++)
{
    if($str[$j]==$string[$j])
    {
        $f=0;
    }
    else
    {
        $f=1;
        break;
    }
}
if($f==0)
{
    echo"<br>string is palindrome";
}
else
{
    echo"<br>string is not palindrome";
}
?>
</html>
