var totalSend = 0;
var totalReceived = 0;

// https://stackoverflow.com/questions/149055/how-to-format-numbers-as-currency-strings
var formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
});   

function Transaction(keyValue, date, operation, value, bank) {
    this.keyValue = keyValue;
    this.date = date;
    this.operation = operation;
    this.value = value;
    this.bank = bank;    
}

function resetSelections() {
    document.getElementById("keyValue").disabled = true;
    document.getElementById("banks").selectedIndex = 0;
    $('.selectpicker').selectpicker('refresh');
}

function fillBanks(data) {

    var banks = document.getElementById("banks");

    for (let index in data) {
        const {name, fullName} = data[index];

        let option = document.createElement("option");
        option.value = name;
        option.innerHTML = fullName;

        banks.appendChild(option);             
    }

    $('.selectpicker').selectpicker('refresh');     
    
}

function loadBanks() {
    fetch("https://brasilapi.com.br/api/banks/v1")
        .then(response => response.json())
        .then(data => fillBanks(data))
        .catch(error => console.log(error.message));    
}

function setKeyField() {
    var keyType = document.getElementById("keyType");

    var keyValue = $('#keyValue');
    keyValue.prop('disabled', false);
    keyValue.attr("type", "text");

    switch (keyType.value) {        
        case "1":
            keyValue.val("");
            keyValue.unmask().mask('000.000.000-00', {reverse: true});
            console.log("cpf mask");
        break;
        case "2":
            keyValue.val("");
            keyValue.unmask().mask('00.000.000/0000-00', {reverse: true});
        break;
        case "3":
            keyValue.val("");
            keyValue.attr("type", "email")
            keyValue.unmask(); 
        break;

        case "4":
            keyValue.val("");

            var SPMaskBehavior = function (val) {   //https://igorescobar.github.io/jQuery-Mask-Plugin/
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
              },
            spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            keyValue.unmask().mask(SPMaskBehavior, spOptions);
        break;

        case "5":
            keyValue.val(""); 
            keyValue.unmask();          
        break;    
        default:
            keyValue.val("");
            keyValue.prop('disabled', true);
        break;
    }
}

function saveTransaction() {
    let keyValue = document.formData.keyValue.value;
    let date = document.formData.date.value;
    let operation = document.formData.operation.value;
    let value = document.formData.value.value;
    let bank = document.formData.banks.value;

    var transaction = new Transaction(keyValue, date, operation, value, bank);
    console.log(transaction);

    let form = document.getElementById("extract");

    let realValue = transaction.value.replace(".","");
    realValue = realValue.replace(",",".");  
    realValue = parseFloat(realValue);  

    let row = form.insertRow(form.rows.length - 1); 

    if(transaction.operation === "1") {
        row.insertCell().innerHTML = "Envio";
        totalSend += realValue;
    } else {
        row.insertCell().innerHTML = "Recebimento";
        totalReceived += realValue;
    }

    row.insertCell().innerHTML = transaction.date;
    row.insertCell().innerHTML = transaction.bank;
    row.insertCell().innerHTML = formatter.format(realValue);

}

function showResume() {
    document.getElementById("resumeSend").innerHTML = formatter.format(totalSend);
    document.getElementById("resumeReceived").innerHTML = formatter.format(totalReceived);
    document.getElementById("resumeTotal").innerHTML = formatter.format(totalReceived - totalSend);

    document.getElementById("resume").style.visibility = "visible";

    window.scrollTo(0, document.body.scrollHeight);
}

$(document).ready(function(){
    $('#date').datepicker({
        format: 'dd/mm/yyyy',                
        // language: 'pt-BR'
    });

    $('#value').mask("#.##0,00", {reverse: true});
    
    $('#formData').submit(function (evt) {
        evt.preventDefault();
    });
});     
