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
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$hopeErr = $suicideErr = $p1Err = $p2Err = $p3Err = "";
$hope = $suicide = $p1 = $p2;
$hopeNo = "<b>Question 1:</b> You said you <i>are not feeling </i>hopeless or worthless. We're glad to hear that. But, in our study comparing the CS to the PHQ-9, 20% of patients saying they were not feeling hopeless or worthless on the CS, actually met the diagnostic criteria for a provisional diagnosis of Minor depression, Dysthymia, or Major Depression, mild.";
$hopeYes = "<b>Question 1:</b> You said you <i>are feeling</i> hopeless or worthless. The study data indicates that a positive response to this question generally is correct. However, compared to the PHQ-9, if you answered that you were NOT feeling hopeless or worthless here, about 20% of the time, this question would give wrong results.";
$suicideNo = "<b>Question 2:</b> You said you <i>are not feeling </i> thoughts of suicide or self-harm. Thankfully, you don't appear to be having any active suicidal ideation. Yeah! In the research study, there wasn't enough data from this question to make it statistically significant.";
$suicideYes = "<b>Question 2:</b> You said you <i>are having</i> thoughts of suicide or self-harm. Your response should trigger a call for follow-up and safety precautions, pending further assessment. One potential problem with this question, however, is that there is no look-back time frame. Moreover, there is no inquiry about previous suicidal behavior. Literature suggests that suicidal ideation + previous suicidal behavior comprise significant risk for suicide.";
$howOften0 = "Not at all";
$howOften1 = "Several days";
$howOften2 = "More than half the days";
$howOften3 = "Nearly every days"; 
$phq_total = $p1 + $p2 + $p3;


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
    // check if name only contains letters and whitespace
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
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Current Screen (CS) Compared to the Patient Health Questionnaire-9 (PHQ-9) Study</h1>
<h3>You can take both screens right here!</h3>
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
  
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$phq_total = $p1 + $p2 +$p3;

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
echo "<h4>Your score on little interest or pleasure was " . $p1 . "</h4>";
echo "<h4>Your score on feeling down, depressed or hopeless was " . $p2 . "</h4>";
echo "<h4>Your score on falling asleep, staying asleep or sleeping too much was " . $p3 . "</h4>";
echo "<h4>Your overall score on the PHQ-9 was: " . $phq_total ."</h4>";
echo "<br>";
?>

</body>
</html>
