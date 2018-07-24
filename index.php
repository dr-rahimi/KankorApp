<?php //database connection
$connection=mysqli_connect("localhost","root","secret","kankor_app");
if (mysqli_connect_errno()) {
    die("Database connection failed :".mysqli_connect_error()." (".mysqli_connect_errno().")");
}
mysqli_query($connection,"SET CHARACTER SET utf8");
$query="SELECT * FROM questions";
$result =mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
?>
<?php //create an array in php from database table and free up the memory
$php_questions=array();
$i=0;
while ($questions=mysqli_fetch_assoc($result)) {
    $php_questions[$i]=array(
        "id" => $questions["id"],
        "question" => $questions["question"],
        "a" => $questions["a"],
        "b" => $questions["b"],
        "c" => $questions["c"],
        "d" => $questions["d"],
        "answer" => $questions["answer"]);
    $i++;
}
mysqli_free_result($result);
?>
<?php //receive the data from post
function redirect_to($new_location){
    header("Location: ".$new_location);
    exit;
}
$php_answers=array();
if(isset($_POST['submit'])){
    for($i =0; $i<count($php_questions);$i++){
        $php_answers[$i]=array(
                "id" => $php_questions[$i]["id"],
                "answer" => $_POST["question".$i]
        );
    }
    $score=0;
    for($i=0 ; $i<count($php_questions) ; $i++){
        if ($php_answers[$i]["answer"]==$php_questions[$i]["answer"]){
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kankor App</title>
    <link rel="stylesheet" href="kankor_styles.css">
</head>
<body dir="rtl">
<script>
    var jsQuestions = [[],[],[],[],[],[],[]];
    var totalQuestions;
    <?php
    for($i = 0; $i<count($php_questions);$i++){
        echo "jsQuestions[".$i."][0]=".$php_questions[$i]["id"].";";
        echo "jsQuestions[".$i."][1]='".$php_questions[$i]["question"]."';";
        echo "jsQuestions[".$i."][2]='".$php_questions[$i]["a"]."';";
        echo "jsQuestions[".$i."][3]='".$php_questions[$i]["b"]."';";
        echo "jsQuestions[".$i."][4]='".$php_questions[$i]["c"]."';";
        echo "jsQuestions[".$i."][5]='".$php_questions[$i]["d"]."';";
        echo "jsQuestions[".$i."][6]=".$php_questions[$i]["answer"].";";
    }
    echo "totalQuestions = ".count($php_questions);
    ?>
</script>
<form action="index.php" method="post">
    <table id="tbl_question" width="100%"></table>
    <input type="submit" name="submit" value="Submit" id="submit"/>
    <script>
        var tblQuestion=document.getElementById("tbl_question");
        for (i=0 ; i < totalQuestions ; i++){
            var questionNumber=jsQuestions[i][0]+1;
            tblQuestion.innerHTML+=
                "<tr><td> "+questionNumber+". "+jsQuestions[i][1]+"</tr></td>"+
                "<tr><td><label><input type='radio' name='question"+i+"' value='1' /> الف. "+jsQuestions[i][2]+"</label></tr></td>"+
                "<tr><td><label><input type='radio' name='question"+i+"' value='2' /> ب. "+jsQuestions[i][3]+"</label></tr></td>"+
                "<tr><td><label><input type='radio' name='question"+i+"' value='3' /> ج. "+jsQuestions[i][4]+"</label></tr></td>"+
                "<tr><td><label><input type='radio' name='question"+i+"' value='4' /> د. "+jsQuestions[i][5]+"</label></tr></td>";
        }
    </script>
</form>
<h1>
    <?php
    if($php_answers){
        $message="نمره شما ".$score." از ".count($php_questions)." است.";
        echo $message;
    }
    ?>
</h1>
</body>
</html>
<?php //close the connection;
	mysqli_close($connection);
?>