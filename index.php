<!DOCTYPE html>
<html lang="en">
<head>
  <title>Joe's xkcd Password Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <link href="includes/css/jmscss.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body onload="setDropDowns()">

<script>

  function setDropDowns() {
      //Get select object
  var objSelect = document.getElementById("words");
  //Set selected
  setSelectedValue(objSelect, <?php echo $_GET["words"]; ?>);

  var objSelect = document.getElementById("wordcat");
  //Set selected
  setSelectedValue(objSelect, <?php echo "'" . $_GET["wordcat"] . "'"; ?>);

  var objSelect = document.getElementById("schar");
  //Set selected
  setSelectedValue(objSelect, <?php echo $_GET["schar"]; ?>);

  var objSelect = document.getElementById("digits");
  //Set selected
  setSelectedValue(objSelect, <?php echo $_GET["digits"]; ?>);

    function setSelectedValue(selectObj, valueToSet) {
      for (var i = 0; i < selectObj.options.length; i++) {
          if (selectObj.options[i].text== valueToSet) {
              selectObj.options[i].selected = true;
              return;
          }
      }
  }
    //alert("Executed");
  };

</script>


<?php print_r($_GET); ?>
<?php require '../logic.php'; ?>
<?php print_r($wordlist); ?>




<div id="wrapper" class="container-fluid">


  <div id="header" class="row">
    <div id="topHeader" class="">

    	<div class="transbox">
    		Joe's xkcd Password Generator
        </div>

    </div>
  </div>

  <div id="maincontent" class="row">

      <div id="leftgutter" class="col-sm-3">
        <h2>Menu</h2>
          <ul class="nav nav-stacked">

            <li><a class="" href="http://p1.jsmitty54php.com">Project One - View</a></li>
            <li><a class="" href="https://github.com/bsmitty54/P1">Project One - Github</a></li>
            <li><a class="" href="">Project Two - View</a></li>
            <li><a class="" href="">Project Two - Github</a></li>
            <li><a class="" href="">Project Three - View</a></li>
            <li><a class="" href="">Project Three - Github</a></li>
            <li><a class="" href="">Project Four - View</a></li>
            <li><a class="" href="">Project Four - Github</a></li>
            <li><a class="" href="http://www.jsmitty54cf.com/mywebsite">My ColdFusion Project</a></li>
            <li><a class="" href="http://www.jsmitty54.com/wp">My Wordpress Project</a></li>
            <li><a class="" href="http://www.jsmitty54.com/drup">My Drupal Project</a></li>
            <li><a class="" href="http://www.jsmitty54.com">My Joomla Project</a></li>


          </ul>
      </div>
      <div id="center" class="col-sm-9">



        <p class="description">

        </p>
        <form method='GET' action='index.php'>
          <fieldset>
            <div class='pwform'>
            <legend>Password Generator Options:</legend>
            <div class='field'>
                <label for='words'>How Many Words:</label>
                <select id='words' name='words'>
                  <option selected='selected' value='1'>1</option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>
                  <option value='4'>4</option>
                  <option value='5'>5</option>
                  <option value='6'>6</option>
                  <option value='7'>7</option>
                  <option value='8'>8</option>
                  <option value='8'>9</option>
                </select>
              </div>
              <div class='field'>
                  <label for='wordcat'>Word Category:</label>
                  <select id='wordcat' name='wordcat'>
                    <option selected='selected' value='random'>Random</option>
                    <option value='Animals'>Animals</option>
                    <option value='Things'>Things</option>
                    <option value='Verbs'>Verbs</option>
                    <option value='Colors'>Colors</option>
                  </select>
                </div>
                <div class='field'>
                    <label for='schar'>How Many Special Characters:</label>
                    <select id='schar' name='schar'>
                      <option selected='selected' value='0'>0</option>
                      <option value='1'>1</option>
                      <option value='2'>2</option>
                      <option value='3'>3</option>
                      <option value='4'>4</option>
                      <option value='5'>5</option>
                    </select>
                  </div>
                  <div class='field'>
                      <label for='digits'>How Many Digits:</label>
                      <select id='digits' name='digits'>
                        <option selected='selected' value='0'>0</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                      </select>
                  </div>
                  <br>
                  <label for='separator'>Separator:</label>
                  <input type="radio" name="separator" id="Hyphen" value="Hyphen" checked> Hyphen
                  <input type="radio" name="separator" id="Space" value="Space"> Space
                  <input type="radio" name="separator" id="CamelCase" value="CamelCase"> CamelCase

                  <br><br><label for="submit">&nbsp</label>
                  <button type="submit" class="btn btn-primary">Generate the Passwords</button>
            </div>
          </div>
          </fieldset>
        </form>


  </div>

  <div id="footer" class="row">
    Dynamic Web Applications&nbsp;*&nbsp;Fall 2015&nbsp;*&nbsp;Instructor: Susan Buck&nbsp;*&nbsp;Author / Student: Joe Smith
  </div>

 </div>

<script>
document.getElementById(<?php echo "'" . $_GET["separator"] . "'"; ?>).checked = true;
</script>

</body>
</html>
