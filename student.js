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
$(document).ready(function(){
    if(login!="0"){
        $("#register , #home, #login, #profile").hide();
        $('#login').fadeIn();
        $('#message1').text(login).css({'display':'inline-block'});
        if(login=="You are logged in,Check Profile")
            $('#login').find('button').attr('disabled','disabled').css('background-color','grey');
    }
    //Roll no insatalling
    $("#register").find("input[name='regno'],select[name='course']").blur(function(){
        x=$("#register").find("input[name='regno']").val();
        var selected = $("select[name='course'] option:selected").val();
        x=x/10000;
        if(x>999 && selected!="Select Branch")
            $("input[name=rollno]").val(Math.floor(x)%100+"/"+selected+"/");
        else  
            $("input[name=rollno]").val(null);
    });
    //Ajax registration
    $("#register").find('form').submit(function(e){
        e.preventDefault();
        serializedData=$(this).serialize();
        var request=$.ajax({
            url: "reg.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR){
            $("#message").text(response);
        });
        request.fail(function (jqXHR, textStatus, errorThrown){
			alert("Unable to Handle request please try again later !!");
		});
    });
});
//Validation
function Validate(x){
    //Block register button
    $("#register").find("button[type=submit]").attr("disabled","disabled");
    //Registration Number
    if($(x).attr('name')=="regno"){
        if(!$(x).val())
            $("#regnoError").css({'background-color':'red','color':'white'}).text("Please Insert Registration Number !!").slideDown();
        else if($(x).val()<10000000)
            $("#regnoError").css({'background-color':'red','color':'white'}).text("Registration Number less than 8 digits").slideDown();
        else
            $("#regnoError").css({'background-color':'#65FF00','color':'green'}).text("Registration Number Ok");
    }
    //Roll no
    else if($(x).attr('name')=="rollno"){
        if(!$(x).val())
            $("#rollError").css({'background-color':'red','color':'white'}).text("Please complete above details to get roll no!").slideDown();
        else if(!(/^[1-9]{2}\/(CSE|IT|ECE|ME|CE|CHE|EE|MME|BT)\/[0-9]{2,3}$/.test($(x).val())))
            $("#rollError").css({'background-color':'red','color':'white'}).text("Insert a Valid Roll no").slideDown();
        else
            $("#rollError").css({'background-color':'#65FF00','color':'green'}).text("Roll no Ok");
    }
    //Name
    else if($(x).attr('name')=="name"){
        if(!$(x).val())
            $("#nameError").css({'background-color':'red','color':'white'}).text("Please Insert your NAME !!").slideDown();
        else if(!(/^[A-Za-z ]+$/.test($(x).val())))
            $("#nameError").css({'background-color':'red','color':'white'}).text("Insert a Valid NAME").slideDown();
        else
            $("#nameError").css({'background-color':'#65FF00','color':'green'}).text("Name Ok");
    }
    //Phone Number
    else if($(x).attr('name')=="phone"){
        if(!$(x).val())
            $("#phoneError").css({'background-color':'red','color':'white'}).text("Please Insert your Phone Number !!").slideDown();
        else if($(x).val()<=1000000000)
            $("#phoneError").css({'background-color':'red','color':'white'}).text("Insert a Valid phone Number").slideDown();
        else
            $("#phoneError").css({'background-color':'#65FF00','color':'green'}).text("Phone Ok");
    }
    //email
    else if($(x).attr('name')=="email"){
        if(!$(x).val())
            $("#emailError").css({'background-color':'red','color':'white'}).text("Please Insert your Email !!").slideDown();
        else if(!(/^\w+@+[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test($(x).val())))
            $("#emailError").css({'background-color':'red','color':'white'}).text("Insert a Valid Email").slideDown();
        else
            $("#emailError").css({'background-color':'#65FF00','color':'green'}).text("Email Ok");
    }
}