 <?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'alumno') {
    header('Location: login.php');
	error_reporting(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="../../assets/css/chat.css" type="text/css" />
    
    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/chat.js"></script>
    <script type="text/javascript">
    
        /*var name = prompt("Usuario:", "Invitado");
        
        // Nickname por default: Guest
    	if (!name || name === ' ') {
    	   name = "Invitado";	
    	}*/
    	
        var name = <?php echo json_encode($_SESSION["name"]); ?>;
        
    	// Eliminacion de basura
    	name = name.replace(/(<([^>]+)>)/ig,"");
        
        /*var group = prompt("Grupo:", 1);
        
        // Nickname por default: Guest
    	if (!group || group === ' ') {
    	   group = 1;	
    	}
    	
    	// Eliminacion de basura
    	group = group.replace(/(<([^>]+)>)/ig,"");*/
    	
    	// Inicio de chat
        var chat =  new Chat(<?php echo json_encode($_SESSION["id"]); ?>);
    	$(function() {
    	
    		 chat.getState(); 
             chat.history();
    		 
    		 // A la espera de teclas presionadas en textarea
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 // Todas las teclas
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // No permitir seguir escribiendo si se llegó al limite
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }
             });
    		 
            // A la espera de la tecla ENTER
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // Envio
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">

    <div id="page-wrap">
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p>Mensaje: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    
    </div>

</body>

</html>