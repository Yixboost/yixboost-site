let isFullscreen = false;

// Function to toggle fullscreen mode
function toggleFullscreen() {
    const banner = document.getElementById('banner1');
    if (isFullscreen) {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { // Safari
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) { // Firefox
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) { // IE/Edge
            document.msExitFullscreen();
        }
        banner.classList.remove('fullscreen');
    } else {
        if (banner.requestFullscreen) {
            banner.requestFullscreen();
        } else if (banner.webkitRequestFullscreen) { // Safari
            banner.webkitRequestFullscreen();
        } else if (banner.mozRequestFullScreen) { // Firefox
            banner.mozRequestFullScreen();
        } else if (banner.msRequestFullscreen) { // IE/Edge
            banner.msRequestFullscreen();
        }
        banner.classList.add('fullscreen');
    }
    isFullscreen = !isFullscreen;
}

// Add event listener for fullscreen toggle
document.addEventListener('keydown', function(event) {
    if (event.shiftKey && event.key === 'J') {
        toggleFullscreen();
    }
});