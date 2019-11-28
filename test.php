<?php

require 'conn.php';

$query = "select * from slots";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->store_result();
$result = $stmt->num_rows;
$stmt->bind_result($sid, $vacant);


// echo $result;

?>

<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
    var count = 0;
    var butt2;
    function setColor(mybtn) {
        // var butt = document.getElementById('mybtn');
        // alert(mybtn);
        butt2 = mybtn;
        var butt = document.getElementById(mybtn);
        // alert(window.getComputedStyle(butt, null));

        if (butt.style.color == "rgb(52, 73, 94)") {
            
            butt.style.color = "#C06C84";
            butt.style.backgroundColor = "#ffffff00";
            butt.style.borderColor = "#C06C84";
            count--;        
        }
        else if(butt.style.color == "rgb(192, 108, 132)"){
        // alert(butt);  
        // alert(butt.style.color);
            count++;

            butt.setAttribute("hidden", "true");
            butt.style.color = "#34495e";
            butt.style.borderColor = "#34495e";
            butt.style.backgroundColor = "#34495e";
            butt.style.boxShadow = "0px 0px 10px #34495e";

        }
        // alert(count);
        if(count>1){
          document.getElementById('sbtn').disabled = true;
        }
        else{
          document.getElementById('sbtn').disabled = false;
        }
        document.getElementById('txt').innerHTML = butt2;
    }

    // function sendid(){
    //     // alert(butt2);
    //     window.location.href = "login.php?id="+butt2;

    // }

  </script>
  <?php
    if(isset($_POST['sbtn'])){
      if(isset($_POST['btn0'])){
        echo "HI";

      }
    // echo "<script>document.writeln(butt2)</script>";
  }
                    ?>
  <style type="text/css">
    :root{
      --color:#C06C84;
    }

    .btn {
  display: inline-flex;
  align-items: center;
  background: transparent;
  border: 4px solid;
  /*border-color: #C06C84;*/
  box-shadow: 0 3px 2px 0 rgba(0,0,0,0.1);
  border-radius: 5px;
  height: 45px;
  padding: 0 30px;
  color: #fff;
  font-family: Lato, Arial, sans-serif;
  text-transform: uppercase;
  text-decoration: none;
  transition: background .3s, transform .3s, box-shadow .3s;
   will-change: transform;
   transition: all 0.3s ease-in-out;
   -webkit-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
}  
  .btn:hover {
    /*background: darken(#C06C84,10%);*/
    box-shadow: 0px 0px 10px var(--color);
    transform: translate3d(0, -2px, 0);
  }
  .btn:active {
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.1);
    transform: translate3d(0, 1px, 0);
  }


.pulse {
  position: relative;
  
  &:before, &:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,.4);
    border-radius: 50%;
    width: 20px;
    height: 20px;
    opacity: 0;
    margin: auto;
  }

  &:hover:before, &:hover:after {
    display: none;
  }
}


body {
  /*display:flex;*/
  /*align-items: center;*/
  /*justify-content: center;*/
  background: #272822;
}
</style>
  <title></title>
</head>
<body>
  <div id="container">
  <!-- <button id = "btn" class="btn" onclick="setColor()"></button> -->
                  <!-- <div> -->
                    <form method="post" id="xx">
                      <p id = "txt" name="butt" hiddden = "true"></p>
                    <!-- <button id = "mybtn" class="btn" onclick="setColor()"></button> --> 
                 <script type="text/javascript">
                  var n = <?php echo $result; ?>;
                  var z = document.getElementById(container);
                  // alert();
                  <?php
                    while($stmt->fetch()){


                  ?>
                  
                    var vac = <?php echo $vacant; ?>;
                    var i = <?php echo $sid; ?>;
                    var mybtn = document.createElement("BUTTON");
                    mybtn.setAttribute("id","btn"+i);
                    mybtn.setAttribute("name","btn"+i);
                    mybtn.setAttribute("class","btn");
                    mybtn.setAttribute("onclick","setColor(id)");
                    if(vac == 1){
                      mybtn.style.color = "#C06C84";

                    }else{
                      mybtn.style.color = "#34495e";                      
                    }
                    // ("borderColor","red");
                    document.getElementById(xx).appendChild(mybtn);
                  
                <?php }?>
                  // var count = 0;
                </script>
                    <input type = "submit" name="sbtn" id ="sbtn" value = "Submit">                    
                    </form>

                  <!-- </div> -->
</div>
</body>
</html>