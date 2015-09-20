<script type="text/javascript">

function moxtra_init (access_token){
    var client_id = "uE7i8KHKb-U";
    var options = {
        mode: "sandbox", //for production environment change to "production"
        client_id: client_id,
        access_token: access_token, //valid access token from user authentication
        invalid_token: function(event) {
            //alert("Access Token expired for session id: " + event.session_id);
        }
    };

    Moxtra.init(options);
    return "1";
}


function open_chat (binder_id) {
	var options = {
	    binder_id: binder_id,
	    iframe: true,
	    tagid4iframe: "chat_container",
	    autostart_note: false,
	    start_chat: function(event) {
	        // alert("ChatView started session Id: " + event.session_id);
	    },
	    request_note: function(event) {
	        alert("Note start request");
	    },
	    error: function(event) {
	        alert("ChatView error code: " + event.error_code + " error message: " + event.error_message);
	    }
	};
	Moxtra.chatView(options);
}

</script>