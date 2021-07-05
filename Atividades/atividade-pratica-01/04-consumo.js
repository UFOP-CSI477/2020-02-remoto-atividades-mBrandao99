function Vehicle(fuel, distance) {
    this.fuel = fuel;
    this.distance = distance;     
}


function calcPerformance(id) {
    var fuel = document.getElementById("fuel-"+id);
    var distance = document.getElementById("distance-"+id);

    if(!isNaN(fuel.value) && !isNaN(distance.value)) {
        var performance = document.getElementById("performance-"+id);
        performance.value = (distance.value / fuel.value).toFixed(2);
    }

}

function formAddRow() {
    var form = document.getElementById("formData");   

    var row = form.firstElementChild;
    var clone = row.cloneNode(true);

    var index = ((form.length - 2) / 3) + 1;

    var labels = clone.getElementsByTagName("label");

    labels[0].setAttribute("for", "fuel-" + index);
    labels[0].setAttribute("id", "label-fuel-" + index);

    labels[1].setAttribute("for", "distance-" + index);
    labels[1].setAttribute("id", "label-distance-" + index);

    labels[2].setAttribute("for", "performance-" + index);
    labels[2].setAttribute("id", "label-performance-" + index);

    var inputs = clone.getElementsByTagName("input");

    inputs[0].setAttribute("name", "fuel-" + index);
    inputs[0].setAttribute("id", "fuel-" + index);
    inputs[0].value = "";

    inputs[1].setAttribute("name", "distance-" + index);
    inputs[1].setAttribute("id", "distance-" + index);
    inputs[1].setAttribute("onchange", "calcPerformance(" + index +")");
    inputs[1].value = "";

    inputs[2].setAttribute("name", "performance-" + index);
    inputs[2].setAttribute("id", "performance-" + index);
    inputs[2].value = "";

    form.insertBefore(clone, form.lastElementChild);

}

function calcAverage() {

    //https://stackoverflow.com/a/34347610
    const element = document.querySelector("form");
    element.addEventListener("submit", event => {
        event.preventDefault();

        var rows = document.getElementById("formData").children;
        var vehicles = [];

        for (let index = 0; index < rows.length - 1; index++) {
            let inputs = rows[index].getElementsByTagName("input");
            
            let fuel = inputs[0].value;
            let distance = inputs[1].value;

            var vehicle = new Vehicle(fuel, distance);
            vehicles.push(vehicle);        
        }

        var totalFuel = 0;
        var totalDistance = 0;
        
        vehicles.forEach(vehicle => {
            totalFuel += parseFloat(vehicle.fuel);
            totalDistance += parseFloat(vehicle.distance);
        });

        totalFuel = totalFuel.toFixed(2);
        totalDistance = totalDistance.toFixed(2);
        var averageFuel = (totalFuel /  vehicles.length).toFixed(2);
        var averageDistance = (totalDistance /  vehicles.length).toFixed(2);
        var averagePerformance = (averageDistance / averageFuel).toFixed(2);

        document.getElementById("totalFuel").innerHTML = totalFuel;
        document.getElementById("totalDistance").innerHTML = totalDistance;
        document.getElementById("averageFuel").innerHTML = averageFuel;
        document.getElementById("averageDistance").innerHTML = averageDistance;
        document.getElementById("averagePerformance").innerHTML = averagePerformance;


        window.scrollTo(0, document.body.scrollHeight);    
        console.log('Form submission cancelled.');
    });

   
}