
/*
 * GET goodiess listing.
 */

exports.list_goodies = function(req, res){

    req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM goodies',function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('goodies',{page_title:"goodies - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      });
    
  };
  
  exports.add = function(req, res){
    res.render('add_goodies',{page_title:"Add goodies - Node.js"});
  };
  
  exports.edit = function(req, res){
      
      var id = req.params.goodies_id;
      
      req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM goodies WHERE goodies_id = ?',[id],function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('edit_goodies',{page_title:"Edit goodies - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      }); 
  };
  
  /*Save the goodies*/
  exports.save = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
             
              goodies_name    : input.goodies_name,
              goodies_description    : input.goodies_description,
              goodies_in_stock   : input.goodies_in_stock,
              goodies_category   : input.goodies_category, 
              order_number   : input.order_number, 
              goodies_photo   : input.goodies_photo, 
              goodies_cost: input.goodies_cost 
          
          };
          
          var query = connection.query("INSERT INTO goodies set ? ",data, function(err, rows)
          {
    
            if (err)
                console.log("Error inserting : %s ",err );
           
            res.redirect('/goodies');
            
          });
          
         // console.log(query.sql); get raw query
      
      });
  };
  
  exports.save_edit = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      var id = req.params.goodies_id;
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
              goodies_name    : input.goodies_name,
              goodies_description    : input.goodies_description,
              goodies_in_stock   : input.goodies_in_stock,
              goodies_category   : input.goodies_category, 
              order_number   : input.order_number, 
              goodies_photo   : input.goodies_photo, 
              goodies_cost: input.goodies_cost
          
          };
          
          connection.query("UPDATE goodies set ? WHERE goodies_id = ? ",[data,id], function(err, rows)
          {
    
            if (err)
                console.log("Error Updating : %s ",err );
           
            res.redirect('/goodies');
            
          });
      
      });
  };
  
  
  exports.delete_goodies = function(req,res){
            
       var id = req.params.goodies_id;
      
       req.getConnection(function (err, connection) {
          
          connection.query("DELETE FROM goodies  WHERE goodies_id = ? ",[id], function(err, rows)
          {
              
               if(err)
                   console.log("Error deleting : %s ",err );
              
               res.redirect('/goodies');
               
          });
          
       });
  };
  
  
  