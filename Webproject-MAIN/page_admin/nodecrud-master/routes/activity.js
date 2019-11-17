
/*
 * GET activitys listing.
 */

exports.list_activity = function(req, res){

    req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM activity',function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('activity',{page_title:"activity - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      });
    
  };
  
  exports.add = function(req, res){
    res.render('add_activity',{page_title:"Add activity - Node.js"});
  };
  
  exports.edit = function(req, res){
      
      var id = req.params.activity_id;
      
      req.getConnection(function(err,connection){
         
          var query = connection.query('SELECT * FROM activity WHERE activity_id = ?',[id],function(err,rows)
          {
              
              if(err)
                  console.log("Error Selecting : %s ",err );
       
              res.render('edit_activity',{page_title:"Edit activity - Node.js",data:rows});
                  
             
           });
           
           //console.log(query.sql);
      }); 
  };
  
  /*Save the activity*/
  exports.save = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
             
              activity_name    : input.activity_name,
              activity_dated    : input.activity_dated,
              activity_description   : input.activity_description,
              activity_time   : input.activity_time, 
              activity_cost   : input.activity_cost, 
              recurring   : input.recurring, 
          
          };
          
          var query = connection.query("INSERT INTO activity set ? ",data, function(err, rows)
          {
    
            if (err)
                console.log("Error inserting : %s ",err );
           
            res.redirect('/activity');
            
          });
          
         // console.log(query.sql); get raw query
      
      });
  };
  
  exports.save_edit = function(req,res){
      
      var input = JSON.parse(JSON.stringify(req.body));
      var id = req.params.activity_id;
      
      req.getConnection(function (err, connection) {
          
          var data = {
              
            activity_name    : input.activity_name,
              activity_dated    : input.activity_dated,
              activity_description   : input.activity_description,
              activity_time   : input.activity_time, 
              activity_cost   : input.activity_cost, 
              recurring   : input.recurring, 

          
          };
          
          connection.query("UPDATE activity set ? WHERE activity_id = ? ",[data,id], function(err, rows)
          {
    
            if (err)
                console.log("Error Updating : %s ",err );
           
            res.redirect('/activity');
            
          });
      
      });
  };
  
  
  exports.delete_activity = function(req,res){
            
       var id = req.params.activity_id;
      
       req.getConnection(function (err, connection) {
          
          connection.query("DELETE FROM activity  WHERE activity_id = ? ",[id], function(err, rows)
          {
              
               if(err)
                   console.log("Error deleting : %s ",err );
              
               res.redirect('/activity');
               
          });
          
       });
  };
  
  
  