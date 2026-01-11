function changeValue(num) {
    let people = parseInt(document.getElementById("num_people_text").innerText);
    people = people + parseInt(num);
    people = people >= 1 ? people : 1;
    document.getElementById("num_people_text").innerText = people;
    document.getElementById("num_people_input").value = people;
}