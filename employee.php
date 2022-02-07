<!DOCTYPE html>
<html>
    <head>
        <title>EMPLOYEE DETAILS</title>
    </head>
    <body>
        <form method="post">
            <table>
                <tr>
                    <td>Employee id</td>
                    <td><input type="text" id="empid" name="empid"></td>
                </tr>
                <tr>
                    <td>Employee Name</td>
                    <td><input type="text" id="empname" name="empname"></td>
                </tr>
                <tr>
                    <td>Job Name</td>
                    <td><input type="text" id="jobname" name="jobname"></td>
                </tr>
                <tr>
                    <td>Manager id</td>
                    <td><input type="text" id="manid" name="manid"></td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td><input type="text" id="salary" name="salary"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"></td>
                </tr>


            </table>
        </form>
    </body>
</html>
    <?php
        if(isset($_POST['submit']))
        {
            $empid=$_POST['empid'];
            $empname=$_POST['empname'];
            $jobname=$_POST['jobname'];
            $manid=$_POST['manid'];
            $salary=$_POST['salary'];
            $conn=mysqli_connect("localhost","root","","registration");
            if(!$conn)
            {
                die("connection failed".mysqli_error());
            }
            $i="INSERT INTO employee(empid,empname,jobname,manid,salary) VALUES('$empid','$empname','$jobname','$manid','$salary')";
            $q=mysqli_query($conn,"$i");
            if(!$q)
            {
                die("Insertion failed".mysqli_error());
            }
            $sql="SELECT empname,salary FROM employee WHERE salary>35000";
            $t=mysqli_query($conn,"$sql");
            if(!$t)
            {
                die("Selection failed".myasqli_error());
            }
            else
            {
                echo"<table>
                <tr>
                <th>EMPLOYEE NAME</th>
                <th>SALARY</th>
                </tr>";
                while($row=mysqli_fetch_assoc($t))
                {
                    echo "<tr><td>".$row['empname']."</td><td>".$row['salary']."</td></tr>";
                echo"</table>";
                }

            }

        }
    ?>

