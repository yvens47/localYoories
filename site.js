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


});


var app = new App();
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




function App() {
    this.appName = "yoories"
    this.email;

}

App.prototype.name = "yoories";

App.prototype = {
    init: App,
    Name: function () {
        console.log(this.appName);
    },

    setEmai: function (email) {
        this.email = email;
    },
    getEmail: function () {
        return this.email;
    },
    validateEmail: function (elem) {
        var re = /\w+@+\w+\.([a-z])+/;
        var str = this.getEmail();
        var m;

        if ((m = re.exec(str)) !== null) {
            if (m.index === re.lastIndex) {
                re.lastIndex++;
            }
            // View your result using the m-variable.
            // eg m[0] etc.
            return true;
        } else {
            return false
        }
    },

    /* get the lenghth of the string
     * @precondition str >= length
     * @return true
     */

    len: function (str, length) {
        var isfalse = false
        if (str.length >= length)
            isfalse = true


        return isfalse;


    },

    ajaxRequest: function (formname, elem) {

        $.ajax({
            url: "doLogin.php",
            type: "POST",
            data: formname.serializeArray(),
            success: function (data, status, xr) {

                if (status != 'success') {
                    document.location = "app.php";
                } else {
                    console.log(data);
                    elem.html(data);


                }

            }
        })
    }


}

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

                alert(elemTitle+" "+d);
            }
        })

    })

}