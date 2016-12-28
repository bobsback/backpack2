

$(document).on('click', '.new', function(e) {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         
           }
       })
    e.preventDefault();
    
setTimeout(function(){
    var sortBy = $( "input:radio[name=options]:checked" ).val();

console.log(sortBy);
    $.ajax({
        url: '/Sort',
        type: 'GET',
        data: {sortBy:sortBy},
        dataType: 'html',
        success: function(response) {
            
            $('#ajax').html('');
            
           
 		  $("#ajax").html(response);			
        },
         error: function(e) {
    console.log(e.responseText);
  }

    })
}, 0);
});


$(document).on('click', '.click', function(e) {
    /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         
           }
       })*/
    e.preventDefault();
    
    var URL = document.getElementById("adimage").href;

console.log(URL);
    $.ajax({
        url: '/Click',
        type: 'POST',
        data: {URL:URL},
        dataType: 'json',
        success: function(response) {
            
            console.log(URL + "many succeses");
     
        },
         error: function(e) {
    console.log(e.responseText);
  }

    })

});
