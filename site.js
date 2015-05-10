/**
 * Created by jeanypierre on 4/12/15.
 */


$(document).ready(function () {

    $(".launch-desc").click(function(){

    });

    $(".search").click(function(){

        console.log("focus")
        $(this).animate({
            width: "200px"
        }, 300)
    })

    addtoWatchList();
    subscriber();



});


function postVidComment(){

    console.log(window.location.pathname);
    $(".post-comment").submit(function(e){
        var formdata = ($(this).serialize())
        $.ajax({
            url: "post_comment.php",
            type:"POST",
            data: formdata,
            success: function(data, error){
                console.log(error);
               alert(data);
            }
        })
        e.preventDefault();
    })
}

postVidComment();
window.onload = function(){

    infoStage("Beta");
    showMore();
}

function subscriber(){
    $(".panel-body").find('form').submit( function() {

        $.ajax({
            type: "POST",
            url: "subscribe.php",
            data: $(".panel-body form").serializeArray(),
            success: function(data){
                console.log(data);
                alert(data);
            },
            error: function (error){}

        })
        $(this).find("input:first").val("");
        return false

    })
}


function infoStage(stage){

    if((readCookie("warning") =='info')){
        $(".info").hide();
    }else{
        document.cookie = 'warning=info';
        $(".info").show();
    }


}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}





$(".alert").hide();
$(".login").submit(function (e) {
    var email = $(".email").val();
    var password = $(".password").val();

    app.setEmai(email);


    //console.log(app.getEmail());
    if (!app.validateEmail($(".flash"))) {
        alert("bademail");
    } else if (!app.len(password, 7)) {
        $(".alert").find("p:first").html("password is to shorty");
        $(".alert").show();
    } else {
        app.ajaxRequest($(".login"), $(".flash"));
    }
    // ajax request


    e.preventDefault();


})

$(".post-vid li").mouseover(function () {
    $(this).find("p.description").css('display', 'block').addClass("overlay-desc");

})

$(".post-vid li").mouseleave(function() {
    $(this).find('p.description').css('display', "none");
    //$(this).find('p.description').removeClass('overlay-desc');
    $(".description").removeClass("overlay-desc");

})





// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId: 'M7lc1UVf-VE',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
   // event.target.playVideo();

}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        setTimeout(stopVideo, 6000);
        done = true;
    }
}
function stopVideo() {
    player.stopVideo();
}


function addtoWatchList(){

    $(".add ").click(function(){
        var elemTitle = $(this).attr('data-title');
        var movieId = $(this).attr('data-id');
        console.log(elemTitle);

        console.log("click");
        // adding script
        $.ajax({

            url: "adding.php",
            data: {vidid: movieId, movieTitle: elemTitle},
            type: "POST",
            success: function(d){
                //console.log(elem.attr('data-title'));
                 if(d ==''){

                    alert("You must sign in in order to save a movie to watchlist");
                 }else{
                     alert(elemTitle+" "+d);
                 }

            }
        })

    })

}


function showMore(){
    $(".p-desc").hide();
     var innerDesc =  $(".p-desc").text().length;
    var fulltext =  $(".p-desc").text();
     var lenDisplay =  100;
     var text = $(".p-desc").text().substring(0, 200);
     console.log(innerDesc)
    $(".p-desc").show().html(text);
    $(".p-desc").append("<p><a href='' class='showmore'>show more</a></p>");

    $(".showmore").click(function(e){
        $(".p-desc").html(fulltext);
        e.preventDefault()
    })
}