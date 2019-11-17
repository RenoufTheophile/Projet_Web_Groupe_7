
/**
 * Module dependencies.
 */

var express = require('express');
var routes = require('./routes');
var http = require('http');
var path = require('path');

//load customers route
var customers = require('./routes/customers');
var app = express();

var goodies = require('./routes/goodies');
var app = express();

var activity = require('./routes/activity');
var app = express();

var commentary = require('./routes/commentary');
var app = express();

var picture = require('./routes/picture');
var app = express();

var connection  = require('express-myconnection');
var mysql = require('mysql');
// all environments
app.set('port', process.env.PORT || 4300);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
//app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.json());
app.use(express.urlencoded());
app.use(express.methodOverride());

app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
  app.use(express.errorHandler());
}

/*------------------------------------------
    connection peer, register as middleware
    type koneksi : single,pool and request
-------------------------------------------*/

app.use(

    connection(mysql,{

        host: 'localhost', //'localhost',
        user: 'root',
        password : '',
        port : 3306, //port mysql
        database:'webproject'

    },'pool') //or single

);


//definition of the routes
app.get('/', routes.index);
app.get('/customers', customers.list);
app.get('/customers/add', customers.add);
app.post('/customers/add', customers.save);
app.get('/customers/delete/:id', customers.delete_customer);
app.get('/customers/edit/:id', customers.edit);
app.post('/customers/edit/:id',customers.save_edit);

app.get('/', routes.index);
app.get('/goodies', goodies.list_goodies);
app.get('/goodies/add', goodies.add);
app.post('/goodies/add', goodies.save);
app.get('/goodies/delete/:goodies_id', goodies.delete_goodies);
app.get('/goodies/edit/:goodies_id', goodies.edit);
app.post('/goodies/edit/:goodies_id',goodies.save_edit);

app.get('/', routes.index);
app.get('/activity', activity.list_activity);
app.get('/activity/add', activity.add);
app.post('/activity/add', activity.save);
app.get('/activity/delete/:activity_id', activity.delete_activity);
app.get('/activity/edit/:activity_id', activity.edit);
app.post('/activity/edit/:activity_id',activity.save_edit);

app.get('/', routes.index);
app.get('/commentary', commentary.list_commentary);
app.get('/commentary/add', commentary.add);
app.post('/commentary/add', commentary.save);
app.get('/commentary/delete/:commentary_id', commentary.delete_commentary);
app.get('/commentary/edit/:commentary_id', commentary.edit);
app.post('/commentary/edit/:commentary_id',commentary.save_edit);

app.get('/', routes.index);
app.get('/picture', picture.list_picture);
app.get('/picture/add', picture.add);
app.post('/picture/add', picture.save);
app.get('/picture/delete/:picture_id', picture.delete_picture);
app.get('/picture/edit/:picture_id', picture.edit);
app.post('/picture/edit/:picture_id',picture.save_edit);

app.use(app.router);

http.createServer(app).listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port'));
});
