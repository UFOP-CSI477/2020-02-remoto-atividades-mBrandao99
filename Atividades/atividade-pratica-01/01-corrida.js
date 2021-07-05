function Competitor(start, name, time) {
    this.start = start;
    this.name = name;
    this.time = time;           
}

function validate(value) {

    if (!value || /^\s*$/.test(value)) {     //https://stackoverflow.com/a/3261380   
        return false;
    }

    return true;    
}

function compareTime(competitor1, competitor2) { //https://stackoverflow.com/questions/1129216/sort-array-of-objects-by-string-property-value
    if (competitor1.time < competitor2.time){
      return -1;
    }
    if (competitor1.time > competitor2.time){
      return 1;
    }
    return 0;
}

function fillResults(competitors) {
    let tbody = document.getElementById("results").getElementsByTagName("tbody")[0];
    tbody.innerHTML = "";
    
    const winnerTime = competitors[0].time;
    var time = competitors[0].time;
    var position = 1;

    competitors.forEach(competitor => {
        let row = tbody.insertRow();

        if(competitor.time == time) {
            row.insertCell().innerHTML = position;
        } else {
            row.insertCell().innerHTML = ++position;
        }     
        
        row.insertCell().innerHTML = competitor.start;

        if(validate(competitor.name)) {
            row.insertCell().innerHTML = competitor.name;
        } else {
            row.insertCell().innerHTML = "Não Informado ou Incompleto";
        }
        
        if(validate(competitor.time)){
            row.insertCell().innerHTML = competitor.time;
        } else {
            row.insertCell().innerHTML = "N/A";
        }
             

        if(competitor.time == winnerTime && winnerTime) {
            row.insertCell().innerHTML = "Vencedor(a)!";
        } else {
            row.insertCell().innerHTML = "-";
        }

    });

    document.getElementById("results").style.visibility = "visible";
    window.scrollTo(0, document.body.scrollHeight);
}

function loadCompetitors() {

    var validCompetitors = [];
    var invalidCompetitors = [];

    for (let index = 1; index < 7; index++) {

        let start = document.getElementById("start-" + index).value;
        let name = document.getElementById("name-" + index).value;
        let time = document.getElementById("time-" + index).value;

        let competitor = new Competitor(start, name, time); 

        if(validate(start) && validate(name) && validate(time)) {
            validCompetitors.push(competitor);
        } else {
            invalidCompetitors.push(competitor); 
        }   
        
    }

    validCompetitors.sort(compareTime);
    var competitors = validCompetitors.concat(invalidCompetitors);

    console.log(competitors);
    fillResults(competitors);       

}