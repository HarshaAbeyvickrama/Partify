function validation(){
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var phone=document.getElementById("phone").value;
    var messege =document.getElementById("messege").value;
    var error_messege =document.getElementById("error_messege");
    var text;

    error_messege.style.padding="10px";

    if (name.length <5){
        text="Please Enter Valid Name";
        error_messege.innerHTML=text;
        return false;
    }

    if (email.indexOf("@") == -1 || email.length<6){
        text="Please Enter Valid Email";
        error_messege.innerHTML=text;
        return false;
    }

    if (isNaN(phone) || phone.length>15){
        text="Please Enter Valid Phone number";
        error_messege.innerHTML=text;
        return false;
    }

    if (messege.length <=10){
        text="Please Enter your messege in more details";
        error_messege.innerHTML=text;
        return false;
    }

    alert("Form Submitted Successfully!")
    return true;
    }