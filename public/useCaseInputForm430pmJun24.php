<?php require_once("../includes/dw_UseCaseConnection.php");?>
<?php require_once("../includes/functions.php");?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usecaseinfo (useCaseName, version, subVersion, `first`, `last`, email, first2, last2, email2, goal, summary, primaryActor, primaryActorRole, otherPrimaryActors, secondaryActors, preconditions, triggers, basicFlow, alternateFlow, postconditions, notes, diagram) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )",
                       GetSQLValueString($_POST['UseCaseName'], "text"),
                       GetSQLValueString($_POST['version'], "int"),
                       GetSQLValueString($_POST['subversion'], "double"),
                       GetSQLValueString($_POST['first'], "text"),
                       GetSQLValueString($_POST['Last'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['first2'], "text"),
                       GetSQLValueString($_POST['last2'], "text"),
                       GetSQLValueString($_POST['email2'], "text"),
                       GetSQLValueString($_POST['goal'], "text"),
                       GetSQLValueString($_POST['summary'], "text"),
                       GetSQLValueString($_POST['primaryActor'], "text"),
                       GetSQLValueString($_POST['primaryActorRole'], "text"),
                       GetSQLValueString($_POST['otherPrimaryActors'], "text"),
                       GetSQLValueString($_POST['secondaryActors'], "text"),
                       GetSQLValueString($_POST['preconditions'], "text"),
                       GetSQLValueString($_POST['triggers'], "text"),
                       GetSQLValueString($_POST['basicFlow'], "text"),
                       GetSQLValueString($_POST['alternateFlow'], "text"),
                       GetSQLValueString($_POST['postConditions'], "text"),
                       GetSQLValueString($_POST['notes'], "text"),                       GetSQLValueString($_POST['diagram'], "text"));

  //mysql_select_db($database_dw_UseCaseConnection, $dw_UseCaseConnection);
 mysql_select_db($database_dw_UseCaseConnection, $dw_UseCaseConnection);
  $Result1 = mysql_query($insertSQL, $dw_UseCaseConnection) or die(mysql_error());
}
 
 // $Result1 = mysql_query($insertSQL,) or die(mysql_error());
//}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="stylesheets/public2.css" media="all" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css">
<link href="stylesheets/notesStyle.css" rel="stylesheet" type="text/css">
<link href="stylesheets/fieldFormat.css" rel="stylesheet" type="text/css">
<link href="stylesheets/defaults.css" rel="stylesheet" type="text/css" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div class="container">
<p></p>

  <div class="header"><a href="#"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:inline;" /><img src="images/bisonbannerCropped.png" width="718" height="71" alt="bisonPhoto" style="background-color:#960 /></a><a href="#"></a><a href="#"></a><!-- end .header --></div>
  <div class="content">
    <form action="<?php echo $editFormAction; ?><?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1">
    <p>
      <label for="UseCasename" class="FieldFormat">Use Case Name:</label>
      
      <span class="Notes">Give a short descriptive name to be used as a unique identifier. consider goal-driven use case name.</span></p>
    <p><span class="FieldFormat">Name</span>:   
     <input name="UseCaseName" type="text" id="UseCaseName" size="50"> 
     
      <span class="FieldFormat">version</span>: 
      <select name="version" size="1">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    sub version
    <select name="subversion" size="1" id="subversion">
      <option value=".1">.1</option>
      <option value=".2">.2</option>
      <option value=".3">.3</option>
      <option value=".4">.4</option>
      <option value="0" selected="selected">0</option>
      <option value=".5">.5</option>
      <option value=".6">.6</option>
      <option value=".7">.7</option>
      <option value=".8">.8</option>
      <option value=".9">.9</option>
    </select>
    </p>
    <p><span class="FieldFormat">Point of Contact:</span>
    <p>
      <label for="first"><span class="FieldFormat">First Name POC1</span>:</label>
    	<input type="text" name="first" id="first">
      <label for="last" class="FieldFormat">Last Name:</label>
      <input type="text" name="Last" id="Last">
    
      <span class="FieldFormat">Email: </span>
      <input type="text" name="email" id="email">
    </p>
     <p><span class="FieldFormat">
      <label for="first2">First Name POC2:</label>
      </span>
     <input type="text" name="first2" id="first2">
  <label for="last2" class="FieldFormat">Last Name:</label>
      <input type="text" name="last2" id="last2">
    
    <span class="FieldFormat">Email: </span>
      <input type="text" name="email2" id="email2">
  </p>
    <p><span class="FieldFormat">Goal:</span> ( <span class="Notes">Briefly describe what the user intends to achieve with this use case.</span>)</p>
    <p>
      
      <textarea name="goal" cols="90" rows="8" id="goal"></textarea>
    </p>
 
  <p><span class="FieldFormat">Summary:</span><span class="Notes"> Give a summary of the use case to capture the essence of the use case (no longer than a page). It provides a quick overview and includes the goal and prinicpal actor.</span></p>
  <p>
    <textarea name="summary" cols="90" rows="8" id="summary"></textarea>
  </p>
  <p><span class="FieldFormat">Actors</span>: <span class="Notes">List actors, people or things outside the system that either acts on the system(primary actors) or is acted on by the system (secondary actors). Primary actors are ones that invoke the use case and benefit from the result. Identify sensors, models, portals and rlevant data resources. Identify the primary actor and briefly describe role.</span></p>
  <p><span class="FieldFormat">Primary Actor:</span>
    <input type="text" name="primaryActor" id="primaryActor">
  </p>
  <p><span class="FieldFormat">Primary Actor's Role</span>:</p>
  <p>
  <textarea name="primaryActorRole" cols="80" rows="4" id="primaryActorRole"></textarea>
  </p>
  <p><span class="FieldFormat">Other Primary Actors:</span><span class="Notes">
    separate names by commas</span></p>
  <p>
    <textarea name="otherPrimaryActors" cols="40" rows="3" id="otherPrimaryActors"></textarea>
  </p>
  <p><span class="FieldFormat">Secondary Actors:</span><span class="Notes"> separate names by commas</span></p>
  <p>
    <textarea name="secondaryActors" cols="40" rows="3" id="secondaryActors"></textarea>
  </p>
  <p class="FieldFormat">Preconditions: <span class="Notes">State any assumptions about the state of the systme that must be met for the trigger (below) to inittiatethe use case. any assumptions about other systems can also be stated here, for example, weather conditions. List all preconditions.</span></p>
  <p class="FieldFormat">
    <textarea name="preconditions" id="preconditions" cols="80" rows="4"></textarea>
  </p>
  <p class="FieldFormat"><span class="FieldFormat">Triggers</span>: <span class="Notes">Describe in detail the event or events that brings about the execution of this use case. Triggers can be external, temporal, or internal. they can be single events or when a set of conditions are met. List all triggers and relationships.</span></p>
  <p class="FieldFormat">
    <textarea name="triggers" id="triggers" cols="80" rows="4"></textarea>
  </p>
  <p class="FieldFormat">Basic Flow: <span class="Notes">Often referred to as the primary scenario or couse of events. In the basic flow we describe the flow that would be followed if the use case were to follow its main plot from start to end. Error states or alternate states that might be highlighted are not included here. This gives any browser of the document a quick view of how the system will work. Here the flow can be documented as a list, a conversation or as a story. (as much as required)</span></p>
  <p class="FieldFormat">
    <textarea name="basicFlow" id="basicFlow" cols="80" rows="4"></textarea>
  </p>
  <p class="FieldFormat">Alternate Flow: <span class="Notes">Give any alternate flows that might occur. May include flows that involve error conditions. Or flows that fall outside of the basic flow.</span></p>
  <p class="FieldFormat">
    <textarea name="alternateFlow" id="alternateFlow" cols="80" rows="3"></textarea>
  </p>
  <p class="FieldFormat">Post Conditions: <span class="Notes">Give any conditions that will be true of the stat of the system after the use cas has been completed</span>.</p>
  <p class="FieldFormat">
    <textarea name="postConditions" id="postConditions" cols="80" rows="3"></textarea>
  </p>
  <p class="FieldFormat">Notes:</p>
  <p class="FieldFormat">
  <textarea name="notes" id="notes" cols="80" rows="3"></textarea>
  </p>
  <p class="FieldFormat">Activity Diagram: <span class="Notes">Diagram to show the flow of events that surrounds the use cas. It might be that text is a more userful way of describing the use case. However often a picture speaks a 100 words.</span></p>
  <p class="FieldFormat">
    <input type="text" name="diagram" id="diagram" />
  </p>
 <input name="submit" type="submit" value="Submit/Review " />
  <input type="hidden" name="MM_insert" value="form1" />
    </form>
</div>
</body>
</html>