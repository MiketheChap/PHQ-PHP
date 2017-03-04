<!DOCTYPE HTML>  
<html>
<head>
<style>
body {
	font-family: verdana;
    background-color: lightblue;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	font-size:20px;
}

h1 {
    color: black;
    text-align: center;
}
h2 {
    color: black;
    text-align: left;
}
p {
    font-family: verdana;
}
h3 {
    font-family: verdana;
}

h4 {
    font-family: verdana;
}

warning {
	color: red;
}
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$hopeErr = $suicideErr = $p1Err = $p2Err = $p3Err = $p4 = $p5 = $p6 = $p7 = $p8 = $p9 = "";
$hope = $suicide = $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = $p8 = $p9 = "";
$hopeNo = "<b>Question 1:</b> You said you <i>are not feeling </i>hopeless or worthless. We're glad to hear that. But, in our study comparing the CS to the PHQ-9, 20% of patients saying they were not feeling hopeless or worthless on the CS, actually met the diagnostic criteria for a provisional diagnosis of Minor depression, Dysthymia, or Major Depression, mild.";
$hopeYes = "<b>Question 1:</b> You said you <i>are feeling</i> hopeless or worthless. The study data indicates that a positive response to this question generally is correct. However, compared to the PHQ-9, if you answered that you were NOT feeling hopeless or worthless here, about 20% of the time, this question would give wrong results.";
$suicideNo = "<b>Question 2:</b> You said you <i>are not feeling </i> thoughts of suicide or self-harm. Thankfully, you don't appear to be having any active suicidal ideation. Yeah! In the research study, there wasn't enough data from this question to make it statistically significant.";
$suicideYes = "<b>Question 2:</b> You said you <i>are having</i> thoughts of suicide or self-harm. Your response should trigger a call for follow-up and safety precautions, pending further assessment. One potential problem with this question, however, is that there is no look-back time frame. Moreover, there is no inquiry about previous suicidal behavior. Literature suggests that suicidal ideation + previous suicidal behavior comprise significant risk for suicide.";
$howOften0 = "Not at all";
$howOften1 = "Several days";
$howOften2 = "More than half the days";
$howOften3 = "Nearly every days"; 

$phq_total = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["hope"])) {
    $hopeErr = "The question about hope is required";
  } else {
    $hope = test_input($_POST["hope"]);
    // check if name only contains letters and whitespace
  }
  
  if (empty($_POST["suicide"])) {
    $suicideErr = "The answer about suicide is required";
  } else {
    $suicide = test_input($_POST["suicide"]);
  }
    
  if (empty($_POST["p1"])) {
    $p1Err = "The first question on the PHQ-9 is required.";
  } else {
    $p1 = test_input($_POST["p1"]);
    }

  if (empty($_POST["p2"])) {
    $p2Err = "The second question on the PHQ-9 is required.";
  } else {
    $p2 = test_input($_POST["p2"]);
  }
  
  if (empty($_POST["p3"])) {
    $p3Err = "The third question on the PHQ-9 is required.";
  } else {
    $p3 = test_input($_POST["p3"]);
  }
  
  if (empty($_POST["p4"])) {
    $p3Err = "The fourth question on the PHQ-9 is required.";
  } else {
    $p4 = test_input($_POST["p4"]);
  }
  
  if (empty($_POST["p5"])) {
    $p3Err = "The fifth question on the PHQ-9 is required.";
  } else {
    $p5 = test_input($_POST["p5"]);
  }
  
  if (empty($_POST["p6"])) {
    $p3Err = "The sixth question on the PHQ-9 is required.";
  } else {
    $p6 = test_input($_POST["p6"]);
  }
  
  if (empty($_POST["p7"])) {
    $p3Err = "The seventh question on the PHQ-9 is required.";
  } else {
    $p7 = test_input($_POST["p7"]);
  }
  
  if (empty($_POST["p8"])) {
    $p3Err = "The eighth question on the PHQ-9 is required.";
  } else {
    $p8 = test_input($_POST["p8"]);
  }
  
  if (empty($_POST["p9"])) {
    $p3Err = "The ninth question on the PHQ-9 is required.";
  } else {
    $p9 = test_input($_POST["p9"]);
  }
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Current Screen (CS) Compared to the Patient Health Questionnaire-9 (PHQ-9) Study</h1>
<h3>You can take both screens right here! No personal information of any type is desired or saved. However, do not enter anything relevant to you own personal experience. After you hit the Submit Button, your scores and alerts will be shown underneath the Submit Button.</h3>
<hr>
<h3>The <b>Current Screen</b> asks two questions:</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <h4>Are you feeling hopeless or worthless?</h4>
  <input type="radio" name="hope" <?php if (isset($hope) && $hope=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="hope" <?php if (isset($hope) && $hope=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $hopeErr;?></span>
  <br><br>
  <h4>Are you having thoughts of suicide or harming yourself?</h4>
  <input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $suicideErr;?></span>
  <br><br>
  <hr>
  <h3>The Patient Health Questionnaire-9 (PHQ-9)asks nine questions:</h3>
  
  <h4>In the <b>past two weeks</b> how often have you been bothered by any of the following problems:</h4>
  <h5>1. Little interest or pleasure in doing things</h5>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p1Err;?></span>
  
  <h5>2. Feeling down, depressed or hopeless</h5>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p2Err;?></span>
  
  <h5>3. Trouble falling asleep, staying asleep, or sleeping too much?</h5>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p3Err;?></span>
  
  <h5>4. Feeling tired or having little energy?</h5>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p4Err;?></span>
  
  <h5>5. Poor appetite or overeating?</h5>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p5Err;?></span>
  
  <h5>6. Feeling bad about yourself — or that you are a failure or
have let yourself or your family down?</h5>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p6Err;?></span>
  
  <h5>7. Trouble concentrating on things, such as reading the
newspaper or watching television?</h5>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p6Err;?></span>
  
  <h5>8. Moving or speaking so slowly that other people could have
noticed? Or the opposite — being so fidgety or restless
that you have been moving around a lot more than usual?</h5>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p6Err;?></span>
  
  <h5>9. Thoughts that you would be better off dead or of hurting
yourself in some way?</h5>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p6Err;?></span>
  
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$phq_total = $p1 + $p2 +$p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9;

echo "<h3>When you've completed the above forms, your answers will show below:</h3>";
echo "<hr>";
echo "<h3>Your Current Screen (CS) answers:</h3>";
    if ($hope == "no")
  echo "<h4>" . $hopeNo . "</h4>";
    if ($hope == "yes")
  echo "<h4>" . $hopeYes . "</h4>";
    if ($suicide == "no")
  echo "<h4>" . $suicideNo . "</h4>";
    if ($suicide == "yes")
  echo "<h4>" . $suicideYes . "</h4>";
  echo "<hr>";
  echo "<h3>Your PHQ-9 answers:</h3>";
echo "<h4>PHQ scores on individual questions represent the following frequencys for the number of days you experienced that problem in the last two weeks:</h4>";
echo "<ul>";
echo "<li>0 = None at all</li>";
echo "<li>1 = Several days</li>";
echo "<li>2 = More than half the days</li>";
echo "<li>2 = Nearly every day</li>";
echo "</ul>";
echo "<h4>Your score on (1) little interest or pleasure was " . $p1 . "</h4>";
echo "<h4>Your score on (2) feeling down, depressed or hopeless was " . $p2 . "</h4>";
echo "<h4>Your score on (3) falling asleep, staying asleep or sleeping too much was " . $p3 . "</h4>";
echo "<h4>Your score on (4) feeling tired or having little energy was " . $p4 . "</h4>";
echo "<h4>Your score on (5) poor appetite or overeating was " . $p5 . "</h4>";
echo "<h4>Your score on (6) feeling bad about yourself — or that you are a failure or
have let yourself or your family down - was " . $p6 . "</h4>";
echo "<h4>Your score on (7) trouble concentrating on things, such as reading the
newspaper or watching television  " . $p7 . "</h4>";
echo "<h4>Your score on(8) moving or speaking so slowly that other people could have
noticed? Or the opposite — being so fidgety or restless
that you have been moving around a lot more than usual was  " . $p8 . "</h4>";
echo "<h4>Your score on (9) thoughts that you would be better off dead or of hurting
yourself in some way was  " . $p9 . "</h4>";
if ($p9  > 0)
  echo "<h4><warning>Your score indicates that you may be at risk for suicide. Someone should be in close observation until you further assessed and cleared.</warning></h4>";
echo "<h4>Your overall score on the PHQ-9 was: " . $phq_total ."</h4>";
if ($phq_total  > 20)
  echo "<h4><warning>Your overall PHQ-9 score indicates that you may be at high risk for suicide. Someone should be in close observation until you are cleared.</warning></h4>";
echo "<br>";
?>
</body>
</html>
