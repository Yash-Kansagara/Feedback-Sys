
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
       
        <div id="side">
            <img src="logo_gardi.jpg" />
            <br>
            <img src="logo_im.png" />
        </div>
        <div id="center">
            
            <div id="wraper">
                <h1 align="center">Feedback form</h1>
            <hr><br>
                <form name="myForm" action="index.php" method="POST">
                    <font color="red" size="2">
   <!------------------------------------------------------------------->
   <?php
    
    if(!isset($_POST["fname"]) && !isset($_POST["lname"]) && !isset($_POST["enrol"]) && !isset($_POST["college"]) && !isset($_POST["event"]) ){
    }else{
    if($_POST["fname"]=="" || $_POST["lname"]=="" || $_POST["enrol"]=="" || $_POST["college"]=="" || $_POST["event"]==""){
                
        echo 'please fill all fields<br>';
    }  else {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $enrol = $_POST["enrol"];
        $col = $_POST["college"];
        $event = $_POST["event"];
        $tm = $_POST["TM"];
        $sa = $_POST["SA"];
        $co = $_POST["CO"];
        if($_POST["other"]!=""){$other=$_POST["other"];}
        if($_POST["expect"]!=""){$expect=$_POST["expect"];}
        
        include 'db_connect.php';
        
        $query = "SELECT * FROM `feed` where `enrol`='$enrol' and `event`='$event'";
        mysqli_real_escape_string($link, $query);
        $res=mysqli_query($link, $query);
        if(mysqli_num_rows($res)==1){
            echo '<font color="#339933">You have already given feedback of this event</font>';
        }else{
            $query = "INSERT INTO `feed` (`fname`, `lname`, `enrol`, `college`, `event`, `tm`, `sa`, `co`, `expect`, `other`) VALUES ('$fname', '$lname', '$enrol', '$col', '$event', '$tm', '$sa', '$co', '$expect', '$other')";
            if(mysqli_query($link, $query)){
                header("Location: http://localhost/database/thanks.php?name=$fname");
            }else{
                echo 'there was an error please try again !';
            }
        }
      
        
    }
}
?>
                    </font><br>
                    <label>First Name:</label><br>
                    <input type="text" name="fname" size="50" onblur="validateForm('fname')"><br><br>
                    <label>Last Name:</label><br>
                    <input type="text" name="lname" size="50"><br><br>
                    <label>Enrollment:</label><br>
                    <input type="text" name="enrol" size="50"><br><br>
                    <label>College:</label><br>
                    <input type="text" name="college" size="50"><br><br>
                    <label>Event:</label><br>
                    <select name="event">
                        <option value="null">Select one...</option>
                        <option value="coding">Hackathon(24hr coding)</option>
                        <option value="wireless">NiStantrl jAlaka(wireless networking)</option>
                        <option value="web">Web nirlkSana(web Searching)</option>
                        <option value="quiz">PraznamaJca(Quiz competition C/C++)</option>
                        <option value="game">Lan Durodara(LAN Gaming)</option>
                        <option value="c">Tantrash Kaushalya in C(Coding proficiency in C)</option>
                        <option value="project">Prakalpa(Project Competition)</option>
                    </select><br><br>
                    <table width="100%" style="text-align: center" >
                        <tr>
                            <td></td>
                            <td>Excellent</td>
                            <td>Very Good</td>
                            <td>Good</td>
                            <td>Need to improve</td>
                        </tr>
                        <tr>
                            <td>Time Management</td>
                            <td><input type="radio" name="TM" value="4"><input type="hidden" name="TM" value="" checked="true"></td>
                            <td><input type="radio" name="TM" value="3"></td>
                            <td><input type="radio" name="TM" value="2"></td>
                            <td><input type="radio" name="TM" value="1"></td>
                        </tr>
                        <tr>
                            <td>Sitting Arrangement</td>
                            <td><input type="radio" name="SA" value="4"><input type="hidden" name="SA" value="" checked="true"></td>
                            <td><input type="radio" name="SA" value="3"></td>
                            <td><input type="radio" name="SA" value="2"></td>
                            <td><input type="radio" name="SA" value="1"></td>
                        </tr>
                        <tr>
                            <td>Co-ordinators</td>
                            <td><input type="radio" name="CO" value="4"><input type="hidden" name="CO" value="" checked="true"></td>
                            <td><input type="radio" name="CO" value="3"></td>
                            <td><input type="radio" name="CO" value="2"></td>
                            <td><input type="radio" name="CO" value="1"></td>
                        </tr>
                    </table>
                    <br>
                    <label>What do you expect from Immaculate<sup>14</sup>?</label><br>
                    <textarea cols="76" rows="4" name="expect"></textarea><br><br>
                    <label>Any other things you want to share with us?</label><br>
                    <textarea cols="76" rows="4" name="other"></textarea><br><br>
                    <input type="submit" value="Submit" id="submit">
                </form>
            </div>
        </div>
        <div id="bottom"></div>
    </body>
</html>