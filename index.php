<?php
// mdconverter, copyright (c) by mikuta0407 and others
// Distributed under an MIT license: https://opensource.org/licenses/mit-license.php
?>

<html>
<link rel="stylesheet" href="lib/codemirror.css">
<style>.CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;}</style>
<script src="lib/js/codemirror.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/markdown.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/gfm.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/overlay.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/htmlmixed.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/xml.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/javascript.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/css.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/clike.js"></script>
<script language="javascript" type="text/javascript" src="lib/js/meta.js"></script>


<?php
#ini_set('display_errors', "On");
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

$mode="";
$mode=$_POST['mode'];

$text="";

if($mode == "mdtohtml"){
  $md=$_POST['markdown'];
  $html = mdtohtml($md);
  debug("mdtohtml");
    
} elseif ($mode == "htmltomd"){
  $html=$_POST['html'];
  $md = htmltomd($html);
  debug("htmltomd");
}

function mdtohtml($md){

	$text = Parsedown::instance()
    ->setBreaksEnabled( true )
    ->text($md);

    return $text;

}

#入力フォームの表示

$script = <<< EOT
<script language="javascript" type="text/javascript">

var heightpx = document.documentElement.clientHeight * 0.6;
var mdEditor = CodeMirror.fromTextArea(document.getElementById('markdownarea'), {
  mode: {
    name: "gfm",
    tokenTypeOverrides: {
      emoji: "emoji"
    }
  },
  lineNumbers: true,
  theme: "default"
});

mdEditor.setSize(null, heightpx);

var htmlEditor = CodeMirror.fromTextArea(document.getElementById('htmlarea'), {
  mode: {
    name: "gfm",
    tokenTypeOverrides: {
      emoji: "emoji"
    }
  },
  lineNumbers: true,
  theme: "default"
});

htmlEditor.setSize(null, heightpx);


</script>
EOT;


echo "<h1> Markdown HTML 相互変換ツール </h1>\n";
echo "リアルタイム変換はできません。ボタンを押して変換してください (MD→HTML: Parsedown, HTML→MD:markdownify, highlight→CodeMirror)<br>\n";
echo "GitHub: <a href=\"https://github.com/team-swsd/mdconverter\">https://github.com/team-swsd/mdconverter</a><br>\n";

echo "<div style=\"display: flex; width: 100%; \">\n";

echo "<div style=\"width: 50%;\">\n";

echo "<h2>Markdown</h2>\n";

echo "<form method=\"post\" action=\"index.php\">\n";

echo "<textarea id=\"markdownarea\" name=\"markdown\"\">". htmlspecialchars($md) ."</textarea>\n<br><br>\n";

echo "<button type=\"submit\" name=\"mode\" value=\"mdtohtml\" style=\"padding:10px;font-size:15px;\">Markdown to HTML ⇒</button>\n";

echo "</form>\n\n";

echo "</div>\n";

echo "<div style=\"width: 50%;\">\n";

echo "<h2>HTML</h2>\n";

echo "<form method=\"post\" action=\"index.php\">\n";

echo "<textarea id=\"htmlarea\" name=\"html\">". htmlspecialchars($html) ."</textarea>\n<br><br>\n";

echo "<button type=\"submit\" name=\"mode\" value=\"htmltomd\" style=\"padding:10px;font-size:15px;\">⇐ HTML to Markdown</button>\n";

echo "</form>";

echo "</div>\n";

echo "</div>\n";


echo $script;

?>
</html>