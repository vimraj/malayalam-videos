<html>
<head>
<title>Malayalam Videos</title>

<link href="style.css" rel="stylesheet" type="text/css">

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load("swfobject", "2.1");
</script>    
    
<script type="text/javascript">
<!--
/*
 * INFO: Fetches random videos from database, and plays as one video finishes.
 */

// Update a particular HTML element with a new value
function updateHTML(elmId, value) {
  document.getElementById(elmId).innerHTML = value;
}

// Loads the selected video into the player.
function loadVideo() {
  var selectBox = document.getElementById("videoSelection");
  var videoID = selectBox.options[selectBox.selectedIndex].value
  
  if(ytplayer) {
    ytplayer.loadVideoById(videoID);
  }
}


/* I tried putting the ajax part of code into one function. 
   But the function takes time, and the code that calls this 
   ajax function will not be able to get the returned value.
   
This function makes an ajax request to fetch a videoID.
*/
function getVideoID() {
        var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    // Create a function that will receive data sent from the server
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4){
	//alert("Response is " + xmlhttp.responseText);
	var dbEntry = xmlhttp.responseText.split("+");
        ytplayer.loadVideoById(dbEntry[0]);
        updateVideoInfo(dbEntry);
        /*
        var infoTag = document.getElementById("videoInfo");
        // create a new div element
        // and give it some content
        var newDiv = document.createElement("div");
        var newContent = document.createTextNode("Hi there and greetings!");
        newDiv.appendChild(newContent); //add the text node to the newly created div.

        // add the newly created element and it's content into the DOM
        infoTag.appendChild(newDiv);
        //document.insertBefore(newDiv, infoTag);
        
        updateHTML("movieName", "hello");
        updateHTML("songName", "hello1");
        */
      }
    }
    xmlhttp.open("GET","http://malayalam.sixserve.net/getvideo.php",true);
    xmlhttp.send();
}


// This function is called when the player changes state
function onPlayerStateChange(newState) {

  if(newState == 0){  //2: Paused, 0: Ended.
    //alert("An error occured of type:" + newState);
    getVideoID();
  } //if(newState == 0)
}

function updateVideoInfo(dbEntry) {
  updateHTML("movieName", dbEntry[1]);
  updateHTML("songName", dbEntry[2]);
  updateHTML("year", dbEntry[3]);
  updateHTML("singer1Name", dbEntry[4]);
  updateHTML("singer2Name", dbEntry[5]);
  updateHTML("musicDirectorName", dbEntry[6]);
  updateHTML("lyricistName", dbEntry[7]);
  updateHTML("actor1Name", dbEntry[8]);
  updateHTML("actor2Name", dbEntry[9]);
}

function editInfo() {
        var infoTag = document.getElementById("videoInfo");
        /*
        while(infoTag.hasChildNodes()){
    alert(infoTag.firstChild); 
    infoTag.removeChild(infoTag.firstChild);
  }
  */
  /*
  var spanTags = infoTag.getElementsByTagName("span");
  for (var i = 0; i < spanTags.length; i++) {
     var tempValue = spanTags[i].textContent;
     infoTag.removeChild(spanTags[i]);
     //var newLabel = document.createElement(
     //alert(spanTags[i].id);
     alert(tempValue);
  }
  
        // create a new div element
        // and give it some content
        var newDiv = document.createElement("div");
        var newContent = document.createTextNode("Hi there and greetings!");
        newDiv.appendChild(newContent); //add the text node to the newly created div.

        // add the newly created element and it's content into the DOM
        infoTag.appendChild(newDiv);
        
   */
   
   /*
   <form action="form_action.asp">
First name: <input type="text" name="FirstName" value="Mickey" /><br />
Last name: <input type="text" name="LastName" value="Mouse" /><br />
<input type="submit" value="Submit" />
</form>
*/
/*
   var newTempTag = document.createElement("table");
   newTempTag.id = 'myTable';
   //var movieName = document.createElement("
   var x=newTempTag.insertRow(0);
var y=x.insertCell(0);
var z=x.insertCell(1);
y.innerHTML="NEW CELL1";
z.innerHTML="NEW CELL2";
*/
var x=document.getElementById('infoTable').rows[0].cells;
alert(x[1].innerHTML); //="NEW CONTENT";
var tempTag = document.createElement("input");
tempTag.value = x[1].innerHTML;
document.getElementById('infoTable').rows[0].cells[1] = tempTag;
   //infoTag.removeChild(tempTag);
   //infoTag.appendChild(newTempTag);
   
}


//Browser Support Code
//function ajaxFunction(url, tag1, tag2, tag3, tag4, tag5, tag6, tag7, tag8, tag9, tag10, tag11, tag12){
function ajaxFunction(){

 var tag = [];
 tag[0] = document.getElementById('movieName').value;
 tag[1] = document.getElementById('songName').value;
 tag[2] = document.getElementById('year').value;
 tag[3] = document.getElementById('singer1Name').value;
 tag[4] = document.getElementById('singer2Name').value;
 tag[5] = document.getElementById('musicDirectorName').value;
 tag[6] = document.getElementById('lyricistName').value;
 tag[7] = document.getElementById('actor1Name').value;
 tag[8] = document.getElementById('actor2Name').value;
 tag[9] = document.getElementById('tag1Name').value;
 tag[10] = document.getElementById('tag2Name').value;
 tag[11] = document.getElementById('tag3Name').value;
 tag[12] = document.getElementById('tag4Name').value;

        var ajaxRequest;  // The variable that makes Ajax possible!
                
        try{
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
        } catch (e){
                // Internet Explorer Browsers
                try{
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                        try{
                                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e){
                                // Something went wrong
                                alert("Your browser broke!");
                                return false;
                        }
                }
        }
        // Create a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                        //alert("Thanks for the social bookmark" + ajaxRequest.responseText);
                        //document.myForm.time.value = ajaxRequest.responseText;
                }
        }

        //var queryString = "?url=" + url + "&tag1=" + tag1 + "&tag2=" + tag2;
        var queryString = "?url=" + url;
        for(i=0; i<tag.length; i++) {
            queryString = queryString + "&tag" + i + "=" + tag[i];
        }
        alert(queryString);
        //ajaxRequest.open("GET", "http://malayalam.sixserve.net/updateDatabase.php" + queryString, true);
        //ajaxRequest.send(null); 
}


// This function is called when an error is thrown by the player
function onPlayerError(errorCode) {
  alert("An error occured of type:" + errorCode);
}

// This function is automatically called by the player once it loads
function onYouTubePlayerReady(playerId) {
  ytplayer = document.getElementById("ytPlayer");
  // This causes the updatePlayerInfo function to be called every 250ms to
  // get fresh data from the player
  //setInterval(updatePlayerInfo, 250);
  //updatePlayerInfo();
  ytplayer.addEventListener("onStateChange", "onPlayerStateChange");
  ytplayer.addEventListener("onError", "onPlayerError");
}

// The "main method" of this sample. Called when someone clicks "Run".
function loadPlayer(videoID) {
  // videoID is the video to load
  // Lets Flash from another domain call JavaScript
  var params = { allowScriptAccess: "always" };
  // The element id of the Flash embed
  var atts = { id: "ytPlayer" };
  // All of the magic handled by SWFObject (http://code.google.com/p/swfobject/)
  swfobject.embedSWF("http://www.youtube.com/v/" + videoID +
                     "?version=3&enablejsapi=1&playerapiid=player1",
                     "videoDiv", "480", "295", "9", null, null, params, atts);
}

function _run() {
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    // Create a function that will receive data sent from the server
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4){
	//alert("Response is " + xmlhttp.responseText);
	var dbEntry = xmlhttp.responseText.split("+");
        loadPlayer(dbEntry[0]);
        updateVideoInfo(dbEntry);
      }
    }
    xmlhttp.open("GET","http://malayalam.sixserve.net/getvideo.php",true);
    xmlhttp.send();
  
}

google.setOnLoadCallback(_run);
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30713335-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  </head>
  <body style="font-family: Arial;border: 0 none;">
    <table>
    <tr>
    <td><div id="videoDiv">Loading...</div></td>
    <td>
    <div id="videoInfo">
    <table id="infoTable">
    <tr>
    <td> Movie : </td> <td> <span id="movieName">--</span> </td>
    </tr>
    <tr>
    <td> Song : </td> <td> <span id="songName">--</span>  </td>
    </tr>
    <tr>
    <td> Year : </td> <td> <span id="year">--</span> </td>
    </tr>
    <tr>
    <td> 
    Singers : </td> <td> <span id="singer1Name">--</span> </td>
    </tr>
    <tr>
    <td> Singers : </td> <td><span id="singer2Name">--</span> </td>
    </tr>
    <tr>
    <td> Music Director : </td> <td><span id="musicDirectorName">--</span> </td>
    </tr>
    <tr>
    <td> Lyrics by :  </td> <td> <span id="lyricistName">--</span> </td>
    </tr>
    <tr>
    <td> Actor1 :  </td> <td> <span id="actor1Name">--</span> </td>
    </tr>
    <tr>
    <td> Actor2 : </td> <td>  <span id="actor2Name">--</span> </td>
    </tr>
    </table>
    </div>
    <button type="button" onclick="editInfo();"> Edit Entry </button>
    </td></tr>
     <tr>
       <button type="button" onclick="getVideoID();"> Next video </button>
    </tr>
    
    </table>
  </body>
</html>


