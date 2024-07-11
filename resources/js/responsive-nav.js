document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll(".login-buttons");
    const x = window.matchMedia("(max-width:767px)");
    const navBar = document.querySelector("#nav-bar");
    const navButtons = document.querySelector("#nav-buttons");

    if(navBar) {
    function responsiveNavBar() {
        if (x.matches) {
            navBar.classList.remove("hidden");
            navButtons.classList.add("hidden", "absolute", "top-10", "-start-20", "whitespace-nowrap", "bg-white", "shadow-lg", "rounded-md", "border");
            navButtons.classList.remove("flex");

            elements.forEach(element => {
                element.classList.add("block", "w-full", "my-1");
                element.classList.remove("border-black", "border", "rounded-full");
            });
        } else {
            navBar.classList.add("hidden");
            navButtons.classList.remove("hidden", "absolute", "top-10", "-start-14", "whitespace-nowrap", "bg-white", "shadow-lg", "rounded-md", "border");
            navButtons.classList.add("flex");

            elements.forEach(element => {
                element.classList.remove("block", "w-full", "my-1");
                element.classList.add("border-black", "border", "rounded-full");
            });
        }
    }

    function hideNavButtonsOnClickOutside(event) {
        if (!navButtons.contains(event.target) && !navButtons.classList.contains("hidden") && !navBar.classList.contains("hidden")) {
            navButtons.classList.add("hidden");
        }
    }

    responsiveNavBar();
    x.addEventListener("change", responsiveNavBar);

    navBar.addEventListener("click", (event) => {
        event.stopPropagation();
        navButtons.classList.toggle("hidden");
    });

    document.addEventListener("click", hideNavButtonsOnClickOutside);
}
});