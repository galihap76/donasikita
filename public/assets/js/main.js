let currentLocation = window.location.pathname;
const pathSegments = currentLocation.split("/");
const thirdSegment = pathSegments[3];

// Campaigns/{slug}/donate
if (thirdSegment == "donate") {
    const custom = document.getElementById("custom_amount");
    const radios = document.querySelectorAll("input[name='amount']");

    custom.addEventListener("input", function () {
        radios.forEach((r) => (r.checked = false));
    });

    radios.forEach((radio) => {
        radio.addEventListener("change", function () {
            custom.value = "";
        });
    });
}
