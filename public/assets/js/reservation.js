const TIME_OFFSET = 30 // In minutes

function addTime(start, offset) {
    return new Date(start.getTime() + offset * 60000);
}

function changeValue(num) {
    let people = parseInt(document.getElementById("num_people_text").innerText);
    people = people + parseInt(num);
    people = people >= 1 ? people : 1;
    document.getElementById("num_people_text").innerText = people;
    document.getElementById("num_people_input").value = people;
}

function generatePills(timetable) {
    let result = "";
    for (let i = 0; i < timetable.length; i++) {
        let openingTime = new Date(timetable[i]["opening"]);
        let closingTime = new Date(timetable[i]["closing"]);

        for (let j = openingTime; j <= addTime(closingTime, -TIME_OFFSET); j = addTime(j, TIME_OFFSET)) {
            let hour = new Intl.DateTimeFormat('it', { hour: '2-digit' }).format(j);
            let minutes = new Intl.DateTimeFormat('it', { minute: '2-digit' }).format(j).padStart(2, '0');

            let button = `
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="time" id="time-${hour}${minutes}" value="${hour}:${minutes}" required />
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-${hour}${minutes}">${hour}:${minutes}</label>
                </div>
            `;
            result += button;
        }
    }

    if (timetable.length == 0) {
        result = `<p>Non ci sono orari disponibili per la data selezionata!</p>`;
        document.querySelector("#submitBtn").disabled = true;
    } else {
        document.querySelector("#submitBtn").disabled = false;
    }

    return result;
}

async function getOpeningHours(id) {
    const date = document.querySelector("#date").value;

    if (new Date(date).getDate() < new Date().getDate()) {
        document.querySelector("#times"). innerHTML = `<p>Data selezionata nel passato!</p>`;
        document.querySelector("#submitBtn").disabled = true;
        return;
    }

    const url = `api_get_opening_hours.php?id=${id}&date=${date}`;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Response status: " + response.status);
        }
        const json = await response.json();
        console.log(json);
        const buttons = generatePills(json);
        const container = document.querySelector("#times");
        container.innerHTML = buttons;
    }
    catch (error) {
        console.log(error.message);
    }
}