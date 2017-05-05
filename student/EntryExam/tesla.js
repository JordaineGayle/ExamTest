$('docment').ready(function(){

var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
recognition.lang = 'en-US';
    recognition.continous = true;
recognition.interimResults = false;
recognition.maxAlternatives = 5;
recognition.start();
    
recognition.onspeechstart = function() {
  console.log('Speech has been detected');
    recognition.onresult = function(event) {
        if(event.results[0][0].transcript == "Tesla"){
        console.log('You said: ', event.results[0][0].transcript);
    responsiveVoice.speak("Yes How may i help");
            recognition.onspeechstart =function(){
                  console.log('Speech2 has been detected');
                 recognition.onresult = function(cool) {
                     console.log('You said: ', cool.results[0][0].transcript);
                     if(cool.results[0][0].transcript == "what date is it"){
                         u = new Date();
                          responsiveVoice.speak(u.toDateString());
                     }else if(cool.results[0][0].transcript == "how are you"){
                         responsiveVoice.speak("I am ok, how about you?");
                         recognition.onspeechstart =function(){
                             recognition.onresult = function(cool) {
                                 responsiveVoice.speak("Well that's nice to know, hope you have a wonderful day");
                                 recognition.abort();
                             }
                         }
                     }
                 }
            }
    }else{
        console.log("wrong text");
    }
    
};
}

recognition.onend = function() {
  console.log('Speech recognition service disconnected');
   recognition.start(); 
}


});
