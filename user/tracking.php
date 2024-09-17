<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <header>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    </header>
    <style>
    </style>
    <body>
        <div class="background-panel absolute bg-color-2" style="background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 50%); z-index: 1;"></div>
        <div class="background-panel absolute" id="map" style="top: 32px"></div>
        <?php include("./genericNavigation.php") ?>
        <div class="container relative">
            <div class="flex space-between gap-8 px-8 py-8 my-16 br-8 bs-8 bg-color-2">
                <div class="flex flex-column align-center justify-start" style="padding-top: 4px;">
                    <img src="./../res/icons/point-hollow-ellipse.svg" alt="" width="12px">
                    <div class="bg-color-1" style="width: 1px; height: 42px;"></div>
                    <img src="./../res/icons/point-hollow-ellipse.svg" alt="" width="12px">
                </div>
                <div class="flex flex-column gap-4 w100-percent">
                    <div>
                        <div class="font-14">From</div>
                        <div class="">
                            <div class="flex align-center">
                                <input class="w100-percent font-16" type="text" placeholder="Type to search">
                                <img src="./../res/icons/cross.svg" alt="" width="12px">
                            </div>
                        </div>
                    </div>
                    <div class="bg-color-1" style="height: 2px;"></div>
                    <div>
                        <div class="font-14">To</div>
                        <div class="">
                            <div class="flex align-center">
                                <input class="w100-percent font-16" type="text" placeholder="Type to search">
                                <img src="./../res/icons/cross.svg" alt="" width="12px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex align-center">
                    <img src="./../res/icons/up-down.svg" alt="" width="24px">
                </div>
            </div>
        </div>
        <div id="drawable-bus-info" class="flex flex-column gap-8 absolute w100-percent py-16 px-16 bs-8 br-top-16 bg-color-2" style="bottom: 20px;">
            <div class="flex justify-center">
                <img src="./../res/icons/line-001.svg" alt="" height="4px">
            </div>
            <div class="flex align-center justify-between">
                <div class="flex align-center gap-8">
                    <div class="font-28">DW2</div>
                    <div class="font-14 color-green">Arriving</div>
                </div>
                <div class="marker font-14 color-green">
                    10:30 AM
                </div>
            </div>
            <div class="flex align-center gap-8">
                <div class="flex font-14">
                    From:&nbsp;<div class="color-gray">Demo Origin</div>
                </div>
                <img src="./../res/icons/right-long-arrow.svg" alt="" width="20px">
                <div class="flex font-14">
                    To:&nbsp;<div class="color-gray">Demo Destination</div>
                </div>
            </div>
            <div class="flex font-18 color-gray">License Plate Number:&nbsp;<div class="color-1">WB1215</div></div>
            <div class="flex align-center gap-8">
                <div class="marker color-1">EV</div>
                <div class="marker color-1">AC</div>
            </div>
        </div>
        <?php include("./bottomNavigation.php"); ?>
    </body>
    <script src="./../js/script.js"></script>
    <script>
        const map = L.map('map').setView([28.6477, 77.2085], 16);
        map.setZoom(10);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
</html>