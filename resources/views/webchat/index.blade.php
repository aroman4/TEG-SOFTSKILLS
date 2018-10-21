<!--
// Muaz Khan         - www.MuazKhan.com
// MIT License       - www.WebRTC-Experiment.com/licence
// Experiments       - github.com/muaz-khan/WebRTC-Experiment
-->
@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9">
    
</div>
@endsection
<html lang="en">
    <head>
        <title>MultiRTC! / RTCMultiConnection Demo ® Muaz Khan</title>
        <meta name="description" content="MultiRTC is a WebRTC skype-like application that allows all features as skype provides E.g. text conversation, file sharing, enable/disable screen, enable/disable webcam or microphone etc. It provides additional features like auto-text translation in about 41 languages. It also provides customization of each feature so that you can set each value yourself e.g. chunk-size, intervals, etc." />
        <meta name="keywords" content="MultiRTC,RTCMultiConnection,WebRTC,Demos,Experiments,Muaz Khan,WebRTC and Skype,Skype like Demo" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="author" type="text/html" href="https://plus.google.com/+MuazKhan">
        <meta name="author" content="Muaz Khan">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <!-- ui-stylesheet -->
        <link href="{{ asset('webrtc/style.css') }}" rel="stylesheet">
        
        <!-- www.RTCMultiConnection.org/changes-log/ -->
        <script src="{{ asset('webrtc/RTCMultiConnection.js') }}"> </script>
        <script src="{{ asset('webrtc/FileBufferReader.js') }}"> </script>
		<script src="{{ asset('webrtc/firebase.js') }}"> </script>
        
        <script src="{{ asset('webrtc/linkify.js') }}"> </script>
    </head>
    <body>
        <div class="settings">
            <button id="settings" title="Customize many options according to your own needs!">Settings</button>
        </div>
		
        <div class="users-list" title="Click to view all shared screens and videos!">
            <div class="numbers-of-users">0</div>
            <img src="{{ asset('webrtc/images/users.png') }}">
        </div>
        
        <div class="settings-panel">
            <input type="checkbox" id="autoTranslateText">
            <label for="autoTranslateText" title="Click to chat with users from different locales! All incoming text messages will be auto converted in your language!">Auto translate text into</label>
            <select id="language" title="Select Language in which all incoming messages will be auto converted!">
                <option value="en">English</option>
                <option value="ar">Arabic (العربية)</option>
                <option value="zh-CN">Chinese (Simplified Han) [中文简体]</option>
                <option value="zh-TW">Chinese (Traditional Han) [中國傳統]</option>
                <option value="ru">Russian (Русский)</option>
                <option value="de">Dutch</option>
                <option value="fr">French (Français)</option>
                <option value="hi">Hindi (हिंदी)</option>
                <option value="pt">Portuguese (Português)</option>
                <option value="es">Spanish (Español)</option>
                <option value="tr">Turkish (Türk)</option>
                <option value="nl">Nederlands</option>
                <option value="it">Italiano</option>
                <option value="pl">Polish (Polski)</option>
                <option value="ro">Roman (Român)</option>
                <option value="sv">Swedish (Svensk)</option>
                <option value="vi">Vietnam (Việt)</option>
                <option value="th">Thai(ภาษาไทย)</option>
                <option value="ja">Japanese (日本人)</option>
                <option value="ko">Korean (한국의)</option>
                <option value="el">Greek (ελληνικά)</option>
                <option value="ts">Tamil (தமிழ்)</option>
                <option value="hy">Armenian (հայերեն)</option>
                <option value="bs">Bosnian (Bosanski)</option>
                <option value="ca">Catalan (Català)</option>
                <option value="hr">Croatian (Hrvatski)</option>
                <option value="dq">Danish (Dansk)</option>
                <option value="eo">Esperanto</option>
                <option value="fi">Finnish (Suomalainen)</option>
                <option value="ht">Haitian Creole (Haitian kreyòl)</option>
                <option value="hu">Hungarian (Magyar)</option>
                <option value="is">Icelandic</option>
                <option value="id">Indonesian</option>
                <option value="la">Latin (Latinum)</option>
                <option value="lv">Latvija (Latvijas or lætviə)</option>
                <option value="mk">Macedonian (Македонски)</option>
                <option value="no">Norwegian (norsk)</option>
                <option value="sr">Serbian (српски)</option>
                <option value="sk">Slovak (Slovenský)</option>
                <option value="ws">Swahili (Kiswahili)</option>
                <option value="cy">Welsh (Cymraeg)</option>
            </select>
                        
            <button id="save-settings" style="float: right;">Save Settings</button>
            <table>
                <tr>
                    <td>
                        <h2>Set Bandwidth</h2><br />
                        <label for="audio-bandwidth" class="adjust-width">Audio bandwidth</label>
                        <input type="text" id="audio-bandwidth" value="50" title="kbits/sec"><small>kbps</small>
                        <br />
                        <label for="video-bandwidth" class="adjust-width">Video bandwidth</label>
                        <input type="text" id="video-bandwidth" value="256" title="kbits/sec"><small>kbps</small>
                    </td>
                    
                    <td>
                        <h2>Set Resolutions</h2><br />
                        <label for="video-width" class="adjust-width">Video Width</label>
                        <input type="text" id="video-width" value="640" title="You can use values like: 1920, 1280, 960, 640, 320, 320">
                        <br />
                        <label for="video-height" class="adjust-width">Video Height</label>
                        <input type="text" id="video-height" value="360" title="You can use values like: 1080, 720, 360, 480, 240, 180">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="prefer-sctp" checked>
                        <label for="prefer-sctp" title="Prefer using SCTP data channels. Otherwise, RTP data channels will be used.">Is Prefer SCTP Data Channels?</label><br />
                        
                        <label for="chunk-size" class="adjust-width">Chunk Size</label>
                        <input type="text" id="chunk-size" value="15000" title="Chrome's sending limit is 64000 however Firefox's receiving limit is 16000."> <small>chars</small> <br />
                        <label for="chunk-interval" class="adjust-width">Chunk Interval</label>
                        <input type="text" id="chunk-interval" value="100" title="There must be an interval from 50ms to 500ms to make sure data isn't seamlessly skipped."><small>milliseconds</small><br /><br />
                        
                        <input type="checkbox" id="skip-RTCMultiConnection-Logs">
                        <label for="skip-RTCMultiConnection-Logs" title="You can disable all RTCMultiConnection logs.">skip RTCMultiConnection Logs?</label>
                    </td>
                    
                    <td>
                        <h2>Select Devices</h2><br />
                        <label for="audio-devices">Audio Devices</label>
                        <select id="audio-devices"></select>
                        <br />
                        <label for="video-devices">Video Devices</label>
                        <select id="video-devices"></select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="max-participants-allowed">Max Participants Allowed?</label>
                        <input type="text" id="max-participants-allowed" value="256"> <br /><br />
                        
                        <input type="checkbox" id="fake-pee-connection">
                        <label for="fake-pee-connection" title="This feature works only on Chrome; it means that a few peer connection will be creates with no audio/video; and no data channels!">Setup Fake Peer Connection?</label>
                    </td>
                    
                    <td>
                        <h2>Select Candidates</h2><br />
                        <input type="checkbox" id="prefer-stun" checked>
                        <label for="prefer-stun">Allow STUN Candidates?</label><br />
                        
                        <input type="checkbox" id="prefer-turn" checked>
                        <label for="prefer-turn">Allow TURN Candidates?</label><br />
                        
                        <input type="checkbox" id="prefer-host" checked>
                        <label for="prefer-host">Allow Hose Candidates?</label>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Set DataChannel Options</h2><br />
                        <label for="dataChannelDict">dataChannelDict</label>
                        <input type="text" id="dataChannelDict" value="{ordered:true}">
                    </td>
                    
                    <td>
                        <h2>Set SDP Constraints</h2><br />
                        <input type="checkbox" id="OfferToReceiveAudio" checked>
                        <label for="OfferToReceiveAudio">OfferToReceiveAudio</label><br />
                        
                        <input type="checkbox" id="OfferToReceiveVideo" checked>
                        <label for="OfferToReceiveVideo">OfferToReceiveVideo</label><br />
                        
                        <input type="checkbox" id="IceRestart">
                        <label for="IceRestart">IceRestart</label>
                    </td>
                </tr>
            </table>
            
        </div>
		
        <div class="users-container"></div>
		
        <div class="main">
            <div class="new-message" style="overflow: hidden;height: 250px;">
                <div class="user-info" style="height: 100%">
                    <img src="{{ asset('webrtc/images/user.png') }}">
                </div>
				
                <div class="user-activity">
                        
                    <h2 class="header">Welcome Sir!</h2>
                    <p class="message">
                        Please Enter a <span style="color:red;">UNIQUE</span> room-name: <input type="text" id="room-name" placeholder="Private Room-ID" style="border: 1px solid rgb(253, 253, 253);box-shadow: inset 0 0 0 1px rgb(53, 52, 52);outline: 1px solid rgb(7, 7, 7);" title="Your private rooms unique-id. It is required!"><br />
                        <small>You can enter email; or any string or numbers!</small> <br />
                        <small style="color: rgb(1, 170, 143);font-style: italic;font-weight: bold;">You MUST <span style="color:red;">manually</span> share this <span style="color:red;">unique room-name</span> with target users so they can join you!</small> <br /><br />
                    
                        Please Enter Your Full Name: <input type="text" id="your-name" placeholder="(optional)" title="Optional but Recommended!"><button id="continue" title="Click to join the room!">continue</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="main-input-box">
            <textarea placeholder="Escribe un mensaje..."></textarea>
			
			<p id="who-is-typing"></p>
			
            <div class="controls">
                <button id="allow-webcam" class="icon" disabled title="Usar Webcam"></button>
                <button id="allow-mic" class="icon" disabled title="Usar Microfono"></button>
                <button id="allow-screen" class="icon" disabled title="Compartir pantalla"></button>
                <button id="share-files" class="icon" disabled title="Enviar archivos"></button>
            </div>
        </div>

        <!-- User Interface -->
        <script src="{{ asset('webrtc/ui.main.js') }}"> </script>
        <script src="{{ asset('webrtc/ui.peer-connection.js') }}"> </script>
        <script src="{{ asset('webrtc/ui.share-files.js') }}"> </script>
        <script src="{{ asset('webrtc/ui.users-list.js') }}"> </script>
        <script src="{{ asset('webrtc/ui.settings.js') }}"> </script>
    </body>
</html>
