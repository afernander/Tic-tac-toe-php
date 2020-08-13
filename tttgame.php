<?php include 'top.php';
    ?>
<?php


$winner='t';
$box = array('','','','','','','','','');
$boxname="box";
if (isset($_POST["submitbtn"])){
    for($i=0;$i<9;$i++){
    $box[$i]=$_POST[$boxname.$i];
    }
    //print_r($box);
    if(($box[0]=='x'&&$box[1]=='x'&&$box[2]=='x')||($box[3]=='x'&&$box[4]=='x'&&$box[5]=='x')||($box[6]=='x'&&$box[7]=='x'&&$box[8]=='x')
    ||($box[0]=='x'&&$box[3]=='x'&&$box[6]=='x')||($box[1]=='x'&&$box[4]=='x'&&$box[7]=='x')||($box[2]=='x'&&$box[5]=='x'&&$box[8]=='x')
    ||($box[0]=='x'&&$box[4]=='x'&&$box[8]=='x')||($box[2]=='x'&&$box[4]=='x'&&$box[6]=='x')){
        $winner='x';
       
        printf('<div id="winlabel"> X wins</div>');
    }
 
    $blank=0;
    for($i=0;$i<9;$i++){
        if($box[$i]==''){
            $blank=1;
        }
    }
    if($blank==1 && $winner =='t'){
        $x=rand() % 8;
        while($box[$x]!= ''){
            $x=rand() % 8;
        }
        $box[$x]='o';
        if(($box[0]=='o'&&$box[1]=='o'&&$box[2]=='o')||($box[3]=='o'&&$box[4]=='o'&&$box[5]=='o')||($box[6]=='o'&&$box[7]=='o'&&$box[8]=='o')
    ||($box[0]=='o'&&$box[1]=='o'&&$box[2]=='o')||($box[1]=='o'&&$box[4]=='o'&&$box[7]=='o')||($box[2]=='o'&&$box[5]=='o'&&$box[8]=='o')
    ||($box[0]=='o'&&$box[4]=='o'&&$box[8]=='o')||($box[2]=='o'&&$box[4]=='o'&&$box[6]=='o')){
        $winner='o';
        printf('<div id="winlabel"> O wins</div>');
    }
    }else if ($winner=='t'){
        $winner='n';
        printf('<div id="winlabel"> Tie game</div>');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tic tac toe - Alejandro Fernandez Restrepo</title>
    <link type="text/css" rel="stylesheet" href="boxes.css">
    <link type="text/css" rel="stylesheet" href="normalize.css">
    
</head>
<body>

    

    <form name"tictactoe" method="post" action="tttgame.php">
    <?php
    
    printf('<div id="block">');
    for($i=0;$i<9;$i++){
        printf('<input type="text" name="box%s" value="%s" id="box">', $i,$box[$i]);
        if($i==2 || $i==5 || $i==8){
            print('<br>');
        }
    }
    print('</div>');
    if($winner=='t'){
    print('<input type="submit" name="submitbtn" value="Go" id="go">');
    }else{
        print('<input type="botton" name="newgambtn" value="Play Again" onclick="window.location.href=\'tttgame.php\'" id="playagain">');
        }
    ?>
    </form>
</body>
</html>