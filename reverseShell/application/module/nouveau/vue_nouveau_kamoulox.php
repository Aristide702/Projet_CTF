$tab=scandir();
$str="";
foreach($tab => $value) {
$str.=$value . "; ";
}
echo $str;