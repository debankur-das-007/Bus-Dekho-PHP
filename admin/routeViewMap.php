<?php
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: ./index.php");
        exit();
    }
    include("./../connection/connection.php");
    if(!isset($_REQUEST['route-id']))
    {
        header("Location: routeView.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php"); ?>
    <header>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    </header>
    <body>
        <div class="background-panel absolute bg-color-1"></div>
        <?php include("./topNavigation.php") ?>
        <?php include("./sideNavigation.php") ?>
        <div class="container relative">
            <div style="margin-top: 64px; margin-bottom: 32px;">
                <div class="flex align-center font-28 color-2">Routes >&nbsp;<div class="font-14">View > Map</div></div>
                <div class="font-14 color-2">View your routes here</div>
            </div>
            <div class="flex flex-column gap-16">
                <?php
                    $routeID = (int) $_REQUEST['route-id'];
                    $query = "SELECT * FROM `route_master` WHERE `route_id` = $routeID";
                    $data = mysqli_fetch_array(mysqli_query($connection, $query));
                    if($data == "")
                    {
                        exit();
                    }
                ?>
                <div class="flex align-center gap-16 px-16 py-8 br-8 bs-8 bg-color-2">
                    <div class="flex flex-column gap-8 w100-percent">
                        <div class="font-18"><span class="color-1"><?php echo $data['route_name']; ?></div>
                        <div class="flex flex-column">
                            <div class="font-16"><span class="color-1">From:</span> <?php echo $data['from']; ?></div>
                            <div class="flex justify-center my-8"><img src="./../res/icons/arrow-down.svg" alt=""></div>
                            <div class="font-16"><span class="color-1">To:</span> <?php echo $data['to']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="px-16 py-8 br-8 bs-8 bg-color-2">
                    <div id="map" style="height: 512px;"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="./../js/script.js"></script>
    <script src="./../js/leaflet.ajax.js"></script>
    <script>
        const map = L.map('map').setView([28.6477, 77.2085], 10);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var route = new L.GeoJSON.AJAX("<?php echo $data['geojson_path']; ?>", {
            onEachFeature: function (feature, layer) {}
        });

        route.on('data:loaded', function() {
            map.fitBounds(route.getBounds());
        });
        
        route.addTo(map);
    </script>
</html>