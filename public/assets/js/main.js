let currentLocation = window.location.pathname;
const pathSegments = currentLocation.split("/");
const firstSegment = pathSegments[1];
const secondSegment = pathSegments[2];
const thirdSegment = pathSegments[3];

// Buat lihat password pada CRUD kasir dan informasi akun
if (
    (firstSegment == "cashiers" && secondSegment == "create") ||
    (firstSegment == "cashiers" && thirdSegment == "edit") ||
    firstSegment == "account"
) {
    let password = document.getElementById("password");
    let password_confirmation = document.getElementById(
        "password_confirmation"
    );
    let togglePassword = document.querySelector("#toggle-password");

    togglePassword.addEventListener("click", function () {
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }

        // Buat cek kalau saat ini berada di akun profil
        if (firstSegment == "account" && password_confirmation) {
            if (password_confirmation.type === "password") {
                password_confirmation.type = "text";
            } else {
                password_confirmation.type = "password";
            }
        }
    });
}
