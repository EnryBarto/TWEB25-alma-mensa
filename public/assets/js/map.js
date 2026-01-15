class MapWrapper {

    constructor(id, name) {
        this.id = id;
        this.name = name;
        this.map = null;
        this.markers = new Map();
    }

    addMarker(canteen, marker) {
        this.markers.set(canteen.id, marker);
    }

    addMap(map) {
        this.map = map;
    }
}

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

const mapObjs = [...document.getElementsByClassName("map-main")].map((e) => {return new MapWrapper(e.id, e.id.slice(4))});


mapObjs.forEach((mapObj) => {
    mapObj.addMap(L.map(mapObj.id).setView(view, zoom));
});

initializeTabChangeListener();

mapObjs.forEach((mapObj) => {
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mapObj.map);
});

fetchData();

/**
 * Function to show the selected place by changing its icon and updating the selected item card.
 * @param {*} canteen Canteen object representing the selected place.
 */
function showSelectedPlace(canteen) {
    mapObjs.forEach((mapObj) => {
        mapObj.markers.entries().forEach(([, marker]) => {
            marker.setIcon(defaultIcon);
        });
        mapObj.markers.get(canteen.id)?.setIcon(selectedIcon);
    });

    const selectedItemContainer = document.getElementById("selected-item");

    getSelectedCanteenCardHtml(canteen.id).then((html) => {
        selectedItemContainer.innerHTML = html;
    });
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
            const mapObj = mapObjs.find(m => m.name === key);
            if (mapObj) {
                setTimeout(() => {
                    mapObj.map.invalidateSize();
                    mapObj.map.setView(view, zoom);
                }, 150);
            }
        });
    });
}

/**
 * Function to populate the map with canteens markers.
 * @param {JSON} data JSON object containing canteens data categorized by type.
 */
function populateMap(data) {
    Object.entries(data).forEach((category) => {
        const categoryName = category[0].toLocaleLowerCase();
        const canteens = category[1];
        if (canteens.length > 0) {
            canteens.forEach((canteen) => {
                const coords = [parseFloat(canteen.lat), parseFloat(canteen.long)];
                const m = L.marker(coords, {icon: defaultIcon})
                .addTo(mapFromCategoryName(mapObjs, categoryName).map)
                .on('click', () => {
                    showSelectedPlace(canteen);
                });
                mapFromCategoryName(mapObjs, categoryName).addMarker(canteen, m);
            });
        }
    });
}

/**
 * 
 * @param {Array} mapObjs Array containing MapWrapper objects
 * @param {String} categoryName Name of the category where to get the map from
 * @returns MapWrapper object associated to the given category name
 */
function mapFromCategoryName(mapObjs, categoryName) {
    return mapObjs.find(m => m.name === categoryName);
}

/**
 * Function to fetch canteens data from the server.
 */
async function fetchData() {
    const url = 'api_get_canteens.php';
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Response status: " + response);
        }
        const json = await response.json();
        populateMap(json);
    } catch(error) {
        console.log(error.message, error.stack);
    }
}

/**
 * Function to fetch the HTML code of the selected canteen card.
 * @param {*} canteenId Id of the canteen
 * @returns HTML code of the card
 */
async function getSelectedCanteenCardHtml(canteenId) {
    const url = `api_get_canteen_card_html.php?id=${canteenId}`;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Response status: " + response);
        }
        const html = await response.text();
        console.log(html)
        return html;
    } catch(error) {
        console.log(error.message, error.stack);
    }
}