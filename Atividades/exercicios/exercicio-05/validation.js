function validateString(field) {

    let n = field.value;
//    https://stackoverflow.com/a/3261380
    if (!n || /^\s*$/.test(n)) {        
        window.alert("Preencha o campo com um valor válido!");
        field.value = "";
        field.focus();
        return false;
    }

    return true;    
}

function validateImage(field) {

    let extension = field.value.split('.').pop();

    if (extension === "png" || extension === "jpeg" || extension === "jpg"){
        return true;
    }

    window.alert("Formato de imagem inválido!");
    field.value = "";
    field.focus();
    return false;   
}

function validateRadio(field) {

    let n = field.value;

    if (n === "F" || n === "M" || n === "NB" || n === "SR") {
        return true
    }
    
    window.alert("Opção inválida!");
    return false;   
}

function validation() {
    
    document.getElementById("formData").addEventListener("submit", function(event){

        let name = document.formData.name;
        let email = document.formData.email;
        let address = document.formData.address;
        let gender = document.formData.querySelector('input[name="gender"]:checked');
        let phone = document.formData.phone;
        let profileimage = document.formData.profileimage;
    
        if (validateString(name) && validateString(email) && validateString(address)  && validateRadio(gender) && validateString(phone)  && validateImage(profileimage)) {
            window.alert("Cadastro realizado com sucesso!");
        } else {
            event.preventDefault();
        }

    });   

}