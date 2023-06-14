function validasi() {
    const pass = document.getElementById("password").value;
    const email = document.getElementById("email").value;

    if(pass == "" && email == ""){
        alert("Email dan Password kosong!");
        return false;
    }
    else if(email == ""){
        alert("Email Kosong");
        return false;
    }else if(pass == ""){
        alert("Password Kosong");
        return false;
    }else{
        return true;
    }
}