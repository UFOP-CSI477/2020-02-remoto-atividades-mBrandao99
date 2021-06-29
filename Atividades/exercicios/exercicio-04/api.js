function clearSelect(field) {

    while (field.length > 1) {
        field.remove(1);
    }

}

function fillRegions(data) {

    let regions = document.getElementById("regions");
    clearSelect(regions);

    for (let index in data) {
        const {id, nome} = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        regions.appendChild(option);        
    }
}

function fillStates(data) {

    let states = document.getElementById("states");
    clearSelect(states);

    for (let index in data) {
        const {id, nome, sigla } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome + " - " + sigla;

        states.appendChild(option);        
    }
}

function fillCities(data) {

    let cities = document.getElementById("cities");
    clearSelect(cities);

    for (let index in data) {
        const {id, nome } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        cities.appendChild(option);        
    }
}

function fillDistrics(data) {

    let districs = document.getElementById("districs");
    clearSelect(districs);

    for (let index in data) {
        const {id, nome } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        districs.appendChild(option);        
    }
}

function loadRegions() {
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/regioes")
        .then(response => response.json())
        .then(data => fillRegions(data))
        .catch(error => console.log(error.message));
}

function loadStates() {
    const regions = document.getElementById("regions");
    const region_index = regions.selectedIndex;
    const region_id = regions.options[region_index].value;

    const states = document.getElementById("states");
    clearSelect(states);

    if (region_id == "") {
        return;
    }

    const url_states = `https://servicodados.ibge.gov.br/api/v1/localidades/regioes/${region_id}/estados`;

    fetch(url_states)
        .then(response => response.json())
        .then(data => fillStates(data))
        .catch(error => console.log(error.message));
}

function loadCities() {

    const states = document.getElementById("states");
    const state_index = states.selectedIndex;
    const state_id = states.options[state_index].value;

    const cities = document.getElementById("cities");
    clearSelect(cities);

    if (state_id == "") {
        return;
    }

    const url_cities = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${state_id}/municipios`;

    fetch(url_cities)
        .then(response => response.json())
        .then(data => fillCities(data))
        .catch(error => console.log(error.message));
}

function loadDistrics() {

    const cities = document.getElementById("cities");
    const citie_index = cities.selectedIndex;
    const citie_id = cities.options[citie_index].value;

    const districs = document.getElementById("districs");
    clearSelect(districs);

    if (citie_id == "") {
        return;
    }

    const url_districs = `https://servicodados.ibge.gov.br/api/v1/localidades/municipios/${citie_id}/distritos`;

    fetch(url_districs)
        .then(response => response.json())
        .then(data => fillDistrics(data))
        .catch(error => console.log(error.message));
}