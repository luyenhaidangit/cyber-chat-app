document
    .getElementById("password-addon")
    .addEventListener("click", function () {
        var e = document.getElementById("password-input");
        "password" === e.type ? (e.type = "text") : (e.type = "password");
    });

document
    .getElementById("password-addon-1")
    .addEventListener("click", function () {
        var e = document.getElementById("password-input-1");
        "password" === e.type ? (e.type = "text") : (e.type = "password");
    });
