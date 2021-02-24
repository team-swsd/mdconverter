<?php
ini_set('display_errors', "On");
#require_once("lib/Parsedown.php");
require_once("lib/htmltomd.php");
require_once(dirname(__FILE__) . '/vendor/autoload.php');

$debug_flg = false;
//デバッグログ関数
function debug($str){
  global $debug_flg;
  if($debug_flg){
    echo "<b>Debug</b>: $str<br>";
  }
}


$mode=$_POST['mode'];

$text="";

if($mode == "mdtohtml"){
    $text = mdtohtml();
    debug("mdtohtml");
    
} elseif ($mode == "htmltomd"){
    $text = htmltomd($_POST['textbox']);
    debug("text = $text");
    debug("htmltomd");
}

function mdtohtml(){

	$md=$_POST['textbox'];

	$text = Parsedown::instance()
    ->setBreaksEnabled( true )
    ->text($md);

    debug("md = $md");
    debug("text = $text");
    return $text;

}

#入力フォームの表示
echo "<h1> Markdown HTML 相互変換ツール </h1>\n";

echo "<form method=\"post\" action=\"mdconverter.php\">\n";

echo "<br><textarea name=\"textbox\" rows=\"10\" cols=\"50\">". htmlspecialchars($text) ."</textarea>\n<br><br>\n";

echo "<button type=\"submit\" name=\"mode\" value=\"mdtohtml\" style=\"padding:10px;font-size:15px;\">Markdown to HTML</button><br><br>\n";
echo "<button type=\"submit\" name=\"mode\" value=\"htmltomd\" style=\"padding:10px;font-size:15px;\">HTML to Markdown</button><br><br>\n";

echo "</form>";
 


?>