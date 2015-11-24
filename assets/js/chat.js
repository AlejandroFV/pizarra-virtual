var instanse = false;
var group;
var state;
var lastId = 0;

function Chat (g) {
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
    this.history= historyChat;
    group = g;
}

//Obtiene el estado del chat
function getStateOfChat(){
    if(!instanse){
        instanse = true;
        var datos = {
            function : 'getState',
            room : group,
        };
        $.ajax({
            type: "POST",
            url: "../../application/controller/chat.php",
            data: datos,
            dataType: "json",
            success: function(data){
                state = data.state;
                instanse = false;
            },
        });
    }
}

//Actualiza el chat
function updateChat(){
    if(!instanse){
        instanse = true;
        
        var datos = {
            function : 'update',
            state : state,
            room : group,
            lastId : lastId,
        };
        $.ajax({
            type: "POST",
            url: "../../application/controller/chat.php",
            data: datos,
            dataType : "json",
            success: function(data){
                if(data.text){
                    for (var i = 0; i < data.text.length; i++) {
                        $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
                    }								  
                }
                document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
                instanse = false;
                state = data.state;
                lastId = data.lastId;
            },
        });
    }
    else {
        setTimeout(updateChat, 1500);
    }
}

//Enviar el mensaje
function sendChat(message, nickname)
{       
    updateChat();

    var datos = {
        function : 'send',
        message : message,
        nickname : nickname,
        room : group,
    };

    $.ajax({
        type: "POST",
        url: "../../application/controller/chat.php",
        data: datos,
        success: function(data){
            updateChat();
        },
    });
}

function historyChat()
{
    var datos = {
        function : 'history',
        room : group,
    };
    $.ajax({
        type: "POST",
        url: "../../application/controller/chat.php",
        data: datos,
        dataType : "json",
        success: function(data){
            if(data.text){
                for (var i = 0; i < data.text.length; i++) {
                    $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
                }								  
            }
            document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
        },
    });
}