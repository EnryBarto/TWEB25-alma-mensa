/* Icon definition */
var defaultIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-grey.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

var selectedIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [30, 46],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});


/* Map initialization */
const view = [44.1434086,12.2563127];
const zoom = 13;

// Now hardcoded for each category. In the future it should be based on the categories available.
const maps = new Map([
    ['all', L.map('map-all').setView(view, zoom)],
    ['canteen', L.map('map-canteen').setView(view, zoom)],
    ['restaurant', L.map('map-restaurant').setView(view, zoom)],
    ['bar', L.map('map-bar').setView(view, zoom)]
]);

initializeTabChangeListener();

maps.forEach((map) => {
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
});

const locations = new Map([
    ["Bar Volume", [44.147839,12.2354743]],
    ["Mensa coop", [44.1451961,12.2371467]],
    ["Da zhou", [44.1443677,12.2516075]]
]);

const markers = new Map();
for (const [name, coords] of locations.entries()) {
    let marker = L.marker(coords, {icon: defaultIcon}).addTo(maps.get('all')).on('click', () => {
        showSelectedPlace(name);
    });
    addMarker(name, marker);
}

// Rudimental implementation. JTK it works. (Replace with class implementation)
let m = L.marker(locations.get("Bar Volume"), {icon: defaultIcon}).addTo(maps.get('bar')).on('click', () => {
    showSelectedPlace("Bar Volume");
});
addMarker("Bar Volume", m);

m = L.marker(locations.get("Mensa coop"), {icon: defaultIcon}).addTo(maps.get('canteen')).on('click', () => {
    showSelectedPlace("Mensa coop");
});
addMarker("Mensa coop", m);

m = L.marker(locations.get("Da zhou"), {icon: defaultIcon}).addTo(maps.get('bar')).on('click', () => {
    showSelectedPlace("Da zhou");
});
addMarker("Da zhou", m);

/**
 * Function to add a marker to the markers map. It creates the array if it does not exist.
 * @param {*} name Marker name
 * @param {*} marker Marker object
 */
function addMarker(name, marker) {
    if (!markers.has(name)) {
        markers.set(name, []);
    }
    markers.get(name).push(marker);
}

/**
 * Function to show the selected place by changing its icon and updating the selected item card.
 * @param {*} selectedKey key associated with an array of markers
 */
function showSelectedPlace(selectedKey) {
    markers.forEach((arr) => {
        arr.forEach((marker) => {
            marker.setIcon(defaultIcon);
        });
    });
    markers.get(selectedKey).forEach((marker) => {
        marker.setIcon(selectedIcon);
    });
    const selectedItemContainer = document.getElementById("selected-item");

    selectedItemContainer.innerHTML = '<div class="card h-100 mb-3"><img src="img/Volume.jpg" class="card-img-top" alt=""><div class="card-body"><h5 class="card-title">' + selectedKey + '</h5><p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p><p class="card-text"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></p><a href="#" class="btn btn-primary mt-auto">Go somewhere</a></div>';
}

/**
 * Function to recenter and invalidate the size of the map when a tab is changed. Otherwise the map is not displayed correctly.
 */
function initializeTabChangeListener() {
    document.querySelectorAll('[data-bs-toggle="pill"]').forEach(btn => {
        btn.addEventListener('shown.bs.tab', (e) => {
            const targetId = e.target.getAttribute('data-bs-target');
            if (!targetId) {
                return;
            }
            const key = targetId.replace('#pills-', '');
            const map = maps.get(key);
            if (map) {
                setTimeout(() => {
                    map.invalidateSize();
                    map.setView(view, zoom);
                }, 150);
            }
        });
    });
}