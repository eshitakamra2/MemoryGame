<<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leader Board </title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php



echo $_COOKIE["username"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memory_game";


$myfile = fopen("hack.txt", "r+") or die("Unable to open file!");
//echo fread($myfile,filesize("hack.txt"));
$n1= fread($myfile,filesize("hack.txt"));

$arr=explode(" ",$n1);
echo $arr[0];
echo $arr[1];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userdetails 
VALUES ('$arr[0]', '$arr[1]' )";;  
if ($conn->query($sql) === TRUE) {   
  echo json_encode(array('success' => 1));
} else{ 
   echo json_encode(array('success' => 0));
}

$sqlread = "SELECT * FROM userdetails ORDER BY score DESC ";
$result = $conn->query($sqlread);

fclose($myfile);
// $myfile = fopen("hack.txt", "w") or die("Unable to open file!");
// fclose($myfile);
   // LOOP TILL END OF DATA
               
           
    ?>
   
<b>
    <div class="wrapper">
        <div class="lboard_section">
            <div class="lboard_tabs">
                <div class="tabs">
                    <ul>
                        <li class="active" data-li="today">Leaderboard</li>
                    </ul>
                </div>
            </div>
    
            <div class="lboard_wrap">
                <div class="lboard_item today" style="display: block;">
                <?php
                $counter=0;
                 while($rows=$result->fetch_assoc())
                 {
                    if($counter==7){
                        break;
                    }
                     ?>
                    <div class="lboard_mem">
                        
                        <div class="name_bar">
                            <p><span><?php echo $counter+1;?>.</span><?php echo $rows['name'];?></p>
                            <!-- <div class="bar_wrap">
                                <div class="inner_bar" style="width: 80%"></div>
                            </div> -->
                        </div>
                        <div class="points">
                        <?php echo $rows['score'];?>
                        
                        </div>
                         
                 
                    </div>
                    <?php 
                     $counter++;
                }
                   ?>
                   
                   
                </div>
               
</b>
<script src="scripts.js"></script>
</body>
</html>