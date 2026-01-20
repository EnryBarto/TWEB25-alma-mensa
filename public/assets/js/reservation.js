const TIME_OFFSET = 30 // In minutes
let timeSelectedOnUpdate = false;
let peopleShownOnUpdate = false;

function addTime(start, offset) {
    return new Date(start.getTime() + offset * 60000);
}

function generatePills(timetable) {
    let result = "";
    for (let i = 0; i < timetable.length; i++) {
        let openingTime = new Date(timetable[i]["opening"]);
        let closingTime = new Date(timetable[i]["closing"]);

        for (let j = openingTime; j <= addTime(closingTime, -TIME_OFFSET + 1); j = addTime(j, TIME_OFFSET)) {
            if (j < Date.now()) continue;
            let hour = new Intl.DateTimeFormat('it', { hour: '2-digit' }).format(j);
            let minutes = new Intl.DateTimeFormat('it', { minute: '2-digit' }).format(j).padStart(2, '0');

            let button = `
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="time" onclick="timeSelected()" id="time-${hour}${minutes}" value="${hour}:${minutes}" required `;
            // We check the option that was already selected in the reservation, but only the first time that the page in
            if (!timeSelectedOnUpdate && document.querySelector("#action").value == "U") {
                let old = document.querySelector("#old_time").innerHTML;
                if (hour+":"+minutes == old) {
                    button += "checked ";
                    timeSelectedOnUpdate = true;
                }
            }
            button += `
                    /><label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-${hour}${minutes}">${hour}:${minutes}</label>
                </div>
            `;
            result += button;
        }
    }

    if (timetable.length == 0) {
        result = `<p>Non ci sono orari disponibili per la data selezionata!</p>`;
        document.querySelector("#submitBtn").disabled = true;
    }

    return result;
}

async function getOpeningHours(id) {
    // The date is changed: Disable submit and people selection
    document.querySelector("#time_selected").classList.add("d-none");
    document.querySelector("#time_not_selected").classList.remove("d-none");
    document.querySelector("#submitBtn").disabled = true;

    const date = document.querySelector("#date").value;

    if (new Date(date).getTime() < (new Date((new Date()).toDateString())).getTime()) {
        document.querySelector("#times"). innerHTML = `<p>Data selezionata nel passato!</p>`;
        document.querySelector("#submitBtn").disabled = true;
        return;
    }

    const url = `api_get_timetable.php?id=${id}&date=${date}`;
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error("Response status: " + response.status);

        const json = await response.json();
        const buttons = generatePills(json);
        const container = document.querySelector("#times");
        container.innerHTML = buttons;
        // If it's an update of the reservation, we invoke the event time selected, because we have manually chcked the old time of the reservation
        if (!peopleShownOnUpdate && document.querySelector("#action").value == "U") {
            timeSelected();
            peopleShownOnUpdate = true;
        }
    }
    catch (error) { console.log(error.message); }
}

async function updateMaxGuests() {
    const maxGuests = await getMaxGuests();
    document.getElementById("num_people").max = maxGuests;
    document.getElementById("max_people").innerHTML = maxGuests;
    if (maxGuests != 0) {
        document.querySelector("#submitBtn").disabled = false;
        document.getElementById("num_people").classList.remove("d-none");
    } else {
        document.querySelector("#submitBtn").disabled = true;
        document.getElementById("num_people").classList.add("d-none");
    }
}

// Get the max number of guests using php APIs
async function getMaxGuests() {
    const action = document.querySelector("#action").value;
    const time = document.querySelector('input[name="time"]:checked').value;
    const date = document.querySelector("#date").value;
    const id = document.querySelector("#id").value;
    let url;
    switch(action) {
        case "C":
            url = `api_check_guests_left.php?action=C&canteen=${id}&date=${date}&time=${time}`;
            break;

        case "U":
            url = `api_check_guests_left.php?action=U&code=${id}&date=${date}&time=${time}`;
            break;
    }
    console.log(url);
    let maxGuests = 0;
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error("Response status: " + response.status);
        maxGuests = await response.text();
    }
    catch (error) { console.log(error.message); }

    return maxGuests;
}

// Function invoked when a time is selected
function timeSelected() {
    document.querySelector("#time_selected").classList.remove("d-none");
    document.querySelector("#time_not_selected").classList.add("d-none");
    updateMaxGuests();
}

// If it's an update of the reservation, set the old values
function updateValues() {
    const action = document.querySelector("#action").value;
    if (action == "U") {
        // The date is set via php, but we have to invoke the change event
        document.querySelector("#date").dispatchEvent(new Event("change"));
    }
}

document.querySelectorAll("body")[0].onload = updateValues;
