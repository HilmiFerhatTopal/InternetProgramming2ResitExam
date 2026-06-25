function validateForm() {
    // Read the form values
    var fullName = document.getElementById("fullName").value.trim();
    var studentNumber = document.getElementById("studentNumber").value.trim();
    var email = document.getElementById("email").value.trim();
    var eventName = document.getElementById("eventName").value.trim();
    var attendanceType = document.getElementById("attendanceType").value;
    var guests = document.getElementById("guests").value.trim();

    // Rule 1: No required field can be empty
    if (fullName === "" || studentNumber === "" || email === "" ||
        eventName === "" || guests === "") {
        alert("Please fill in all required fields.");
        return false;
    }

    // Rule 2: Student Number must contain only digits
    if (!/^\d+$/.test(studentNumber)) {
        alert("Student Number must contain only digits.");
        return false;
    }

    // Rule 3: Email must contain "@"
    if (email.indexOf("@") === -1) {
        alert("Email must contain '@'.");
        return false;
    }

    // Rule 5: Attendance Type must be selected
    if (attendanceType === "") {
        alert("Please select an Attendance Type.");
        return false;
    }

    // Rule 4: Number of Guests must be between 0 and 5
    var guestCount = Number(guests);
    if (isNaN(guestCount) || guestCount < 0 || guestCount > 5) {
        alert("Number of Guests must be between 0 and 5.");
        return false;
    }

    // All checks passed -> allow submission
    return true;
}
