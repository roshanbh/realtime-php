var net = require('net'),
httpserv = require("http").createServer(handler),
io = require('socket.io').listen(httpserv);
var buffer = []; 



function handler(req, res) {
    console.log('Http Server Created : ');
	res.writeHead(200);
}

httpserv.listen(8080);

var sockt;

io.sockets.on('connection', function (socket) {
    //to be used in the net 
	sockt = socket;
	//event from javascript
	socket.on('jsevent', function (data) {
		 sockt.emit('message', { 'msg': data.jsmsg});
  });
 
}); 

var server = net.createServer(function(c) { //'connection' listener
    console.log('Server Connected'  );
            c.on('data', function(data) {
                         buffer.push(data);
                        c.write('From Nodejs : '+buffer.join(""));
                        sockt.emit('message', { 'msg': buffer.join("") });
                        buffer.length = 0;
        });
});
//tcp server for connection from PHP
server.listen(8199, function() { //'listening' listener
		console.log('Tcp Server Started at 8124');
});


