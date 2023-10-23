<!-- Consider table:  Counsellor ( Cid, CName),  Student(Sid, Sname, Cid, sem, class)
Consider a page with one dropdown list for the counsellor’s name that binds with the counsellor table
and one button, namely “View Student”.  Clicking on the button will display all the students under the
selected counsellor. Write a code to implement the above functionality. -->


<!DOCTYPE html>
<html>
<head>
    <title>View Students by Counsellor</title>
</head>
<body>
    <h1>View Students by Counsellor</h1>
    <form action="view_students.php" method="post">
        <label for="counsellor">Select Counsellor:</label>
        <select name="counsellor" id="counsellor">
            <!-- You can populate this dropdown list with options from your database -->
            <option value="1">Counsellor 1</option>
            <option value="2">Counsellor 2</option>
            <!-- Add more options as needed -->
        </select>
        <input type="submit" value="View Students" name="view_students">
    </form>
</body>
</html>
