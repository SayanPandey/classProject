/*
 * Javascript ::
 */
document.getElementById('password').addEventListener("keyup",function(){
    var reg = document.getElementById('register_button');
    var pass = document.getElementById('password');
    var conf_pass = document.getElementById('conf_pass');
    var message = document.getElementById("message");
    if(pass.value == conf_pass.value){
        reg.style.opacity=1;
        reg.style.backgroundColor="tomato";
        reg.setAttribute('onmouseenter','this.style.backgroundColor="#ff1aff"');
        reg.setAttribute('onmouseleave','this.style.backgroundColor="tomato"');
        reg.disabled=false;
        message.style.color="green";
        message.style.display="inline-block";
        message.innerHTML='Password Matched';
    }
    else{
        reg.style.backgroundColor="#BFC9CA";
        reg.style.opacity=0.5;
        reg.removeAttribute('onmouseenter');
        reg.removeAttribute('onmouseleave');
        reg.disabled=true;
        message.innerHTML='Password not Matching';
        message.style.color='red';
        message.style.display="inline-block";
    }
    
});
document.getElementById('conf_pass').addEventListener("keyup",function(){
    var reg = document.getElementById('register_button');
    var pass = document.getElementById('password');
    var conf_pass = document.getElementById('conf_pass');
    var message = document.getElementById("message");
    if(pass.value == conf_pass.value){
        reg.style.opacity=1;
        reg.style.backgroundColor="tomato";
        reg.setAttribute('onmouseenter','this.style.backgroundColor="#ff1aff"');
        reg.setAttribute('onmouseleave','this.style.backgroundColor="tomato"');
        reg.disabled=false;
        message.style.color="green";
        message.style.display="inline-block";
        message.innerHTML='Password Matched';
    }
    else{
        reg.style.backgroundColor="#BFC9CA";
        reg.style.opacity=0.5;
        reg.removeAttribute('onmouseenter');
        reg.removeAttribute('onmouseleave');
        reg.disabled=true;
        message.innerHTML='Password not Matching';
        message.style.color='red';
        message.style.display="inline-block";
        document.getElementById("message").innerHTML = serialize(document.forms[0]);
    }
    
});
if(response!=0){
    document.getElementById('message').style.display='inline-block';
    document.getElementById('message').innerHTML=response;
    document.getElementById('home').style.display='none';
    document.getElementById('register').style.display='block';
}

/*
 * JQuery ::
 */
function show(x){
    $("#register , #home, #login, #profile").hide();
    $('#'+x).fadeIn();
    
}
$("input[name ='DOB']").change(function(){
    var dob=new Date($(this).val());
    var today= new Date();
    var age=today.getFullYear()-dob.getFullYear();
    if(today.getMonth() < dob.getMonth() || (today.getMonth()==dob.getMonth() && today.getDate()<dob.getDate()))
        age--; 
    $("input[name ='age']").val(age);
});