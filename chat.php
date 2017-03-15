<html>
    <head>
        <title> Chat</title>
        
        <script>
        function Submitchat()
        {
            if(chatform.username.value == '' || chatform.message.value == '' ){
                
                alert('Enter the fields');
                return;
            }
            var username = chatform.value;
            var message = chatform.value;
            var xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange = function ()
            {
                if(xmlhttp.readyState==4&&xmlhttp.status==200){
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                    
                }
            }
            xmlhttp.open('GET','insertchat.php?username='+username+'&message='+message,'true');
            xmlhttp.send();
        }
        
        
        </script>
        
    
    
    </head>
    <body>
        <form name='chatform'>
            Enter Your name:<input type="text" name="username"/><br>
            Your Message:<br>
            <textarea name='message'></textarea></br>
            <a href="" onclick="Submitchat()">Send</a><br/><br/>   
        
            <div id="chatlogs">Wait</div> 
        
    </body>
    
</html>
