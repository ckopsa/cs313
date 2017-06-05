function login(pEmail, pPassword) {
    $.post("auth.php", {email: pEmail, password: pPassword})
        .done(function( data ) {
            window.location = "events.php";
        });
}

function logout() {
    $.post("logout.php", {})
        .done(function( data ) {
            window.location = "events.php";
        });
}

function createUser(pUsername, pEmail, pLocation, pPassword, pPasswordConfirm, doneFunction) {
    if (pPassword == pPasswordConfirm) {
        $.post("createAccount.php", {username: pUsername, email: pEmail, location: pLocation, password: pPassword})
            .done(function( data ) {
                doneFunction();
            });
    } else {
        alert("Passwords did not match");
    }
}

function createEvent(pTitle, pLocation, pTime, pDate, doneFunction) {
    $.post("createEvent.php", {title: pTitle, location: pLocation, time: pTime, date: pDate})
        .done(function( data ) {
            doneFunction();
        });
}

function updateUser(pUsername, pEmail, pLocation, pPassword, pPasswordConfirm) {
    if (pPassword == pPasswordConfirm) {
        $.post("createAccount.php", {username: pUsername, email: pEmail, location: pLocation, password: pPassword})
            .done(function( data ) {
                alert("Created Account!");
            });
    } else {
        alert("Passwords did not match");
    }
}

function createEnrollment(pEventId) {
    $.post("joinEvent.php", {eventid: pEventId})
        .done(function( data ) {
            location.reload();
        });
}

function deleteEvent(pEventId) {
    $.post("deleteEvent.php", {eventid: pEventId})
        .done(function( data ) {
            window.location = "events.php";
        });
}

function deleteEnrollment(pEventId) {
    $.post("leaveEvent.php", {eventid: pEventId})
        .done(function( data ) {
            location.reload();
        });
}

function deleteUser() {
    if (confirm("Are you sure you want to delete this account?"))
        $.post("deleteAccount.php", {})
        .done(function( data ) {
            logout();
        });
}

function updateEvent(pTitle, pLocation, pTime, pDate) {
    $.post("createEvent.php", {title: pTitle, location: pLocation, time: pTime, date: pDate})
        .done(function( data ) {
            alert("Event Created");
        });
}

function updateEnrollment(pEventId) {
    $.post("joinEvent.php", {eventid: pEventId})
        .done(function( data ) {
            alert("Joined Event!");
            location.reload();
        });
}
