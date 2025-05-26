<?php
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("cict.xml");

$x=$xmlDoc->getElementsByTagName('name');

for ($i=0; $i<=$x->length-1; $i++) {
  //Process only element nodes
  if ($x->item($i)->nodeType==1) {
    if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
      $y=($x->item($i)->parentNode);
    }
  }
}

$cd=($y->childNodes);

for ($i=0;$i<$cd->length;$i++) {
  //Process only element nodes
  if ($cd->item($i)->nodeType==1){
    
    echo("<b class='root-tags'><p class='detail-text'>" . $cd->item($i)->nodeName . ":</b> ");

    echo($cd->item($i)->childNodes->item(0)->nodeValue);
    echo("<br>");
  }
}
?>
<html>
<head>
    <style>
        .root-tags{
            color: black;
            text-shadow: 1px 1px 1px white;
            font-family: sans-serif;
            text-transform: uppercase;
            margin-left:60px ;
        }
        .detail-text{
            color: green;
            font-family: Fantasy;
            text-shadow: 1px 1px 1px white;
        }
        </style>
</head>
<body>