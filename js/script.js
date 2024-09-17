const drawableBusInfo = document.getElementById("drawable-bus-info");
let touchStartY = 0;
let touchEndY = 0;

try {
    drawableBusInfo.addEventListener("touchstart", (e) => {
        touchStartY = e.touches[0].clientY;
    });
    drawableBusInfo.addEventListener('touchend', (event) => {
        touchEndY = event.changedTouches[0].clientY;
        handleSwipe();
    });
    function handleSwipe() {
        const swipeDistance = touchStartY - touchEndY;
    
        if (swipeDistance > 10) {
            drawableBusInfo.style.bottom = "65px";
        } else if (swipeDistance < -10) {
            drawableBusInfo.style.bottom = "20px";
        }
    }
}
catch {}

const sideNav = document.getElementById("side-navigation");

function toggleSideNav() {
    if(sideNav.style.left == "0px") {
        sideNav.style.left="-75vw";
    }
    else {
        sideNav.style.left="0px";
    }
}

function toggleOverlay(x) {
    const overlay = document.getElementsByClassName("overlay")[x];
    if(overlay.style.display == "flex") {
        overlay.style.display = "none";
    }
    else {
        overlay.style.display = "flex";
    }
}