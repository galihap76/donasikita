const navLinks = document.querySelectorAll(".nav-link");
const menuToggle = document.getElementById("navbarSupportedContent");
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
let formAddMessage = document.querySelector(".form-add-message");
let btnSubmit = document.querySelector(".btn-submit");
let btnSubmitLoading = document.querySelector(".btn-submit-loading");

let arr = [
    "Platform Donasi Online.",
    "Berbagi Kebaikan Lebih Mudah.",
    "Donasi Aman dan Transparan.",
];

let running = document.querySelector("#running");
let showDelay = 80; // Delay muncul dalam milidetik
let removeDelay = 100; // Delay menghilang dalam milidetik
let currentIndex = 0;
let indexCharacter = 0;

AOS.init({
    once: true,
});

gsap.from(".hero-section", { duration: 1, y: -100, opacity: 0 });
gsap.from(".nav-donation", { duration: 1, y: -100, opacity: 0 });

let owl = $(".owl-carousel");
owl.owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 1500,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
            nav: true,
        },
    },
});

$(".bi-chevron-left").on("click", function () {
    owl.trigger("prev.owl.carousel");
});

$(".bi-chevron-right").on("click", function () {
    owl.trigger("next.owl.carousel");
});

navLinks.forEach((link) => {
    link.addEventListener("click", () => {
        // Jika menggunakan Bootstrap 5
        const bsCollapse = new bootstrap.Collapse(menuToggle, {
            toggle: false,
        });
        bsCollapse.hide(); // Tutup navbar
    });
});

formAddMessage.addEventListener("submit", function (e) {
    e.preventDefault();

    btnSubmit.classList.toggle("d-none");
    btnSubmitLoading.classList.toggle("d-none");

    let name = document.querySelector("#name");
    let email = document.querySelector("#email");
    let category = document.querySelector("#category");
    let message = document.querySelector("#message");

    fetch("/add-message", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },

        body: JSON.stringify({
            name: name.value,
            email: email.value,
            category: category.value,
            message: message.value,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            // Cek kalau data pesan berhasil dikirim
            if (data.success) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });
                Toast.fire({
                    icon: "success",
                    title: data.message,
                });

                formAddMessage.reset();
                btnSubmitLoading.classList.toggle("d-none");
                btnSubmit.classList.toggle("d-none");

                // Kalau gagal
            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });
                Toast.fire({
                    icon: "error",
                    title: data.message,
                });

                btnSubmitLoading.classList.toggle("d-none");
                btnSubmit.classList.toggle("d-none");
            }
        })
        .catch((error) => console.error("Error:", error));
});

function runningText() {
    if (indexCharacter < arr[currentIndex].length) {
        running.innerHTML += arr[currentIndex].charAt(indexCharacter);
        indexCharacter++;
        setTimeout(runningText, showDelay);
    } else {
        if (arr[currentIndex] == arr[0]) {
            setTimeout(removeText, 300);
        }
        if (arr[currentIndex] == arr[1]) {
            setTimeout(removeText, 300);
        }

        if (arr[currentIndex] == arr[2]) {
            setTimeout(removeText, 300);
        }
    }
}

function removeText() {
    if (indexCharacter >= 0) {
        let teks = arr[currentIndex].substring(0, indexCharacter);
        running.innerHTML = teks;
        indexCharacter--;
        setTimeout(removeText, 50);
    } else {
        currentIndex = (currentIndex + 1) % arr.length;
        setTimeout(runningText, showDelay);
    }
}

runningText();
