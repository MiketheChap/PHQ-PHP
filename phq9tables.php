<!DOCTYPE HTML>  
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
	
body {
	font-family: 'Open Sans', sans-serif;
	
    background-color: #ffffff;
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
    background-color: #336b87;
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
    font-family: 'Open Sans', sans-serif;
	
}
h3 {
    font-family: 'Open Sans', sans-serif;
	
}
h4 {
    font-family: 'Open Sans', sans-serif;
	
}
	
h5 {
    font-family: 'Open Sans', sans-serif;
	
}	
ul {
    list-style: square url("sqpurple.gif");
	font-family: 'Open Sans', sans-serif;
	
}

table {
    font-family: 'Open Sans', sans-serif;
	border: 1px solid black;
    width: 100%;
}

td, th {
    border: 1px solid #ccc;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
	background: #ACD0C0
	}

tr:nth-child(odd) {
    background-color: #75b1a9;
} 

ol {
    list-style: square url("sqpurple.gif");
	font-family: 'Ubuntu', sans-serif;
	
}
caption { 
    display: table-caption;
    text-align: left;
    font-family: 'Open Sans', sans-serif;
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
//$phq_total = 0;
$hopeNo = "<b>Current Screen Question 1 =  No, I'm not feeling hopeless or worthless.</b> We're really glad to hear that! But, in our study comparing the CS to the PHQ-9, 20% of patients saying they were not feeling hopeless or worthless on the CS, actually met the diagnostic criteria for a provisional diagnosis of Minor depression, Dysthymia, or Major Depression, mild.";
$hopeYes = "<b>Current Screen Question 1 =  Yes, I am feeling hopeless or worthless.</b> The study data indicates that a positive response to this question generally is correct. However, compared to the PHQ-9, if you answered that you were NOT feeling hopeless or worthless here, about 20% of the time, this question would give wrong results. In any case, feelings of hopelessness and worthlessness can be predictive of suicide.";
$suicideNo = "<b>Current Screen Question 2: = No, Im not having thoughts of suicide or harming myself. </b> Thankfully, you don't appear to be having any active suicidal ideation. Yeah! In the research study, there wasn't enough data from this question in the CS to make it statistically significant.";
$suicideYes = "<b>Current Screen Question 2: = Yes, I am having thoughts of suicide or harming myself. </b> Your response should trigger a call for follow-up and safety precautions, pending further assessment. One potential problem with this question, however, is that there is no look-back time frame (in our study, patients would occasionally miss the <i>present tense of the question</i>. Moreover, there is no inquiry about previous suicidal behavior. Literature suggests that suicidal ideation + previous suicidal behavior comprise significant risk for suicide.";
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

<h2><center>This page is an interactive element for the presentation: <a href = "http://prezi.com/vk9vhezpdxwr/?utm_campaign=share&utm_medium=copy">A comparison of a proprietary hospital depression screening tool and the Patient Health Questionnaire (and variants)</a></center></h2> 
<h3><center>by Michael Davis
and Mary Muldoon at Baylor Hamilton Heart and Vascular Hospital</center></h3>
<h3>The study compared a health care System's proprietary, current depression screen (CS) to the PHQ-9 (and it's variants, the PHQ-2 and the PHQ-8). You can take both the current screen and the PHQ-9 right here! Please do not enter anything relevant to you own personal experience. This is for demonstration purposes only. After you hit the Submit Button, your scores and alerts will be shown underneath the Submit Button.</h3>
<hr>
<h3>The <b>Current Screen</b> asks two questions:</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <table>
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
  <h3>The Patient Health Questionnaire-9 (PHQ-9) asks nine questions. Note: The first two questions = the PHQ-2. The first 8 questions (minus the suicide ideation question) = the PHQ-8.</h3>
  <table style="width:100%">
  <caption><h4>In the <b>past two weeks</b> how often have you been bothered by any of the following problems:</h4></caption>
  
  <tr>
  <td width="50%"><h4>1. Little interest or pleasure in doing things</h4></td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="Not at all") echo "checked";?> value="Not at all"> Not At All</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p1" <?php if (isset($p1) && $p1=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p1Err;?></span>
  </tr>
  
  <tr>
  <td width="50%"><h4>2. Feeling down, depressed or hopeless</h4></td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p2" <?php if (isset($p2) && $p2=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p2Err;?></span>
  </tr>
 
  <tr>
  <td width="50%"><h4>3. Trouble falling asleep, staying asleep, or sleeping too much?</h4></td>
  <td><input type="radio" name="p3" <?php if (isset($p3) && $p3=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p3" <?php if (isset($p3) && $p3=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p3" <?php if (isset($p3) && $p3=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p3" <?php if (isset($p3) && $p3=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p3Err;?></span>
  </tr>
  
  <tr>
  <td width="50%"><h4>4. Feeling tired or having little energy?</h4></td>
  <td><input type="radio" name="p4" <?php if (isset($p4) && $p4=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p4" <?php if (isset($p4) && $p4=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p4" <?php if (isset($p4) && $p4=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p4" <?php if (isset($p4) && $p4=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p4Err;?></span>
  </tr>
  
  <tr>
  <td width="50%"><h4>5. Poor appetite or overeating?</h4></td>
  <td><input type="radio" name="p5" <?php if (isset($p5) && $p5=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p5" <?php if (isset($p5) && $p5=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p5" <?php if (isset($p5) && $p5=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p5" <?php if (isset($p5) && $p5=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p5Err;?></span>
  </tr>
  
  <tr>
  <td width="50%"><h4>6. Feeling bad about yourself - or that you are a failure or
have let yourself or your family down?</h4></td>
  <td><input type="radio" name="p6" <?php if (isset($p6) && $p6=="not at all") echo "checked";?> value="not at all"> Not At All</td>
  <td><input type="radio" name="p6" <?php if (isset($p6) && $p6=="1") echo "checked";?> value="1"> Several Days</td>
  <td><input type="radio" name="p6" <?php if (isset($p6) && $p6=="2") echo "checked";?> value="2"> More than half the days</td>
  <td><input type="radio" name="p6" <?php if (isset($p6) && $p6=="3") echo "checked";?> value="3"> Nearly every day</td>
  <span class="error">* <?php echo $p6Err;?></span>
  </tr>
  
  <tr>
  <td width="50%"><h4>7. Trouble concentrating on things, such as reading the
newspaper or watching television?</h4></td>
   <td><input type="radio" name="p7" <?php if (isset($p7) && $p7=="not at all") echo "checked";?> value="not at all"> Not At All</td>
   <td><input type="radio" name="p7" <?php if (isset($p7) && $p7=="1") echo "checked";?> value="1"> Several Days</td>
   <td><input type="radio" name="p7" <?php if (isset($p7) && $p7=="2") echo "checked";?> value="2"> More than half the days</td>
   <td><input type="radio" name="p7" <?php if (isset($p7) && $p7=="3") echo "checked";?> value="3"> Nearly every day</td>
   <span class="error">* <?php echo $p7Err;?></span>
   </tr>
   
   <tr>
   <td width="50%"><h4>8. Moving or speaking so slowly that other people could have
noticed? Or the opposite: being so fidgety or restless
that you have been moving around a lot more than usual?</h4></td>
    <td><input type="radio" name="p8" <?php if (isset($p8) && $p8=="not at all") echo "checked";?> value="not at all"> Not At All</td>
    <td><input type="radio" name="p8" <?php if (isset($p8) && $p8=="1") echo "checked";?> value="1"> Several Days</td>
    <td><input type="radio" name="p8" <?php if (isset($p8) && $p8=="2") echo "checked";?> value="2"> More than half the days</td>
    <td><input type="radio" name="p8" <?php if (isset($p8) && $p8=="3") echo "checked";?> value="3"> Nearly every day</td>
    <span class="error">* <?php echo $p8Err;?></span>
	</tr>
	
	<tr>
	<td width="50%"><h4>9. Thoughts that you would be better off dead or of hurting
yourself in some way?</h4></td>
    <td><input type="radio" name="p9" <?php if (isset($p9) && $p9=="not at all") echo "checked";?> value="not at all"> Not At All</td>
    <td><input type="radio" name="p9" <?php if (isset($p9) && $p9=="1") echo "checked";?> value="1"> Several Days</td>
    <td><input type="radio" name="p9" <?php if (isset($p9) && $p9=="2") echo "checked";?> value="2"> More than half the days</td>
    <td><input type="radio" name="p9" <?php if (isset($p9) && $p9=="3") echo "checked";?> value="3"> Nearly every day</td>
    <span class="error">* <?php echo $p9Err;?></span>
	</tr>
  </table> 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
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
echo "<li> 0 - None at all</li>";
echo "<li> 1 - Several days</li>";
echo "<li> 2 - More than half the days</li>";
echo "<li> 3 - Nearly every day</li>";
echo "</ul>";
echo "<table>";
echo "<tr>";
echo "<th>Question Number</th>";
echo "<th>Domain</th>";
echo "<th>Your score</th>";
echo "<th>Comments</th>";
echo "</tr>";
echo "<tr>";
echo "<td>1</td>";
echo "<td>Interest or Pleasure</td>";
echo "<td>" . $p1. "</td>";
echo "<td>First question of the PHQ-2, -8, and -9. Essential to a diagnosis of depression.</td>";
echo "</tr>";
echo "<tr>";
echo "<td>2</td>";
echo "<td>Feeling down, depressed or hopeless</td>";
echo "<td>" . $p2 . "</td>";
echo "<td>Second question of the PHQ-2, -8, and -9. Essential to a diagnosis of depression.</td>";
echo "</tr>";
echo "<tr>";
echo "<td>3</td>";
echo "<td>Trouble falling asleep, staying asleep or sleeping too much</td>";
echo "<td>" . $p3 . "</td>";
echo "<td>In one study, this <i>somatic</i> question proved hopeful for diagnosing sleeep disorders.</td>";
echo "</tr>";

echo "<tr>";
echo "<td>4</td>";
echo "<td>Feeling tired or having little energy</td>";
echo "<td>" . $p4 . "</td>";
echo "<td>Sometimes with somatic concerns, mental health and, say, heart disease, can be hard to distinguish.</td>";
echo "</tr>";

echo "<tr>";
echo "<td>5</td>";
echo "<td>Poor appetite or overeating</td>";
echo "<td>" . $p5 . "</td>";
echo "<td>Another somatic question where the border between mental health other medical conditions.</td>";
echo "</tr>";

echo "<tr>";
echo "<td>6</td>";
echo "<td>Feeling bad about yourself or that you are a failure or have let yourself or your family down</td>";
echo "<td>" . $p6 . "</td>";
echo "<td>This parallels the Worthlessness domain in the Current Screen (CS). Worthlessness is <i>very relevant</i> to suicide risk.</td>";
echo "</tr>";

echo "<tr>";
echo "<td>7</td>";
echo "<td>Trouble concentrating on things, such as reading the newspaper or watching television.</td>";
echo "<td>" . $p7 . "</td>";
echo "<td>Rumination - and therefore lack of ability to focus on other matters - can be a significant component of depression.</td>";
echo "</tr>";

echo "<tr>";
echo "<td>8</td>";
echo "<td>Moving or speaking so slowly that other people could have noticed? Or the opposite - being so fidgety or restless that you have been moving around a lot more than usual</td>";
echo "<td>" . $p8 . "</td>";
echo "<td></td>";
echo "</tr>";

echo "<tr>";
echo "<td>9</td>";
echo "<td>Thoughts that you would be better off dead or of hurting yourself in some way</td>";
echo "<td>" . $p9 . "</td>";
echo "<td>Any score higher than 0 (Not at all) should trigger suicide risk precautions pending further assessment. The PHQ-8 leaves off this suicide ideation question. See <a href='https://www.ncbi.nlm.nih.gov/pubmed/22850254'>here</a> for an interesting explanation. Is the PHQ-9#9 a good suicide ideation question?</td>";
echo "</tr>";

$phq_total = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6 + (int)$p7 + (int)$p8 + (int)$p9;

echo "<tr>";
echo "<td><b>Total</b></td>";
echo "<td><b>This is the total sum of scores for PHQ-9.</b></td>";
echo "<td><b>" . $phq_total . "</b></td>";
echo "<td></td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='4' bgcolor='#E4EA8C'>";
echo "<b>Based on original research by Kroenke et al, the PHQ-9 has the following characteristics in terms of assessing for depression (see link below):</b>";
echo "<ul>";
echo "<li>PHQ-9 scores of 5, 10, 15, and 20 represented mild, moderate, moderately severe, and severe depression, respectively.</li>";
echo "<li>Using the MHP reinterview as the criterion standard, a PHQ-9 score =10 had a sensitivity of 88% and a specificity of 88% for major depression.</li>";
echo "<li>One way of measuring the severity of symptoms - absent in the CS - is the frequency reporting.</li>";
echo "<li>The PHQ-9 provides a two-week look-back period. The CS offers no look-back period.</li>";
echo "<li>Question #9 provides a suicide ideation screen with the same frequency motif.</li>";
echo "</ul>";
echo "</td>";
echo "</tr>";

echo "</table>";

echo "<hr>";
echo "<h2>Risk Report:</h2>";
echo "<table>";
// depression risk table header
echo "<tr>";
// depression risk cell header
echo "<td width='50%'><b>Depression Risk - <i>Current Screen</i></b></td>";
echo "<td width='50%'><b>Depression Risk - <i>PHQ-9</i></b></td>";
echo "</tr>";
echo "<tr>";
// depression risk current screen cell contents
echo "<td>";
    if ($hope == "no")
  echo $hopeNo;
	if ($hope == "yes"){
  echo $hopeYes;
}
echo "</td>";
// depression risk phq screen cell contents
echo "<td>";
if ($phq_total > 19){
  echo "<b>PHQ-9 Screen Overall Score = " . $phq_total. "</b>. This suggests a prognosis of severe depression. As well, you may be at risk for suicide <i>given the high overall score</i>. Especially pay attention to Question #9.";
  echo " A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.";  
} elseif (($phq_total >= 15) && ($phq_total <=19)) {
	echo "<b>PHQ-9 Screen Overall Score = " . $phq_total. "</b>. - This suggests you may have depression that is moderately severe. <i>Especially pay attention to Question #9.</i> ";
} elseif ((($phq_total >= 10) && ($phq_total <=14))){
	echo "<b>PHQ-9 Screen Overall Score = " . $phq_total. "</b>. - This suggests you may have depression that is moderate. <i>Especially pay attention to Question #9.</i> ";
} elseif ((($phq_total >= 5) && ($phq_total <=9))){
	echo "<b>PHQ-9 Screen Overall Score = " . $phq_total. "</b>. - This suggests you may have depression that is mild. <i>Especially pay attention to Question #9.</i> ";
} else {"There doesn't appear to be any depression or it is minimal. However, there is no substitute for clinical judgement.";
}
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<hr>";
// suicide risk table
echo "<table>";
echo "<tr>";
// suicide risk table header
echo "<td width='50%'><b>Suicide Risk - <i>Current Screen</i></b></td>";
echo "<td width='50%'><b>Suicide Risk - <i>PHQ-9 (Question #9)</i></b></td>";
echo "</tr>";
// suicide risk cell header
echo "<tr>";
// suicide risk current screen contents
echo "<td>";
 if ($suicide == "no")
  echo "<b>Current Screen Question 2 =  No.</b> You indicated you are NOT having thoughts of suicide or self-harm.";
if ($suicide == "yes"){
	echo "<b>Current Screen Question 2 =  Yes.</b> You indicated you <b>are having thoughts of suicide or self-harm</b>. There is no clear indication about how often you have these thoughts, how recently, and if there is any suicidal behavior in your history.</h4>";
}
echo "</td>";
// suicide risk phq9#9 screen contents
echo "<td>";
if ($p9 == "1"){
  echo "<b>PHQ-9 Screen, #9 (Suicidal Ideation Question) = Positive for Suicide Risk.</b> PHQ-9 Screen, #9 (Suicidal Ideation Question) indicates you've had thoughts that you would be <b>better off dead or of hurting yourself</b> several days within the past two weeks.";
  echo " Certainly, further assessment should be done. A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.";
}elseif ($p9 == "2") {
	echo "<b>PHQ-9 Screen, #9 (Suicidal Ideation Question) = Positive for Suicide Risk.</b> PHQ-9 Screen, #9 (Suicidal Ideation Question) indicates you've had thoughts that you would be <b>better off dead or of hurting yourself</b> more than half days within the past two weeks.";
    echo " Certainly, further assessment should be done. A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.";
}elseif ($p9 == "3"){
	echo "<b>PHQ-9 Screen, #9 (Suicidal Ideation Question) = Positive for Suicide Risk.</b> PHQ-9 Screen, #9 (Suicidal Ideation Question) indicates you've had thoughts that you would be <b>better off dead or of hurting yourself</b> nearly every day within the past two weeks.";
    echo " Certainly, further assessment should be done. A screen such as the Columbia-Suicide Severity Rating Scale might help determine more precisely the suicide risk level.";
}else{	
    echo "<b>PHQ-9 Screen, #9 (Suicidal Ideation Question) = Negative for Suicide Risk.</b> PHQ-9 Screen, Question 9 (Suicidal Ideation Question) indicates you haven't had any recent thoughts of suicide. However, if the overall score is high, suicide risk may still be present. Use clinical judgement.";
}	
echo "</td>";

echo "</tr>";
echo "</table>";
echo '<h5><b>References:</b><sup>1</sup><a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC1495268/" target="_blank">Kroenke K, Spitzer RL, Williams JBW. The PHQ-9. J Gen Intern Med. 2001 Sep;16(9):606–613</a>.</h4>';
?>
</body>
</html>
