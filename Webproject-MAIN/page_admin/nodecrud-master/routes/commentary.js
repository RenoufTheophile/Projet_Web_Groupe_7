
/*
 * GET commentarys listing.
 */

exports.list_commentary = function(req, res){

    req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM commentary',function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('commentary',{page_title:"commentary - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      });
    
  };
  
  exports.add = function(req, res){
    res.render('add_commentary',{page_title:"Add commentary - Node.js"});
  };
  
  exports.edit = function(req, res){
      
      var id = req.params.commentary_id;
      
      req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM commentary WHERE commentary_id = ?',[id],function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('edit_commentary',{page_title:"Edit commentary - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      }); 
  };
  
  /*Save the commentary*/
  exports.save = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
             
              id    : input.id,
              picture_id    : input.picture_id,
              comment   : input.comment,
              likes   : input.likes, 
          };
          
          var query = connection.query("INSERT INTO commentary set ? ",data, function(err, rows)
          {
    
            if (err)
                console.log("Error inserting : %s ",err );
           
            res.redirect('/commentary');
            
          });
          
         // console.log(query.sql); get raw query
      
      });
  };
  
  exports.save_edit = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      var id = req.params.commentary_id;
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
              id    : input.id,
              picture_id    : input.picture_id,
              comment   : input.comment,
              likes   : input.likes, 
          
          };
          
          connection.query("UPDATE commentary set ? WHERE commentary_id = ? ",[data,id], function(err, rows)
          {
    
            if (err)
                console.log("Error Updating : %s ",err );
           
            res.redirect('/commentary');
            
          });
      
      });
  };
  
  
  exports.delete_commentary = function(req,res){
            
       var id = req.params.commentary_id;
      
       req.getConnection(function (err, connection) {
          
          connection.query("DELETE FROM commentary  WHERE commentary_id = ? ",[id], function(err, rows)
          {
              
               if(err)
                   console.log("Error deleting : %s ",err );
              
               res.redirect('/commentary');
               
          });
          
       });
  };
  
  
  