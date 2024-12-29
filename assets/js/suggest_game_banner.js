function closeBanner() {
    document.getElementById('banner-suggest-game').style.display = 'none';
    localStorage.setItem('bannerClosedAt', new Date().getTime());
}

function shouldShowBanner() {
    const bannerClosedAt = localStorage.getItem('bannerClosedAt');
    const fiveMinutes = 5 * 60 * 1000; // 5 minutes in milliseconds

    if (!bannerClosedAt || (new Date().getTime() - bannerClosedAt) > fiveMinutes) {
        document.getElementById('banner-suggest-game').style.display = 'flex';
    } else {
        document.getElementById('banner-suggest-game').style.display = 'none';
    }
}

window.onload = shouldShowBanner;