<!-- Consider the GetResult.PHP file, which takes the student enrolment number from the user and one
submit button. Clicking on the button will pass the enrolment number to another page and display the
result on the GetResult page, where the detailed result of the student is fetched in proper tabular format
and resend to the GetResult page. Implement the above functionality with the ajax method.
Consider Table: StudentMaster( EnNo, Name, Sem, Course)
ResultMaster(RID, EnNO, CGPA, SGPA, Status) -->

<!DOCTYPE html>
<html>
<head>
    <title>Get Student Result</title>
</head>
<body>
    <h2>Get Student Result</h2>
    <form>
        <label for="enrollmentNumber">Enter Enrollment Number:</label>
        <input type="text" id="enrollmentNumber" name="enrollmentNumber" required>
        <input type="button" value="Get Result" id="getResultBtn">
    </form>
    <div id="resultTable"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<script>
    $(document).ready(function() {
    $("#getResultBtn").click(function() {
        var enrollmentNumber = $("#enrollmentNumber").val();

        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: { enrollmentNumber: enrollmentNumber },
            success: function(response) {
                $("#resultTable").html(response);
            }
        });
    });
});

</script>