<!DOCTYPE HTML>  
<html>
<head>
<style>
{
    background-color: lightblue;
}
h1 {
    color: black;
    text-align: center;
}
h2 {
    color: black;
    text-align: center;
	font-family: verdana;
    font-size: 20px;
}
p {
    font-family: verdana;
    font-size: 20px;
}
h3 {
    font-family: verdana;
    font-size: 20px;
}
h4 {
    font-family: verdana;
    font-size: 14px;
}
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$hopeErr = $suicideErr = $commentErr = $websiteErr = "";
$hope = $suicide = $comment = $website = "";
$hopeNo = "<b>Question 1:</b> - You said you <i>are not feeling </i>hopeless or worthless. We're glad to hear that. But, in our study using the PHQ-9 as the gold standard, 20% of patients who said they weren't feeling hopeless or worthless, actually DID meet diagnostic criteria for a provisional diagnosis of Minor depression, Dysthymia, or Major Depression, mild.";
$hopeYes = "<b>Question 1:</b> - You said you <i>are feeling</i> hopeless or worthless. The study data indicates that a positive response to this question generally is correct. However, compared to the PHQ-9, if you answered that you were NOT feeling hopeless or worthless here, about 20% of the time, this question would give wrong results.";
$suicideNo = "<b>Question 2:</b> - You said you <i>are not feeling </i> thoughts of suicide or self-harm. Thankfully, you don't appear to be having any active suicidal ideation. Yeah! In the research study, there wasn't enough data from this question to make it statistically significant.";
$suicideYes = "<b>Question 2:</b> - You said you <i>are having</i> thoughts of suicide or self-harm. Your response should trigger a call for follow-up and safety precautions, pending further assessment. One potential problem with this question, however, is that there is no look-back time frame. Moreover, there is no inquiry about previous suicidal behavior. Literature suggests that suicidal ideation + previous suicidal behavior comprise significant risk for suicide.";
$phq_total = $p1 + $p2

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["hope"])) {
    $hopeErr = "Hope is required";
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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
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
<p>The Current Screen asks two questions:</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Are you feeling hopeless or worthless?
  <input type="radio" name="hope" <?php if (isset($hope) && $hope=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="hope" <?php if (isset($hope) && $hope=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $hopeErr;?></span>
  <br><br>
  Are you having thoughts of suicide or harming yourself?
  <input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $suicideErr;?></span>
  <br><br>
  <p>The Patient Health Questionnaire-9 (PHQ-9)asks nine questions:</p>
  <h2>In the <b>past two weeks</b> how often have you been bothered by any of the following problems:</h2>
  <h3>1. Little interest or pleasure in doing things</h2>

  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p1" <?php if (isset($p1) && $p1=="3") echo "checked";?> value="3"> Nearly every day
  
  <h3>2. Feeling down, depressed or hopeless</h2>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="0") echo "checked";?> value="0"> Not At All<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p2" <?php if (isset($p2) && $p2=="3") echo "checked";?> value="3"> Nearly every day

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$phq_total = $p1 + $p2;
echo "<h3>Here's your responses:</h3>";
    if ($hope == "no")
  echo "<h4>" . $hopeNo . "</h4>";
    if ($hope == "yes")
  echo "<h4>" . $hopeYes . "</h4>";
    if ($suicide == "no")
  echo "<h4>" . $suicideNo . "</h4>";
    if ($suicide == "yes")
  echo "<h4>" . $suicideYes . "</h4>";
echo "<h4>Your score on the PHQ-9 was: " . $phq_total ."</h4>";
echo "<br>";
?>

</body>
</html>
