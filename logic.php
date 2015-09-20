<?php

// load the words from the text files - 4 files
// animals, things, verbs, colors

// first initialize the array

$wordlist = Array();
$wc=0;

$wcat = "Random";

if(isset($_GET["wordcat"])) {
  $wcat = $_GET["wordcat"];
}


//load animals
$file = fopen('animals.txt','r') or die($php_errormsg);
while (! feof($file)) {
    if ($line = fgets($file)) {
        $words = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
        // load the words now

        for ($i = 0; $i < count($words); $i++) {
          // load the words
          if($wcat=="Animals" || $wcat=="Random") {
            $wordlist[$wc] = $words[$i];
            $wc++;
          }

        }
    }
}
fclose($file) or die($php_errormsg);

//load things
$file = fopen('things.txt','r') or die($php_errormsg);
while (! feof($file)) {
    if ($line = fgets($file)) {
        $words = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
        // load the words now

        for ($i = 0; $i < count($words); $i++) {
          // load the words
          if($wcat=="Things" || $wcat=="Random") {
            $wordlist[$wc] = $words[$i];
            $wc++;
          }

        }
    }
}
fclose($file) or die($php_errormsg);

//load verbs
$file = fopen('verbs.txt','r') or die($php_errormsg);
while (! feof($file)) {
    if ($line = fgets($file)) {
        $words = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
        // load the words now

        for ($i = 0; $i < count($words); $i++) {
          // load the words
          if($wcat=="Verbs" || $wcat=="Random") {
            $wordlist[$wc] = $words[$i];
            $wc++;
          }

        }
    }
}
fclose($file) or die($php_errormsg);

//load animals
$file = fopen('colors.txt','r') or die($php_errormsg);
while (! feof($file)) {
    if ($line = fgets($file)) {
        $words = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
        // load the words now

        for ($i = 0; $i < count($words); $i++) {
          // load the words
          if($wcat=="Colors" || $wcat=="Random") {
            $wordlist[$wc] = $words[$i];
            $wc++;
          }

        }
    }
}
fclose($file) or die($php_errormsg);

// now generate the passwords based on the user's selections

$pw = Array();
$pw[0] = "this-is-a-test";
$pw[1] = "this-is-only-a-test";
