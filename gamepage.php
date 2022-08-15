<html>
<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,700" rel="stylesheet">
<div class="content">
<pre id='pre'>
-----------------------------------------------------

  ██╗        ██╗    ██╗  
 ██╔╝       ██╔╝    ╚██╗ 
██╔╝       ██╔╝      ╚██╗
╚██╗      ██╔╝       ██╔╝
 ╚██╗    ██╔╝       ██╔╝ 
  ╚═╝    ╚═╝        ╚═╝  
                          
Greetings developers, Shall we play a game?

Re-type the number you see below. Ez right?

-----------------------------------------------------

</pre>	
	
   <div class="main center">
        <div class="box center">
            <h3 id="nameField"></h3>
           <h3>--------------------</h3>
                     
            <p id="numberField">
                12345
            </p>
            <h3>--------------------</h3>
          
            <form action="" class="center" id="gameform">
               <p id="levelField">Level :1</p>


                <input type="number" id="num" >
                <button type="button" class="btn" id="btn">Submit</button>
                <h1 id="result">
                 
            </h1>
               
            <script >
        const form=document.getElementById('gameform');
        var textfield=document.getElementById('numberField');
        var textinputfield=form.elements['num'];
        var textinputbutton=form.elements['btn'];
        textinputbutton.onclick=checkResult;
        var username= sessionStorage.getItem("username");       
        document.getElementById("nameField").innerHTML=username;
        var possible = "123456789012345678901234567890";
        var given_input='348813';
        var current_level=5
        var output;
        
        //initialise level
        document.getElementById("levelField").innerHTML =
    "Current level: " + (current_level-4);   
    generateNumber(current_level);
   
   //function to generate number and display it
    function generateNumber(level){
     textinputfield.disabled=true;
     document.getElementById("levelField").innerHTML =
   "Current level: " + (level-4);   
   	questionText='';
    for (var i = 0; i < level; i++)
    questionText += possible.charAt(Math.floor(Math.random() * 5)); 
    textfield.innerHTML =
    "Memorise: " +questionText;
    const myTimeout=setTimeout(clearAfterTimeOut, 3000);    
    }  
    //function for timeout
    function clearAfterTimeOut(){
     textfield.innerHTML =
    "Memorise: ";
      textinputfield.disabled=false;
    }
    //function for checking result and proceeding to next question
    function checkResult(){    
    given_input=textinputfield.value;
        if(given_input==questionText){
        output='Number matched';
        current_level++;
        generateNumber(current_level);
        textinputfield.value='';
    }
   //implement properly
    else{
    textinputfield.value='';
        output='Number not matched';
        document.getElementById("result").innerHTML =
    "Game Over!";   
   //window.location.href ='leaderboard.php'; 
   window.location.href ='leaderboard.php'; 
   //ajax post  
        var curscore=current_level-4;
        var username= sessionStorage.getItem("username");
//         var newfile = new ActiveXObject("Scripting.FileSystemObject");

// var editFile = newfile.OpenTextFile("hack.txt",1, true, 0);
// editFile.WriteLine("Add sample text to the file...");

// editFile.Close();
$(document).ready(function () {
    createCookie("username", username, "10");
 
});
   
// Function to create the cookie

        }   
        }  
   //over
   function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}
   
   
    </script>
        </div>
            </form>
            <form action="" class="center" id="gameform" method="GET">
    <?php
    //$myfile = fopen("hack.txt", "w") or die("Unable to open file!");
    //fwrite($myfile, "siris");
    //fwrite($myfile, $a);

    ?>
    </div>
    
    </div>
   
	</div>
   
    </html>