let form = document.getElementsByTagName("form")[0];
let btnSubmit = document.querySelector(".btn-submit");
let btnLoadingSubmit = document.querySelector(".btn-loading-submit");
const passwordGroups = document.querySelectorAll(".position-relative");

if (form) {
    form.addEventListener("submit", function () {
        btnSubmit.classList.add("d-none");
        btnLoadingSubmit.classList.toggle("d-none");
    });
}

passwordGroups.forEach((group) => {
    const passwordField = group.querySelector(
        "input[type='password'], input[type='text']"
    );
    const eyeSlash = group.querySelector(".bi-eye-slash-fill");
    const eye = group.querySelector(".bi-eye-fill");

    eyeSlash.addEventListener("click", function () {
        passwordField.type = "text";

        eyeSlash.style.display = "none";
        eye.style.display = "block";
    });

    eye.addEventListener("click", function () {
        passwordField.type = "password";

        eye.style.display = "none";
        eyeSlash.style.display = "block";
    });
});
