<?php
// Start the session so we can store the student name in a session variable
session_start();

// Only process when the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Read the form data
    $fullName       = isset($_POST["fullName"])       ? trim($_POST["fullName"])       : "";
    $studentNumber  = isset($_POST["studentNumber"])  ? trim($_POST["studentNumber"])  : "";
    $email          = isset($_POST["email"])          ? trim($_POST["email"])          : "";
    $eventName      = isset($_POST["eventName"])      ? trim($_POST["eventName"])      : "";
    $attendanceType = isset($_POST["attendanceType"]) ? trim($_POST["attendanceType"]) : "";
    $guests         = isset($_POST["guests"])         ? trim($_POST["guests"])         : "";
    $notes          = isset($_POST["notes"])          ? trim($_POST["notes"])          : "";

    // Store the student name in a session variable
    $_SESSION["studentName"] = $fullName;
} else {
    // If accessed directly without submitting, send the user back to the form
    header("Location: index.html");
    exit();
}

// Helper to safely output user data
function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Welcome <?php echo e($_SESSION["studentName"]); ?>!</h1>
        <p style="text-align:center; color:#2e7d32; font-weight:600; margin-bottom:20px;">
            Your registration has been successfully completed.
        </p>

        <h2 style="color:#333; border-bottom:2px solid #6a82fb; padding-bottom:8px;">
            Registration Information
        </h2>

        <ul style="list-style:none; line-height:2; color:#444; margin-top:15px;">
            <li><strong>Full Name:</strong> <?php echo e($fullName); ?></li>
            <li><strong>Student Number:</strong> <?php echo e($studentNumber); ?></li>
            <li><strong>Email:</strong> <?php echo e($email); ?></li>
            <li><strong>Event:</strong> <?php echo e($eventName); ?></li>
            <li><strong>Attendance Type:</strong> <?php echo e($attendanceType); ?></li>
            <li><strong>Number of Guests:</strong> <?php echo e($guests); ?></li>
            <li><strong>Additional Notes:</strong> <?php echo e($notes !== "" ? $notes : "-"); ?></li>
        </ul>

        <p style="margin-top:25px; text-align:center;">
            <a href="index.html" style="color:#6a82fb; text-decoration:none; font-weight:600;">
                &larr; Back to Registration Form
            </a>
        </p>
    </div>
</body>
</html>
