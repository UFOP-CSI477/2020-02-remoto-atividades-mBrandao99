function writeDisplay(char) {
    var display = document.getElementById("display");

    if(display.value !== "Erro") {
        display.value = display.value + char;
    } else {
        display.value = char;
    }
    
    display.scrollLeft = display.scrollWidth;
}

function clearDisplay() {
    var display = document.getElementById("display");
    display.value = "";
}

function validExpression(equation) {
    try {
        eval(equation);
        return true;
    } catch (e) {
       
    }

    return false;
}


function doMath() {
    var display = document.getElementById("display");
    var equation = display.value;

    equation = equation.replace(/×/g, "*");
    equation = equation.replace(/÷/g, "/");
    equation = equation.replace(/,/g, ".");

    if(validExpression(equation)){
        let value = eval(equation);
        console.log(value);
        display.value = value;
    } else {
        display.value = "Erro";
    }
}