// Muaz Khan         - www.MuazKhan.com
// MIT License       - www.WebRTC-Experiment.com/licence
// Experiments       - github.com/muaz-khan/WebRTC-Experiment

var rtcMultiConnection = new RTCMultiConnection();

rtcMultiConnection.session = { data: true };

rtcMultiConnection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};

// http://www.rtcmulticonnection.org/docs/openSignalingChannel/
var firebaseSignalingSocket = new Firebase(rtcMultiConnection.resources.firebaseio + rtcMultiConnection.channel);

var onMessageCallbacks = {};

firebaseSignalingSocket.on('child_added', function (snap) {
    onMessageCallBack(snap.val());
    snap.ref().remove(); // for socket.io live behaviour
});

function onMessageCallBack(data) {
    data = JSON.parse(data);

    if (data.sender == rtcMultiConnection.userid) return;

    if (onMessageCallbacks[data.channel]) {
        onMessageCallbacks[data.channel](data.message);
    };
}

rtcMultiConnection.openSignalingChannel = function (config) {
    var channel = config.channel || this.channel;
    onMessageCallbacks[channel] = config.onmessage;

    if (config.onopen) setTimeout(config.onopen, 1000);
    return {
        send: function (message) {
            firebaseSignalingSocket.push(JSON.stringify({
                sender: rtcMultiConnection.userid,
                channel: channel,
                message: message
            }));
        },
        channel: channel
    };
};

rtcMultiConnection.customStreams = { };

/*
// http://www.rtcmulticonnection.org/docs/fakeDataChannels/
rtcMultiConnection.fakeDataChannels = true;
if(rtcMultiConnection.UA.Firefox) {
rtcMultiConnection.session.data = true;
}
*/

rtcMultiConnection.autoTranslateText = false;
var imgTag;
var img;
rtcMultiConnection.onopen = function(e) {
    getElement('#allow-webcam').disabled = false;
    getElement('#allow-mic').disabled = false;
    getElement('#share-files').disabled = false;
    //getElement('#allow-screen').disabled = false;
    imgTag = '<img class="userImg" style="height:80px;width:80px;box-shadow:0px 0px 4px 2px rgba(0, 0, 0, 0.329);" src="'+e.extra.imagen+'">';
    img = e.extra.imagen;
    addNewMessage({
        header: e.extra.username,
        message: 'Conexión creada entre ' + e.extra.username + ' y tu.',
        userinfo: getUserinfo(rtcMultiConnection.blobURLs[rtcMultiConnection.userid], img),
        color: e.extra.color,
        tipo: 'peer'
        
    });

    numbersOfUsers.innerHTML = parseInt(numbersOfUsers.innerHTML) + 1;
};

var whoIsTyping = document.querySelector('#who-is-typing');
rtcMultiConnection.onmessage = function(e) {
    if (e.data.typing) {
        whoIsTyping.innerHTML = e.extra.username + ' está escribiendo ... <i class="fas fa-pencil-alt"></i>';
        return;
    }

    if (e.data.stoppedTyping) {
        whoIsTyping.innerHTML = '';
        return;
    }

    whoIsTyping.innerHTML = '';

    addNewMessage({
        header: e.extra.username,
        message: (rtcMultiConnection.autoTranslateText ? linkify(e.data) + ' ( ' + linkify(e.original) + ' )' : linkify(e.data)),
        userinfo: getUserinfo(rtcMultiConnection.blobURLs[e.userid], img),
        color: e.extra.color,
        tipo: 'peer'
    });
    document.title = e.data;
};

var sessions = { };
rtcMultiConnection.onNewSession = function(session) {
    if (sessions[session.sessionid]) return;
    sessions[session.sessionid] = session;

    session.join();

    addNewMessage({
        header: session.extra.username,
        message: 'Conectando....',
        userinfo: imgTag,
        color: session.extra.color,
        tipo: 'peer'
    });
};

rtcMultiConnection.onRequest = function(request) {
    rtcMultiConnection.accept(request);
    addNewMessage({
        header: 'Se han unido al chat',
        message: 'Aceptando petición de: ' + request.extra.username + ' ( ' + request.userid + ' )...',
        userinfo: imgTag,
        color: request.extra.color,
        tipo: 'peer'
    });
};

rtcMultiConnection.onCustomMessage = function(message) {
    if (message.hasCamera || message.hasScreen) {
        var msg = message.extra.username + ' activó la cámara. <button id="preview">Visualizar</button> ---- <button id="share-your-cam">Compartir cámara</button>';

        if (message.hasScreen) {
            msg = message.extra.username + ' está preparado para mostrar su escritorio. <button id="preview">Ver su pantalla</button> ---- <button id="share-your-cam">Compartir pantalla</button>';
        }

        addNewMessage({
            header: message.extra.username,
            message: msg,
            userinfo: imgTag,
            tipo: 'peer',
            color: message.extra.color,
            callback: function(div) {
                div.querySelector('#preview').onclick = function() {
                    this.disabled = true;

                    message.session.oneway = true;
                    rtcMultiConnection.sendMessage({
                        renegotiate: true,
                        streamid: message.streamid,
                        session: message.session
                    });
                };

                div.querySelector('#share-your-cam').onclick = function() {
                    this.disabled = true;

                    if (!message.hasScreen) {
                        session = { audio: true, video: true };

                        rtcMultiConnection.captureUserMedia(function(stream) {
                            rtcMultiConnection.renegotiatedSessions[JSON.stringify(session)] = {
                                session: session,
                                stream: stream
                            }
                        
                            rtcMultiConnection.peers[message.userid].peer.connection.addStream(stream);
                            div.querySelector('#preview').onclick();
                        }, session);
                    }

                    if (message.hasScreen) {
                        var session = { screen: true };

                        rtcMultiConnection.captureUserMedia(function(stream) {
                            rtcMultiConnection.renegotiatedSessions[JSON.stringify(session)] = {
                                session: session,
                                stream: stream
                            }
                            
                            rtcMultiConnection.peers[message.userid].peer.connection.addStream(stream);
                            div.querySelector('#preview').onclick();
                        }, session);
                    }
                };
            }
        });
    }

    if (message.hasMic) {
        addNewMessage({
            header: message.extra.username,
            message: message.extra.username + ' activó el micrófono. <button id="listen">Listen</button> ---- <button id="share-your-mic">Compartir micrófono</button>',
            userinfo: imgTag,
            tipo: 'peer',
            color: message.extra.color,
            callback: function(div) {
                div.querySelector('#listen').onclick = function() {
                    this.disabled = true;
                    message.session.oneway = true;
                    rtcMultiConnection.sendMessage({
                        renegotiate: true,
                        streamid: message.streamid,
                        session: message.session
                    });
                };

                div.querySelector('#share-your-mic').onclick = function() {
                    this.disabled = true;

                    var session = { audio: true };

                    rtcMultiConnection.captureUserMedia(function(stream) {
                        rtcMultiConnection.renegotiatedSessions[JSON.stringify(session)] = {
                            session: session,
                            stream: stream
                        }
                        
                        rtcMultiConnection.peers[message.userid].peer.connection.addStream(stream);
                        div.querySelector('#listen').onclick();
                    }, session);
                };
            }
        });
    }

    if (message.renegotiate) {
        var customStream = rtcMultiConnection.customStreams[message.streamid];
        if (customStream) {
            rtcMultiConnection.peers[message.userid].renegotiate(customStream, message.session);
        }
    }
};


rtcMultiConnection.blobURLs = { };
rtcMultiConnection.onstream = function(e) {
    if (e.stream.getVideoTracks().length) {
        rtcMultiConnection.blobURLs[e.userid] = e.blobURL;
        /*
        if( document.getElementById(e.userid) ) {
            document.getElementById(e.userid).muted = true;
        }
        */
        addNewMessage({
            //header: e.extra.username,
            header: 'Video stream',
            message: '<video id="' + e.userid + '" src="' + URL.createObjectURL(e.stream) + '" autoplay muted=true volume=0></vide>',
            //userinfo: '<video id="' + e.userid + '" src="' + URL.createObjectURL(e.stream) + '" autoplay muted=true volume=0></vide>',
            color: e.extra.color,
            tipo: 'archivo'
        });
    } else {
        addNewMessage({
            header: e.extra.username,
            message: e.extra.username + ' activó el micrófono.',
            userinfo: '<audio src="' + URL.createObjectURL(e.stream) + '" controls muted=true volume=0></vide>',
            color: e.extra.color,
            tipo: 'peer'
        });
    }
    usersContainer.appendChild(e.mediaElement);
};

rtcMultiConnection.sendMessage = function(message) {
    message.userid = rtcMultiConnection.userid;
    message.extra = rtcMultiConnection.extra;
    rtcMultiConnection.sendCustomMessage(message);
};

rtcMultiConnection.onclose = rtcMultiConnection.onleave = function(event) {
    addNewMessage({
        header: event.extra.username,
        message: event.extra.username + ' se ha desconectado.',
        userinfo: getUserinfo(rtcMultiConnection.blobURLs[event.userid], img),
        color: event.extra.color,
        tipo: 'peer'
    });
};
