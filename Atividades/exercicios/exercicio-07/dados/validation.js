function validateString(field) {

    let n = field.value;
//    https://stackoverflow.com/a/3261380
    if (!n || /^\s*$/.test(n)) {        
        window.alert("Preencha o nome com um valor válido!");
        field.value = "";
        field.focus();
        return false;
    }

    return true;    
}

function validateRadio(field) {

    if (field) {
        let um = field.value;

        if (um === "pç" || um === "kg" || um === "l"|| um === "m") {
            return true;
        }
    }   

    window.alert("Unidade de medida inválida!");
    return false;   
}

function validation() {
    
    document.getElementById("formData").addEventListener("submit", function(event){

        let name = document.formData.name;
        let um = document.formData.querySelector('input[name="um"]:checked');
    
        if (validateString(name) && validateRadio(um)) {
            // window.alert("Cadastro realizado com sucesso!");
        } else {
            event.preventDefault();
        }

    });   

}