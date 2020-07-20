
function getdataBlogsByApi(type, element) {
    var data = {
        type : type,
    };
    var token = jwt_encode(data,'UAP)(*');
    var url = url = base_url_js+'__load_about';
    var locimg = base_url_js_sw+'upload/';
    
    $.post(url,{token:token},function (getapinewsbyblog) {
        console.log(jsonResult);
        // if(type=="news"){
        //     if(jsonResult.length>0){
        //         // console.log(jsonResult);
        //         var html = '';
        //         $.each(jsonResult,function (i,v) {
        //             // console.log(v.Title);
        //             html ='<div class="carousel-item">'+
        //               '<div class="col-12 col-md-2">'+
        //                 '<div class="card card-wrapper mb-2">'+
        //                   '<div class="card-up" style="background-image: url('+locimg+''+v.Images+'); background-size: contain; background-position: center;background-repeat: no-repeat;">'+
                          
        //                   '</div>'+

        //                   '<div class="card-body mx-2">'+
        //                     '<p class="card-title font-weight-bold">'+v.Title+'</p>'+
        //                     '<p class="card-text">'+v.Content+'</p>'+
        //                     '<a href="" class="btn btn-primary btn-md btn-rounded float-right">More Detail</a>'+
        //                   '</div>'+
        //                 '</div>'+
        //               '</div>'+
        //             '</div>';
        //         });
        //         $('.carousel-item').first().addClass('active');       
        //         $('#ViewNewsLimit').html(html);
        //     }       
  
        // }   
        
        
    });

}



//   function getdataBlogsByApi() {

//     $.ajax({
//       type : 'POST',
//       url : base_url_js_sw+'__getapiblogs',
//       dataType : 'json',
//       data:{limit:12},
//       success : function(data){
//         // console.log(jsonResult);
//         var html = '';
//         if(data.length>0){
//             var d = data[0];
//             html ='<div class="carousel-item active">'+
//                     '<div class="col-12 col-md-2">'+
//                       '<div class="card card-wrapper mb-2">'+
//                         '<div class="card-up" style="background-image: url(<?= base_url('assets/img/jobs/LOGO-AGUNG-PODOMORO-LAND.png')?>); background-size: contain; background-position: center;background-repeat: no-repeat;">'+
                        
//                         '</div>'+

//                         '<div class="card-body mx-2">'+
//                           '<p class="card-title font-weight-bold">Some quick example</p>'+
//                           '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content</p>'+
//                           '<a class="btn btn-primary btn-md btn-rounded float-right">More Detail</a>'+
//                         '</div>'+
//                       '</div>'+
//                     '</div>'+
//                   '</div>';


//             $('#ViewNewsLimit').append(html);


//         }
//       }
//     });

// }
