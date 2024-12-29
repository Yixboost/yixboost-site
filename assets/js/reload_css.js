function reloadCSS() {
    const links = [
        "assets/font-awesome-6-pro-main/css/all.css",
        "assets/css/templatemo-cyborg-gaming.css",
        "assets/css/owl.css",
        "assets/css/animate.css",
        "assets/cdn/swiper/swiper-bundle.min.css"
    ];

    links.forEach(function (link) {
        const newLink = document.createElement("link");
        newLink.rel = "stylesheet";
        newLink.href = link + "?v=" + new Date().getTime();
        document.head.appendChild(newLink);
    });

    const styleTags = document.querySelectorAll("style");
    styleTags.forEach(function (styleTag) {
        const newStyle = document.createElement("style");
        newStyle.innerHTML = styleTag.innerHTML;
        document.head.appendChild(newStyle);
        styleTag.remove();
    });
}

window.onload = reloadCSS;
