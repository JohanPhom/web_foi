$(document).ready(function () {

    var Piechart = function(options){
        this.options = options;
        this.canvas = options.canvas;
        this.ctx = this.canvas.getContext("2d");
        this.colors = options.colors;
     
        this.draw = function(){
            var total_value = 0;
            var color_index = 0;
            for (var categ in this.options.data){
                var val = this.options.data[categ];
                total_value += val;
            }
     
            var start_angle = 0;
            for (categ in this.options.data){
                val = this.options.data[categ];
                var slice_angle = 2 * Math.PI * val / total_value;
     
                drawPieSlice(
                    this.ctx,
                    this.canvas.width/2,
                    this.canvas.height/2,
                    Math.min(this.canvas.width/2,this.canvas.height/2),
                    start_angle,
                    start_angle+slice_angle,
                    this.colors[color_index%this.colors.length]
                );
     
                start_angle += slice_angle;
                color_index++;
            }
     
        }
    }

    var form = document.getElementById("form");
    
    //------------------------------------------------------NUMBER OF QUESTION QUIZZ-----------------------------------------------------
    //default number of question
    var i = 2;
    $("#addNewQuestion").click(function () {
        var ID_club = $('#form_test').attr("action");
        var start = ID_club.indexOf("ID=");
        var end = ID_club.indexOf("&nb");
        ID_club = ID_club.substring(start + 3, end);
        $('#addNewQuestion').before($('<label for="question'+i+'">Question '+i+' : </label><input class="input_test" type="text" name="question'+i+'"><br><label for="answer'+i+'">Answer '+i+' : </label><input class="input_test" type="text" name="answer'+i+'"><br><br>'));
        $("#form_test").attr("action", "index.php?page=newtest&ID="+ID_club+"&nbquestion="+i);
        i++;
    });
    //--------------------------------------------------------COOKIE TERMS SETTING-------------------------------------------------------------
    var cookie = document.cookie;
    var start = cookie.indexOf("joox");

    //if there is already a cookie from our site
    if(start != -1){
        document.getElementsByClassName('cookie_box')[0].className = "noDisplay";
    }
    //if the user is unregistered we deal with cookie
    if(document.getElementById("sign_in")){
        $("#accept_cookie").click(function () {
            var date = new Date();
            var duration = 2;
            $.ajax({
                url: 'index.php?get_cookie',
                type: 'GET',
                dataType: 'xml',
                success: function (xml) {
                    $(xml).find('cookie').each(function () {
                        duration = $(this).find("duration").text();
                        date.setTime(date.getTime() + (duration*24*60*60*1000))
                        var expires = "expires="+ date.toUTCString();
                        document.cookie = "joox=1;expires="+expires+";path=/";
                        document.getElementsByClassName('cookie_box')[0].className = "noDisplay";
                    });
                },
        
                error: function (xhr, status, error) {
                }
            });
            
           
        });   
    }else{
        //document.getElementsByClassName('cookie_box')[0].className = "noDisplay";
    }

    //-------------------------------------------------------------COOKIE THEME SETTINGS -----------------------------------------------------------------
    
    var cookie = document.cookie;
    var start = cookie.indexOf("Joox_theme");

    if(start != -1){
        cookie = cookie.substr(start+11, cookie.length);
        end = cookie.indexOf(";");
        if(end != -1){
            cookie = cookie.substr(0, end);
        }
        $("input[name=theme][value=" + cookie + "]").prop('checked', true);
    }

    $('#theme').on('change', function(e) {
        var theme = $("input[name='theme']:checked").val();
        document.cookie = "Joox_theme="+theme+";path=/";
    });
    
    changeTheme();

    //--------------------------------------------------------------------THEME SETTING----------------------------------------------------------------------

    $("input[name='theme']").click(function(){
        changeTheme();
    }); 
     
    //------------------------------------------------------------------GRAPH --------------------------------------------------------------------------------
    
    var URL = window.location.href;
    if(URL.indexOf("statForum") != -1){

        var myCanvas = document.getElementById("myCanvas");
        myCanvas.width = 300;
        myCanvas.height = 300;

        var start = URL.indexOf("ID=");
        var ID = URL.substr(start+3, URL.length);
        var question = 0;
        var answer = 0;
        $.ajax({
            url: 'index.php?page=statForum&graph='+ID,
            type: 'GET',
            dataType: 'xml',
            success: function (xml) {
                $(xml).find('forum').each(function () {
                    question = $(this).find("question").text();
                    answer = $(this).find("answer").text();
                    question = Number(question);
                    answer = Number(answer);
                    var graph = {
                        "question": question,
                        "answer": answer,
                    };
                
                    var myPiechart = new Piechart(
                        {
                            canvas:myCanvas,
                            data:graph,
                            colors:["#fde23e","#f16e23"]
                        }
                    );
                    myPiechart.draw();
                });

            },

            error: function (xhr, status, error) {
            }
        });
    }
    
});

function drawLine(ctx, startX, startY, endX, endY){
    ctx.beginPath();
    ctx.moveTo(startX,startY);
    ctx.lineTo(endX,endY);
    ctx.stroke();
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.stroke();
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
}

function changeTheme(){
    var radio = $("input[name='theme']:checked").val();
    if(radio == "soft"){
        document.getElementsByClassName("sign")[0].style.setProperty("background-color", "#FFFFF0", null);
        document.getElementsByTagName("footer")[0].style.setProperty("background-color", "#FFFFF0", null);
        document.getElementsByClassName("background")[0].style.setProperty("background-image", "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('multimedia/background.jpeg')", null);
        var header = document.getElementsByTagName("header")[0];
        header.className = "header_soft";
    }else{
        document.getElementsByClassName("sign")[0].style.setProperty("background-color", "rgb(65, 65, 65)", null);
        document.getElementsByTagName("footer")[0].style.setProperty("background-color", "rgb(65, 65, 65)", null);
        document.getElementsByClassName("background")[0].style.setProperty("background-image", "url('multimedia/night.jpg')", null);
        document.getElementsByClassName("background")[0].style.setProperty("background-repeat", "repeat", null);
        var header = document.getElementsByTagName("header")[0];
        header.className = "header_dark";
    }
}


function displayOption(ID){

    var article = document.getElementById("option"+ID);
    var doc = document.getElementById(ID);
    if(article.className == "option visible"){
        article.className = "option invisible";
    }else{
        article.className="option visible";
    }
}

function displaySetting(){

    setting = document.getElementById("setting_box");
    if(setting.className == "invisible"){
        setting.className = "visible"
    }else{
        setting.className = "invisible";
    }

}

