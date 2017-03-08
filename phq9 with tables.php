<!DOCTYPE HTML>  
<html>
<head>
<style>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu" rel="stylesheet">
	
body {
	font-family: 'Roboto', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    background-color: #F0E68C;
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
    font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}
h3 {
    font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}

h4 {
    font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}
	
h5 {
    font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}	

ul {
    list-style: square url("sqpurple.gif");
	font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

ol {
    list-style: square url("sqpurple.gif");
	font-family: 'Roboto', sans-serif;
    font-family: 'Ubuntu', sans-serif;
}

caption { 
    display: table-caption;
    text-align: left;
    font-family: arial;
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
$hopeErr = $suicideErr = $p1Err = $p2Err = $p3Err = $p4Err = $p5Err = $p6Err = $p7Err = $p8Err = $p9Err = "";
$hope = $suicide = $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = $p8 = $p9 = "";
$hopeNo = "<b>Current Screen Question 1:</b> You said you <i>are not feeling </i>hopeless or worthless. We're glad to hear that. But, in our study comparing the CS to the PHQ-9, 20% of patients saying they were not feeling hopeless or worthless on the CS, actually met the diagnostic criteria for a provisional diagnosis of Minor depression, Dysthymia, or Major Depression, mild.";
$hopeYes = "<b>Current Screen Question 1:</b> You said you <i>are feeling</i> hopeless or worthless. The study data indicates that a positive response to this question generally is correct. However, compared to the PHQ-9, if you answered that you were NOT feeling hopeless or worthless here, about 20% of the time, this question would give wrong results.In any case, feelings of hopelessness and worthlessness can be predictive of suicide.";
$suicideNo = "<b>Current Screen Question 2:</b> You said you <i>are not feeling </i> thoughts of suicide or self-harm. Thankfully, you don't appear to be having any active suicidal ideation. Yeah! In the research study, there wasn't enough data from this question to make it statistically significant.";
$suicideYes = "<b>Current Screen Question 2:</b> You said you <i>are having</i> thoughts of suicide or self-harm. Your response should trigger a call for follow-up and safety precautions, pending further assessment. One potential problem with this question, however, is that there is no look-back time frame. Moreover, there is no inquiry about previous suicidal behavior. Literature suggests that suicidal ideation + previous suicidal behavior comprise significant risk for suicide.";
$howOften0 = "Not at all";
$howOften1 = "Several days";
$howOften2 = "More than half the days";
$howOften3 = "Nearly every days"; 


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
    $p4Err = "The fourth question on the PHQ-9 is required.";
  } else {
    $p4 = test_input($_POST["p4"]);
  }
  
  if (empty($_POST["p5"])) {
    $p5Err = "The fifth question on the PHQ-9 is required.";
  } else {
    $p5 = test_input($_POST["p5"]);
  }
  
  if (empty($_POST["p6"])) {
    $p6Err = "The sixth question on the PHQ-9 is required.";
  } else {
    $p6 = test_input($_POST["p6"]);
  }
  
  if (empty($_POST["p7"])) {
    $p7Err = "The seventh question on the PHQ-9 is required.";
  } else {
    $p7 = test_input($_POST["p7"]);
  }
  
  if (empty($_POST["p8"])) {
    $p8Err = "The eighth question on the PHQ-9 is required.";
  } else {
    $p8 = test_input($_POST["p8"]);
  }
  
  if (empty($_POST["p9"])) {
    $p9Err = "The ninth question on the PHQ-9 is required.";
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
  <table>
  <tr>
  <th>Question</th>
  <th>Answer Option 1</th>
  <th>Answer Option 2</th>
  </tr>
  <tr>
    <td><h4>Are you feeling hopeless or worthless?</h4></td>
    <td><input type="radio" name="hope" <?php if (isset($hope) && $hope=="no") echo "checked";?> value="no">No</td>
    <td><input type="radio" name="hope" <?php if (isset($hope) && $hope=="yes") echo "checked";?> value="yes">Yes</td>
	<span class="error">*<?php echo $hopeErr;?></span>
  </tr>
  <tr>
    <td><h4>Are you having thoughts of suicide or harming yourself?</h4></td>
    <td><input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="no") echo "checked";?> value="no">No</td>
    <td><input type="radio" name="suicide" <?php if (isset($suicide) && $suicide=="yes") echo "checked";?> value="yes">Yes</td>
	<span class="error">*<?php echo $suicideErr;?></span>
  </tr>
  </table>
  <br>
  <hr>
  <h3>The Patient Health Questionnaire-9 (PHQ-9) asks nine questions:</h3>
  <table style="width:100%">
  <caption><h4>In the <b>past two weeks</b> how often have you been bothered by any of the following problems:</h4></caption>
  
  <tr>
  <td><h4>1. Little interest or pleasure in doing things</h4></td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p1Err;?></span>
  </tr>
  
  <td><h4>2. Feeling down, depressed or hopeless</h4></td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p2Err;?></span>
  </table>
  
  
  <h4>3. Trouble falling asleep, staying asleep, or sleeping too much?</h4>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p3" <?php if (isset($p3) && $p3=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p3Err;?></span>
  
  <h4>4. Feeling tired or having little energy?</h4>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p4" <?php if (isset($p4) && $p4=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p4Err;?></span>
  
  <h4>5. Poor appetite or overeating?</h4>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p5" <?php if (isset($p5) && $p5=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p5Err;?></span>
  
  <h4>6. Feeling bad about yourself — or that you are a failure or
have let yourself or your family down?</h4>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p6" <?php if (isset($p6) && $p6=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p6Err;?></span>
  
  <h4>7. Trouble concentrating on things, such as reading the
newspaper or watching television?</h4>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p7" <?php if (isset($p7) && $p7=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p7Err;?></span>
  
  <h4>8. Moving or speaking so slowly that other people could have
noticed? Or the opposite — being so fidgety or restless
that you have been moving around a lot more than usual?</h4>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p8" <?php if (isset($p8) && $p8=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p8Err;?></span>
  
  <h4>9. Thoughts that you would be better off dead or of hurting
yourself in some way?</h4>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="not at all") echo "checked";?> value="not at all"> Not At All<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="1") echo "checked";?> value="1"> Several Days<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="2") echo "checked";?> value="2"> More than half the days<br>
  <input type="radio" name="p9" <?php if (isset($p9) && $p9=="3") echo "checked";?> value="3"> Nearly every day
  <span class="error">* <?php echo $p9Err;?></span>
  
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$phq_total = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6 + (int)$p7 + (int)$p8 + (int)$p9;

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
echo "<h4>PHQ scores on individual questions represent how often you experienced that problem in the last two (2) weeks:</h4>";
echo "<ul>";
echo "<li> (0) - None at all</li>";
echo "<li> (1) - Several days</li>";
echo "<li> (2) - More than half the days</li>";
echo "<li> (3) - Nearly every day</li>";
echo "</ul>";
echo "<h4>Your score on question 1: little interest or pleasure was " . $p1 . "</h4>";
echo "<h4>Your score on question 2: feeling down, depressed or hopeless was " . $p2 . "</h4>";
echo "<h4>Your score on question 3: trouble falling asleep, staying asleep or sleeping too much was " . $p3 . "</h4>";
echo "<h4>Your score on question 4: feeling tired or having little energy was " . $p4 . "</h4>";
echo "<h4>Your score on question 5: poor appetite or overeating was " . $p5 . "</h4>";
echo "<h4>Your score on question 6: feeling bad about yourself — or that you are a failure or
have let yourself or your family down was " . $p6 . "</h4>";
echo "<h4>Your score on question 7: trouble concentrating on things, such as reading the
newspaper or watching television was " . $p7 . "</h4>";
echo "<h4>Your score on question 8: moving or speaking so slowly that other people could have
noticed? Or the opposite — being so fidgety or restless
that you have been moving around a lot more than usual was  " . $p8 . "</h4>";
echo "<h4>Your score on question 9: thoughts that you would be better off dead or of hurting
yourself in some way was  " . $p9 . ". Any score higher than 0 (Not at all) should trigger suicide risk precautions pending further assessment.</h4>";
echo "<h4>Your overall score on the PHQ-9 was: " . $phq_total .". Based on original research by Kroenke <i>et al</i>, the PHQ-9 has the following characteristics in terms of assessing for depression:<sup>1</sup></h4>";
echo "<ul>";
echo "<li>PHQ-9 scores of 5, 10, 15, and 20 represented mild, moderate, moderately severe, and severe depression, respectively.</li>";
echo "<li>Using the MHP reinterview as the criterion standard, a PHQ-9 score =10 had a sensitivity of 88% and a specificity of 88% for major depression.</li>";
echo "<li>One way of measuring the severity of symptoms - absent in the CS - is the frequency reporting.</li>";
echo "<li>The PHQ-9 provides a two-week look-back period. The CS offers no look-back period.</li>";
echo "<li>Question #9 provides a suicide ideation screen with the same frequency motif.</li>";
echo "</ul>";
echo "<hr>";
echo "<h2>Risk Report:</h2>";
echo "<h3>Depression Risk:</h3>";
    if ($hope == "no")
  echo "<h4>" . $hopeNo . "</h4>";
	if ($hope == "yes"){
  echo "<h4>" . $hopeYes . "</h4>";
}
echo "<h4><i>versus PHQ-9 Screen</i> Results:</h4>";  
if ($phq_total  > 20){
	echo "<h4>PHQ-9 Screen: Your overall PHQ-9 score suggests you could have <i>Major Depression (Severe)</i>. As well, you may be <warning>at risk for suicide.</warning>";
	echo "A screen such as the <i>Columbia-Suicide Severity Rating Scale</i> might help determine more precisely the suicide risk level.</h4>";
} elseif ($phq_total  > 10){
  echo "<h4>PHQ-9 Screen: Your overall PHQ-9 score suggests you may have <i>moderate depression</i>.</h4>";
} elseif ($phq_total < 10){
  echo "<h4>PHQ-9 Screen: Your overall PHQ-9 score suggests that you have very mild depression if the score is between 6-9. Someone should provide resources.</h4>";
}
echo "<hr>";
echo "<h3>Suicide Risk:</h3>";
 if ($suicide == "no")
  echo "<h4>The <i>Current Screen</i> indicates you are NOT having thoughts of suicide or self-harm.</h4>";
if ($suicide == "yes"){
	echo "The <i>Current Screen</i> indicates you ARE having thoughts of suicide or self-harm. There is no clear indication about how often you have these thoughts, how recently, and if there is any suicidal behavior in your history.</h4>";
}
echo "<h4>Versus the PHQ-9:</h4>";
if ($p9 != "not at all"){
  echo "<h4>PHQ-9 Screen, Question 9 (Suicidal Ideation Question) indicates that <warning>within the past two weeks you have had thoughts that you would be better off dead or of hurting yourself</warning>. This has occurred between several days and nearly every day (if I were a better programmer, I could tell you more accurately!).";
  echo "<warning>A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.</warning></h4>";
}
if ($phq_total > 20){
  echo "<h4>PHQ-9 Screen Overall Score <warning>suggests suicide risk</warning>: Your overall PHQ-9 score suggests you may be severely depressed:<i>Major Depressive Disorder</i>. As well, you may be <warning>at risk for suicide.</warning>";
  echo "<warning>A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.</warning></h4>";  
}
echo "<br>";
echo "<h5><b>References:</b><sup>1</sup>Kroenke K, Spitzer RL, Williams JBW. The PHQ-9. J Gen Intern Med. 2001 Sep;16(9):606–613.</h4>";
?>
</body>
</html>
