// Muaz Khan         - www.MuazKhan.com
// MIT License       - www.WebRTC-Experiment.com/licence
// Experiments       - github.com/muaz-khan/WebRTC-Experiment

function getElement(selector) {
    return document.querySelector(selector);
}

var main = getElement('.main');

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.round(Math.random() * 15)];
    }
    return color;
}

function addNewMessage(args) {
    var newMessageDIV = document.createElement('div');
    newMessageDIV.className = 'new-message';

    var userinfoDIV = document.createElement('div');
    userinfoDIV.className = 'user-info';
    userinfoDIV.innerHTML = args.userinfo || '<img class="userImg" style="height:80px;width:80px;box-shadow:0px 0px 4px 2px rgba(0, 0, 0, 0.329);" src="http://cdn.onlinewebfonts.com/svg/img_410956.png">';

    //userinfoDIV.style.background = args.color || rtcMultiConnection.extra.color || getRandomColor();

    newMessageDIV.appendChild(userinfoDIV);

    var userActivityDIV = document.createElement('div');
    userActivityDIV.className = 'user-activity';

    userActivityDIV.innerHTML = '<h4 class="header">' + args.header + '</h4>';

    var p = document.createElement('p');
    p.className = 'message';
    userActivityDIV.appendChild(p);
    p.innerHTML = args.message;

    newMessageDIV.appendChild(userActivityDIV);

    main.insertBefore(newMessageDIV, main.lastChild);

    //hacer que el ultimo mensaje se coloque visible
    newMessageDIV.scrollIntoView();

    userinfoDIV.style.height = newMessageDIV.clientHeight + 'px';
    if(args.tipo == "propio"){
        console.log('mensaje propio');
        newMessageDIV.style.float = 'right';
        newMessageDIV.style.background = 'white';
    }else if(args.tipo == "peer"){
        console.log('mensaje de otro usuario');
        newMessageDIV.style.background = 'lightblue';
    }else if(args.tipo == "archivo"){
        newMessageDIV.style.width = '100%';
    }

    if (args.callback) {
        args.callback(newMessageDIV);
    }
}

var topbar = getElement('.chat-top-bar');
main.querySelector('#your-name').onkeyup = function(e) {
    if (e.keyCode != 13) return;
    main.querySelector('#continue').onclick();
};

main.querySelector('#room-name').onkeyup = function(e) {
    if (e.keyCode != 13) return;
    main.querySelector('#continue').onclick();
};

//main.querySelector('#room-name').value = localStorage.getItem('room-name') || (Math.random() * 1000).toString().replace('.', '');
/* if(localStorage.getItem('user-name')) {
    main.querySelector('#your-name').value = localStorage.getItem('user-name');
} */
var img;
topbar.querySelector('#continue').onclick = function() {
//main.addEventListener("load", function(event) {
//main.onload = function(){
    var yourName = main.querySelector('#your-name');
    var roomName = main.querySelector('#room-name');
    var userImage = main.querySelector('#user-image');
    var imgTag = '<img class="userImg" style="height:80px;width:80px;box-shadow:0px 0px 4px 2px rgba(0, 0, 0, 0.329);" src="'+userImage.value+'">';
    img = userImage.value;
    if(!roomName.value || !roomName.value.length) {
        roomName.focus();
        return alert('Your MUST Enter Room Name!');
    }
    
    localStorage.setItem('room-name', roomName.value);
    localStorage.setItem('user-name', yourName.value);
    localStorage.setItem('user-image', userImage.value);
    
    yourName.disabled = roomName.disabled = this.disabled = true;

    var username = yourName.value || 'Anonymous';

    rtcMultiConnection.extra = {
        username: username,
        imagen: userImage.value,
        color: getRandomColor()
    };

    addNewMessage({
        header: username,
        message: 'Iniciando sesión...',
        userinfo: imgTag,
        tipo: 'propio'
    });
    
    var roomid = main.querySelector('#room-name').value;
    rtcMultiConnection.channel = roomid;
	
	var firebaseRoomSocket = new Firebase(rtcMultiConnection.resources.firebaseio + rtcMultiConnection.channel + 'openjoinroom');
	
	firebaseRoomSocket.once('value', function (data) {
		var sessionDescription = data.val();

		// checking for room; if not available "open" otherwise "join"
		if (sessionDescription == null) {
			addNewMessage({
                header: username,
                message: 'Sesión iniciada.',
                userinfo:  imgTag,
                tipo: 'propio'
            });

            rtcMultiConnection.userid = roomid;
            rtcMultiConnection.open({
                dontTransmit: true,
                sessionid: roomid
            });
			
			firebaseRoomSocket.set(rtcMultiConnection.sessionDescription);
					
			// if room owner leaves; remove room from the server
			firebaseRoomSocket.onDisconnect().remove();
		} else {
			addNewMessage({
                header: username,
                message: 'Sesión iniciada.',
                userinfo:  imgTag,
                tipo: 'propio'
            });
            rtcMultiConnection.join(sessionDescription);
		}

		console.debug('room is present?', sessionDescription == null);
	});
};

function getUserinfo(blobURL, imageURL) {
    return blobURL ? '<video src="' + blobURL + '" autoplay controls></video>' : '<img class="userImg" style="height:80px;width:80px;box-shadow:0px 0px 4px 2px rgba(0, 0, 0, 0.329);" src="'+imageURL+'">';
}

var isShiftKeyPressed = false;

getElement('.main-input-box textarea').onkeydown = function(e) {
    if (e.keyCode == 16) {
        isShiftKeyPressed = true;
    }
};

var numberOfKeys = 0;
getElement('.main-input-box textarea').onkeyup = function(e) {
    numberOfKeys++;
    if (numberOfKeys > 3) numberOfKeys = 0;

    if (!numberOfKeys) {
        if (e.keyCode == 8) {
            return rtcMultiConnection.send({
                stoppedTyping: true
            });
        }

        rtcMultiConnection.send({
            typing: true
        });
    }

    if (isShiftKeyPressed) {
        if (e.keyCode == 16) {
            isShiftKeyPressed = false;
        }
        return;
    }


    if (e.keyCode != 13) return;

    addNewMessage({
        header: rtcMultiConnection.extra.username,
        message: linkify(this.value),
        userinfo: getUserinfo(rtcMultiConnection.blobURLs[rtcMultiConnection.userid], rtcMultiConnection.extra.imagen),
        color: rtcMultiConnection.extra.color,
        tipo: 'propio'
    });

    rtcMultiConnection.send(this.value);

    this.value = '';
};

getElement('#allow-webcam').onclick = function() {
    this.disabled = true;

    var session = { audio: true, video: true };

    rtcMultiConnection.captureUserMedia(function(stream) {
        var streamid = rtcMultiConnection.token();
        rtcMultiConnection.customStreams[streamid] = stream;

        rtcMultiConnection.sendMessage({
            hasCamera: true,
            streamid: streamid,
            session: session
        });
    }, session);
};

getElement('#allow-mic').onclick = function() {
    this.disabled = true;
    var session = { audio: true };

    rtcMultiConnection.captureUserMedia(function(stream) {
        var streamid = rtcMultiConnection.token();
        rtcMultiConnection.customStreams[streamid] = stream;

        rtcMultiConnection.sendMessage({
            hasMic: true,
            streamid: streamid,
            session: session
        });
    }, session);
};

/* getElement('#allow-screen').onclick = function() {
    this.disabled = true;
    var session = { screen: true };

    rtcMultiConnection.captureUserMedia(function(stream) {
        var streamid = rtcMultiConnection.token();
        rtcMultiConnection.customStreams[streamid] = stream;

        rtcMultiConnection.sendMessage({
            hasScreen: true,
            streamid: streamid,
            session: session
        });
    }, session);
}; */

getElement('#share-files').onclick = function() {
    var file = document.createElement('input');
    file.type = 'file';

    file.onchange = function() {
        rtcMultiConnection.send(this.files[0]);
    };
    fireClickEvent(file);
};

function fireClickEvent(element) {
    var evt = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });

    element.dispatchEvent(evt);
}

function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
