function validate(){
    var mail = document.getElementById("email").value;

    var regx = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/
    //var regx = /^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/.
    if(regx.test(mail)){
        alert("You have provided a valid Email Id");
        return true;
    }else{
        alert("You have provided an ivalid Email Id");
        return false;
    }
}
