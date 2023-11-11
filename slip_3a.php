<html>
        <body bgcolor=pink >
            <form action="#" method= "GET" >
            Enter first number :  <input type=text name=a ><br><br>
            Enter second number:  <input type=text name=b ><br>
               <br>                                                                                                              
        Operation::
                <br>
                <input type=radio name=c value=1>Addition.<br>
                <input type=radio name=c value=2>Subtraction.<br>
                <input type=radio name=c value=3>Multiplication.<br>
                <input type=radio name=c value=4>Division.<br><br>
        <input type=submit value=ok>    <input type=reset value=clear>
        	</form>
        </body>

<?php
$n1 = $_GET['a'];
$n2 = $_GET['b'];
$ch = $_GET['c'];

        if($ch==1)
        {
            $c = $n1 + $n2;
            echo"Addition is: $c"; 
        }
        else if($ch==2)
        {
            $c = $n1 - $n2; 
            echo"Subtraction is: $c";
        }
        else if($ch==3)
        {
            $c = $n1 * $n2; 
            echo"Multiplication is: $c";
        }
        else if($ch==4)
        {
            $c = $n1 / $n2; 
            echo"Division is: $c";
        
        }
?>
 </html>
