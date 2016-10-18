var urlArray=[];
var arrayPointer=0;
$(document).ready(function(){
    $("#submitButton").bind("click", function(){
        
         if($("#urlEnter").val() == 0){
             alert("Please insert URL,then SUBMIT!");
         }
         else{
             var urls = $("#urlEnter").val();
             var urlArray = urls.split("\n");
             $.post("server/server.php"
                ,{urls:urlArray}
                ,function(data,status){
                    $("#main").append("<span>"+data+"</span>");
                    
             });
         }
    });
});