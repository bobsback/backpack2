

$(document).on('click', '.new', function(e) {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         
           }
       })
    e.preventDefault();

        $('#loading').html('<img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>');

setTimeout(function(){
    var sortBy = $( "input:radio[name=options]:checked" ).val();

console.log(sortBy);

    $.ajax({
        url: '/Sort',
        type: 'GET',
        data: {sortBy:sortBy},
        dataType: 'html',
        success: function(response) {
            $('#loading').html('');
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
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
       })
    e.preventDefault();

    var URL = $(this).attr('href');
    var filename = $(this).attr('id');

console.log(URL);
    $.ajax({
        type: 'GET',
        url: '/Click',
        data: { "_token": "{{ csrf_token() }}","URL":URL,"filename":filename},
        dataType: 'html',
        success: function(response) {
            
            console.log(URL + "many succeses");
     
        },
         error: function(e) {
    console.log(e.responseText);
  }

    })

});
