function setToken(token) {
    localStorage.setItem("jwt-token", token);
}

function getToken() {
    return localStorage.getItem("jwt-token");
}

function unsetToken() {
    setToken(undefined);
}

function submitApi(methodType, url, data, alert) {
    // alert - all, success, fail

    var return_val = "";

    $.ajax({
        async: false,
        type: methodType,
        url: url,
        data: data,
        success: function (result) {
            if (alert == "all" || alert == "success") {
                Swal.fire({
                    title: "Success!",
                    text: "You have success",
                    icon: "success",
                    confirmButtonText: "Ok",
                });
            }
            return_val = result;
        },
        error: function (result) {
            if (alert == "all" || alert == "fail") {
                Swal.fire({
                    title: "Error!",
                    text: "You have error",
                    icon: "error",
                    confirmButtonText: "Ok",
                });
            }
            return_val = result;
        },
    });

    return return_val;
}

function loginAuth(url, data) {
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (result) {
            setToken(result.token);
            location.reload();
        },
        error: function (result) {
            Swal.fire({
                title: "Error!",
                text: "The username or password is incorrect.",
                icon: "error",
                confirmButtonText: "Try Again",
            });
        },
    });
}

function logoutAuth(url, data) {
    var data = {
        token: getToken(),
    };

    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (result) {
            unsetToken();
            location.reload();
        },
        error: function (result) {
            Swal.fire({
                title: "Error!",
                text: "The username or password is incorrect.",
                icon: "error",
                confirmButtonText: "Try Again",
            });
        },
    });
}

function checkAuthToken(url) {
    var data = {
        token: getToken(),
    };

    var isAuthenticated = false;

    $.ajax({
        async: false,
        type: "POST",
        url: url,
        data: data,
        success: function (result) {
            isAuthenticated = result.success;
            if (result.success == false) {
                unsetToken();
            }
        },
        error: function (result) {
            isAuthenticated = false;
        },
    });

    return isAuthenticated;
}
