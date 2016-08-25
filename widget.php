<?php
    header("Content-Type: application/javascript");
    date_default_timezone_set("Asia/Kolkata");
    require_once "class.php";
    DB::$user = "classkwo_oswald";
    DB::$password = "anand01";
    DB::$dbName = "classkwo_oswald";
    $error_code = 0;
    if (isset($_GET["key"])) {
        DB::query("SELECT id FROM developers WHERE api_key=%s", $_GET["key"]);
        $results = DB::count();
        if ($results > 0) {
            $key = $_GET["key"];
        } else {
            $error_code++;
        }
    } else {
        $error_code++;
    }
    if ($error_code > 0) {
        echo 'var oswald=function(){alert("Error: Invalid API Key")};var ready=function(fn){"loading"!=document.readyState?fn():document.addEventListener?document.addEventListener("DOMContentLoaded",fn):document.attachEvent("onreadystatechange",function(){"loading"!=document.readyState&&fn()})},addEventListener=function(el,eventName,handler){el.addEventListener?el.addEventListener(eventName,handler):el.attachEvent("on"+eventName,function(){handler.call(el)})};ready(oswald);';
    } else {
?>var oswald=function(){var oswaldLinks=[].slice.call(document.querySelectorAll("[data-oswald], .oswald-service"));oswaldLinks.forEach(function(item){addEventListener(item,"click",function(e){oswald.call(item),e.preventDefault()})})},global_clientID="";oswald.unqiueID=function(){return "<?php echo $key; ?>"};var oswaldCSS=document.createElement("style");oswaldCSS.setAttribute("id",global_clientID+"css"),oswaldCSS.setAttribute("type","text/css");var documentHead=document.head||document.querySelector("head");documentHead.appendChild(oswaldCSS),oswald.mode="",oswald.css=function(css,mode,button){oswaldCSS.innerHTML=css,oswald.mode=mode;var oswaldButtons=[].slice.call(document.querySelectorAll(".oswald-button"));oswaldButtons.forEach(function(item){item.classList?item.classList.remove("oswald-button-active"):item.className=item.className.replace(new RegExp("(^|\\b)"+"oswald-button-active".split(" ").join("|")+"(\\b|$)","gi")," ")}),document.querySelector("[data-button-id='"+button+"']").classList?document.querySelector("[data-button-id='"+button+"']").classList.add("oswald-button-active"):document.querySelector("[data-button-id='"+button+"']").className+=" oswald-button-active";var request=new XMLHttpRequest;request.open("GET","https://oswald.foundation/developers/includes/analytics.php?client_id="+encodeURI(global_clientID)+"&event_info="+encodeURI(mode),!0),request.onreadystatechange=function(){if(4===this.readyState)if(this.status>=200&&this.status<400){var data=this.responseText;"Error"==data&&errorlog("Error: Analytics request failed")}else errorlog("Error: Analytics request failed")},request.send(),request=null},oswald.called=0,oswald.call=function(item){if(0==oswald.called){global_clientID=oswald.unqiueID(),oswald.called++;var documentHead=document.head||document.querySelector("head"),documentBody=document.body||document.querySelector("body"),oswaldStyles=document.createElement("style");oswaldStyles.setAttribute("type","text/css"),oswaldStyles.innerHTML=".o"+global_clientID+"{z-index:999999;text-align:center;position:absolute;background:#fff;padding:30px;box-sizing:border-box;width:300px;max-width:100%;height:300px;border-radius:3px;overflow:auto}.o"+global_clientID+"triangle{content:'';width:0;height:0;border-top: 7px solid transparent;border-bottom: 7px solid transparent;border-right: 10px solid #fff;position:absolute;z-index:999999}.oswald-cross-btn{position:absolute;right:20px;top:15px;font-size:150%;cursor:pointer}.o"+global_clientID+"bg{position:fixed;left:0;right:0;top:0;bottom:0;z-index:999998;background:rgba(0,0,0,0.5)}.o"+global_clientID+"::-webkit-scrollbar{width:10px;border-radius:3px}.o"+global_clientID+"::-webkit-scrollbar-track{}.o"+global_clientID+"::-webkit-scrollbar-thumb{background:#aaa;border:5px solid whitesmoke;border-left:0;border-radius:3px}",documentHead.appendChild(oswaldStyles);var oswaldBackground=document.createElement("div");oswaldBackground.classList?oswaldBackground.classList.add("o"+global_clientID+"bg"):oswaldBackground.className+=" "+("o"+global_clientID+"bg");var oswaldClient=document.createElement("div");oswaldClient.classList?oswaldClient.classList.add("o"+global_clientID):oswaldClient.className+=" o"+global_clientID;var oswaldClientTriangle=document.createElement("div");oswaldClientTriangle.classList?oswaldClientTriangle.classList.add("o"+global_clientID+"triangle"):oswaldClientTriangle.className+=" "+("o"+global_clientID+"triangle");var oswaldLoad=document.createElement("div");oswaldLoad.classList?oswaldLoad.classList.add("oswald-loading"):oswaldLoad.className+=" oswald-loading",addEventListener(oswaldBackground,"click",function(){document.querySelector(".o"+global_clientID).style.display="none",document.querySelector(".o"+global_clientID+"bg").style.display="none",document.querySelector(".o"+global_clientID+"triangle").style.display="none"}),oswaldClient.style.left=item.offsetLeft+item.offsetWidth+20,oswaldClient.style.top=item.offsetTop-16,oswaldClientTriangle.style.left=item.offsetLeft+item.offsetWidth+10,oswaldClientTriangle.style.top=item.offsetTop,oswaldLoad.innerHTML="Loading...",documentBody.appendChild(oswaldClient),documentBody.appendChild(oswaldClientTriangle),documentBody.appendChild(oswaldBackground),oswaldClient.appendChild(oswaldLoad);var request=new XMLHttpRequest,requestURL="https://oswald.foundation/developers/includes/methods.php?oswald_uniqueID="+global_clientID;request.open("GET",requestURL,!0),request.onreadystatechange=function(){if(4===this.readyState)if(this.status>=200&&this.status<400){var data=JSON.parse(this.responseText);oswaldStyles.innerHTML+=data[1];var oswaldCategories="",oswaldCategories_a=[],oswaldCategories_b=[];Object.keys(data[4]).forEach(function(item){oswaldCategories_a.push(item)});for(var key in data[4])Object.prototype.hasOwnProperty.call(data[4],key)&&oswaldCategories_b.push(data[4][key]);for(i=0;i<oswaldCategories_a.length;i++)oswaldCategories+="<button class='oswald-button' data-button-id='"+i+"' onclick='oswald.css(\""+oswaldCategories_b[i]+'", "'+oswaldCategories_a[i]+'", "'+i+"\");'>"+oswaldCategories_a[i]+"</button>";oswaldLoad.innerHTML=data[3]+oswaldCategories+data[2]}else errorlog("Error: Communication with Oswald server failed")},request.send(),request=null}else document.querySelector(".o"+global_clientID).style.display="",document.querySelector(".o"+global_clientID+"triangle").style.display="",document.querySelector(".o"+global_clientID+"bg").style.display=""};var errorlog=function(content){console.log(content)};Object.keys||(Object.keys=function(o){if(o!==Object(o))throw new TypeError("Object.keys called on a non-object");var p,k=[];for(p in o)Object.prototype.hasOwnProperty.call(o,p)&&k.push(p);return k});var ready=function(fn){"loading"!=document.readyState?fn():document.addEventListener?document.addEventListener("DOMContentLoaded",fn):document.attachEvent("onreadystatechange",function(){"loading"!=document.readyState&&fn()})},addEventListener=function(el,eventName,handler){el.addEventListener?el.addEventListener(eventName,handler):el.attachEvent("on"+eventName,function(){handler.call(el)})};ready(oswald);
<?php
    }
?>