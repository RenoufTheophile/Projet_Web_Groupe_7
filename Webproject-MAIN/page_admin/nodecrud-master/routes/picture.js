
/*
 * GET pictures listing.
 */

exports.list_picture = function(req, res){

    req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM picture',function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('picture',{page_title:"Pictures - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      });
    
  };
  
  exports.add = function(req, res){
    res.render('add_picture',{page_title:"Add Pictures - Node.js"});
  };
  
  exports.edit = function(req, res){
      
      var id = req.params.picture_id;
      
      req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM picture WHERE picture_id = ?',[id],function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('edit_picture',{page_title:"Edit Pictures - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      }); 
  };
  
  /*Save the customer*/
  exports.save = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
             
              id    : input.id,
              picture_name    : input.picture_name,
              picture_description   : input.picture_description,
             
          
          };
          
          var query = connection.query("INSERT INTO picture set ? ",data, function(err, rows)
          {
    
            if (err)
                console.log("Error inserting : %s ",err );
           
            res.redirect('/picture');
            
          });
          
         // console.log(query.sql); get raw query
      
      });
  };
  
  exports.save_edit = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      var id = req.params.picture_id;
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
              id    : input.id,
              picture_name    : input.picture_name,
              picture_description   : input.picture_description,
              
          
          };
          
          connection.query("UPDATE picture set ? WHERE id = ? ",[data,id], function(err, rows)
          {
    
            if (err)
                console.log("Error Updating : %s ",err );
           
            res.redirect('/picture');
            
          });
      
      });
  };
  
  
  exports.delete_picture = function(req,res){
            
       var id = req.params.picture_id;
      
       req.getConnection(function (err, connection) {
          
          connection.query("CALL delete_picture_admin(?) ",[id], function(err, rows)
          {
              
               if(err)
                   console.log("Error deleting : %s ",err );
              
               res.redirect('/picture');
               
          });
          
       });
  };
  
  
  