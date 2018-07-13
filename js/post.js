$(document).ready(function(){
    
    //this will fire when the  page has been loaded. 
     
    var text1 = $('#status_text').val();
    var a= 5;
    console.log(a);
    
   
    
    $('#status_post_btn').click(function(){
         
        var text1 = $('#status_text').val();
         if(text1.length>0)
        {
            console.log( text1 );    
        }
    else{
        console.log("Empty");
    }
        
        
      });
    
});