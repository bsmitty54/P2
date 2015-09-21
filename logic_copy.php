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

if (isset($_GET["words"])) {
  $pwcnt = (int) $_GET["pwcnt"];
  $schar = (int) $_GET["schar"];
  $digits = (int) $_GET["digits"];
  for ($x = 0; $x < $pwcnt; $x++) {

    // first get the proper # of randomm words from the word list

    $sc = "!@#$%&*()+{}[]\/?";
    $dig = "0123456789";
    $rwords = Array();
    $num = (int) $_GET["words"];
    for ($i = 0; $i < $num; $i ++ ) {
      // if wordlist has more entries than word needed for password, assure uniqueness
      $newword = $wordlist[rand(0,count($wordlist)-1)];
      while (array_search($newword,$rwords) && $num <= count($wordlist)) {
        $newword = $wordlist[rand(0,count($wordlist))];
      }
      $rwords[$i] = $newword;
    }

    // now string them together

    $pword = '';
    for ($i = 0; $i < count($rwords); $i++) {
      // check for camelcase
      $sep = $_GET["separator"];
      $rwords[$i] = strtolower($rwords[$i]);
      if ($sep == "CamelCase") {
        $rwords[$i] = ucfirst($rwords[$i]);
      }
      if($sep == "Hyphen" && $i>0) {
        $rwords[$i] = "-" . $rwords[$i];
      }
      if($sep == "Space" && $i>0) {
        $rwords[$i] = " " . $rwords[$i];
      }
      // now add a special character or a digit if needed

      if ($schar > $i) {
        //add a special character - remove the character from the string to
        //prevent duplicates
        $r = rand(0,strlen($sc)-1);
        $c = substr($sc,$r,1);
        $sc = str_replace($c,'',$sc);
        $rwords[$i] = $rwords[$i] . $c;
      }
      if ($digits > $i) {
        //add a digit - remove the digit from the string to
        //prevent duplicates
        $r = rand(0,strlen($dig)-1);
        $c = substr($dig,$r,1);
        $dig = str_replace($c,'',$dig);
        $rwords[$i] = $rwords[$i] . $c;
      }

      // now concatenate the word to the password
      $pword = $pword . $rwords[$i];
    }

    $pw[$x] = $pword;
  }
}
