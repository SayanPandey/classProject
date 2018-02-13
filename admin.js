/*
 * Javascript ::
 */
if(response!=0){
    document.getElementById("home").style.display="none";
    document.getElementById("request").style.display="none";
    document.getElementById("login").style.display="block";
    document.getElementById('message').style.display='inline-block';
    document.getElementById('message').innerHTML=response;
}
if(response=='Success')
    document.getElementById('request_select').style.display='block';
/*
 * JQuery ::
 */
function show(x){
    $("#login , #home, #request").hide();
    $('#'+x).fadeIn();
}
function reject(x){
    var y = $(x).parent();
    var z=$(y).find('a.regno').text();
    $.post("response.php",{
        regno : z,
        response:"-1"
    },
    function(){
        y = y.find('img').slideUp(function(){
            $(this).attr("src","img/reject.png");
        }).slideDown();
    })
}
function accept(x){
    var y = $(x).parent();
    var z=$(y).find('a.regno').text();
    $.post("response.php",{
        regno : z,
        response:"1"
    },
    function(){
        y = y.find('img').slideUp(function(){
            $(this).attr("src","img/accept.png");
        }).slideDown();
    })
}
function display(x){
    $(".rejected , .accepted, .new").hide();
    $('.'+x).fadeIn();
}
