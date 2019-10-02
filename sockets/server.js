var mysql = require('mysql');
const mysqlConfig = require('./config');
var con = mysql.createConnection(mysqlConfig);

const server = require('http').createServer();
const io = require('socket.io')(server);
io.on('connection', socket => {
    var sql = '';
    if (socket.handshake.query.tutor_id) {
        sql = "UPDATE tutors SET socket = '" + socket.id + "', online=1 WHERE id = '" + socket.handshake.query.tutor_id + "'";
        socket.broadcast.emit('connected_tutor', socket.handshake.query.tutor_id);
        console.log("connected tutor : " + socket.handshake.query.tutor_id);
    } else if (socket.handshake.query.student_id) {
        sql = "UPDATE students SET socket = '" + socket.id + "' WHERE id = '" + socket.handshake.query.student_id + "'";
        console.log("connected student : " + socket.handshake.query.student_id);
    }
    if (sql) {
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log(result.affectedRows + " record(s) updated");
        });
    }

  socket.on('event', data => { console.log('connected'); });
  socket.on('disconnect', () => { 
      console.log('disconnected # ' + socket.id); 
      con.query("SELECT * FROM tutors where socket='" + socket.id + "'", function (err, result, fields) {
        console.log('disconnect res');
        if (result.length) {
            socket.broadcast.emit('disconnected_tutor', result[0]['id']);
            
            var sql2 = "UPDATE tutors SET socket = '', online=0 WHERE socket = '" + socket.id + "'";
            con.query(sql2, function (err, result2) {
              if (err) throw err;
              console.log(result2.affectedRows + " record(s) updated");
            });
        } else {
            var sql3 = "UPDATE students SET socket = '' WHERE socket = '" + socket.id + "'";
            con.query(sql3, function (err, result3) {
              if (err) throw err;
              console.log(result3.affectedRows + " record(s) updated");
            });
        }
      });
  });
  socket.on('connect_timeout', (timeout) => {
    console.log('timeout # ' + socket.id);
  });
  socket.on('heartbeat', data => { 
        var sql = '';
        console.log('heartbeat : ' + socket.id);console.log(data) 
        if (data && data.tutor_id) {
            sql = "UPDATE tutors SET socket = '" + socket.id + "', online=1 WHERE id = '" + data.tutor_id + "'";
            socket.broadcast.emit('connected_tutor', data.tutor_id);
        } else if (data && data.student_id) {
            sql = "UPDATE students SET socket = '" + socket.id + "' WHERE id = '" + data.student_id + "'";
        }
        if (sql) {
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log(result.affectedRows + " record(s) updated for heartbeat");
            });
        }
  });
  socket.on('call_accepted', (data) => { 
    try {
        con.query("SELECT * FROM students where id=" + data.student_id, function (err, result, fields) {
            io.sockets.connected[result[0]['socket']].emit("accepted_call", {
                'tutor_id': data.tutor_id,
                'join_url': data.join_url
            });
        });
    } catch (excc) {
        console.log('invalid socket id - emit failed OFFLINE');
    }
  });
  socket.on('call_rejected', (data) => { 
    try {
        con.query("SELECT * FROM students where id=" + data.student_id, function (err, result, fields) {
            io.sockets.connected[result[0]['socket']].emit("rejected_call", {
                'tutor_id': data.tutor_id
            });
        });
    } catch (excc) {
        console.log('invalid socket id - emit failed OFFLINE');
    }
  });
  socket.on('call', (data) => { 
    try {
        con.query("SELECT * FROM tutors where id=" + data.tutor_id, function (err, result, fields) {
            if (result[0]['socket']) {
                io.sockets.connected[result[0]['socket']].emit("incomming_call", {
                    'student_id': data.student_id
                });
            } else {
                socket.emit("rejected_call", {
                    'tutor_id': data.tutor_id
                });
            }
        });
    } catch (excc) {
        console.log('invalid socket id - emit failed OFFLINE');
    }
  });
});
server.listen(3000);
