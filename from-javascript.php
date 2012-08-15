<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Socket.io test</title>
    </head>
    <body>
        
        <script src="http://localhost:8080/socket.io/socket.io.js" type="text/javascript"></script>
        <script type="text/javascript">
				var socket = io.connect('http://localhost:8080');
				function sendMsg() {
					socket.emit('jsevent', { jsmsg: 'message from javascript' });
					
				}
        </script>
    </body>
	<a href="javascript:sendMsg();">Push message from JavaScript</a>
</html>
