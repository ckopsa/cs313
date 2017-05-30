function login(pEmail, pPassword) {
    $.post("auth.php", {email: pEmail, password: pPassword})
        .done(function( data ) {
            alert("Logged In!");
        });
}

function createUser(pUsername, pEmail, pLocation, pPassword, pPasswordConfirm) {
    if (pPassword == pPasswordConfirm) {
        $.post("createAccount.php", {username: pUsername, email: pEmail, location: pLocation, password: pPassword})
            .done(function( data ) {
                alert("Created Account!");
            });
    } else {
        alert("Passwords did not match");
    }
}

function createEvent(pTitle, pLocation, pTime, pDate) {
    $.post("createEvent.php", {title: pTitle, location: pLocation, time: pTime, date: pDate})
        .done(function( data ) {
            alert("Event Created");
        });
}

function createEnrollment(pEventId) {
    $.post("joinEvent.php", {eventid: pEventId})
        .done(function( data ) {
            alert("Joined Event!");
            location.reload();
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

function deleteEvent(pEventId) {
    $.post("createEvent.php", {title: pTitle, location: pLocation, time: pTime, date: pDate})
        .done(function( data ) {
            alert("Event Created");
        });
}

function deleteEnrollment(pEnrollmentId) {
    $.post("joinEvent.php", {eventid: pEventId})
        .done(function( data ) {
            alert("Joined Event!");
            location.reload();
        });
}

function deleteUser(pUserId) {
    if (pPassword == pPasswordConfirm) {
        $.post("createAccount.php", {username: pUsername, email: pEmail, location: pLocation, password: pPassword})
            .done(function( data ) {
                alert("Created Account!");
            });
    } else {
        alert("Passwords did not match");
    }
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
