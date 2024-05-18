function getBotResponse(input) {
    // Simple responses

    if(input=="E"|| input=="e")
    {
        
       return "Hello. Enter 1 to register a complaint or enter 2 to know the process"
       
    }
    else if(input=="G"||input=="g")
    {
            return "ફરિયાદ નોંધવા માટે 3 દાખલ કરો અથવા પ્રક્રિયા જાણવા માટે 4 દાખલ કરો"
    }
    else if(input=="H"||input=="h")
    {
           return "नमस्ते। शिकायत दर्ज करने के लिए 5 दर्ज करें या प्रक्रिया जानने के लिए 6 दर्ज करें"
    }
    if(input=="1")
    {
        return "Enter your complaint"
        
    }
    else if(input=="3")
    {
        return "તમારી ફરિયાદ દાખલ કરો"
    }
    else if(input=="2")
    {
        return "Enter an image or text ass form of template or type a text"
    }
    else if(input=="4")
    {
        return "નમૂનાના સ્વરૂપ તરીકે ફોટો અથવા ટેક્સ્ટ દાખલ કરો અથવા ટેક્સ્ટ ટાઇપ કરો"
    }
    else if(input=="5")
    {
        return "अपनी शिकायत दर्ज करें"
    }
    else if(input==6)
    {
        return "टेम्पलेट के रूप में एक फोटो या टेक्स्ट दर्ज करें या टेक्स्ट टाइप करें"
    }
     else if(input =="")
     {
        return ""
     }

    else{
        let data = {discription: input};
    
            fetch("chatStore.php?discription=" + input, {
            method: "GET"
            }).then(res => {
            console.log(res.body);
            });
        return "Thanks for responding"
    }
   
}