<?php


print("<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <table border ='1'>
            <tr>
                <td>");






$A=[
    [1,2,3,'A'],
    [1,2,'B','C'],
    [1,'D','E','F']
];


//print("Array All Elements:<br>");

for($i=0;$i<3;$i++)  //row
{
    for($j=0;$j<4;$j++)  //col
    {

        print($A[$i][$j]);
     }
   
    print("<br>");


}

print("</td>");


print("<td>");

$n=3;
for($row=$n;$row>=1;$row--)
{
    for($col=1;$col<=$row;$col++)
       {

        print($col);
      

       }
  
    print("<br>");

}
print("</td>");

print("<td>");


$count='A';

for($row='A';$row<='F';$row++)
{
    for($col='A';$col<=$row;$col++)
       {

        print($count);
        $count++;
        if($count=='G')
        {
            return 0;
        }

       }

  
    print("<br>");
   

}

print("</td>")
  


?>