
function getdataBlogsByApi1(type, element) {
    var data = {
        type : type,
    };
    var token = jwt_encode(data,'UAP)(*');
    var url = url = base_url_js+'getapinewsbyblog';
    var locimg = base_url_js_sw+'upload/';
    // console.log(type);
    $.post(url,{token:token},function (response) {
        var jsonResult = JSON.parse(response);
        // console.log(jsonResult);
        if(type=="news"){
            if(jsonResult.length>0){               
                // var html = '';
                // var count=0;
                $.each(jsonResult,function (i,v) {
                    strtittlew1 = v.Title;
                    var titleres1 = (strtittlew1.length>50) ? strtittlew1.split(' ')[0]+' '+strtittlew1.split(' ')[1]+' '+strtittlew1.split(' ')[2]+' '+strtittlew1.split(' ')[3]+'...' : strtittlew1;
                    
                    str = v.Content;
                    var res = str.substring(80,0);
                    var activeLink = (i == 0) ? 'active' : '';
                    // alert(count);
                    $('#ViewNewsLimit').append('<div class="carousel-item active">'+
                      '<div class="w-100">'+
                        '<div class="card card-wrapper mb-2">'+
                          '<div class="card-up" style="background-image: url('+locimg+''+v.Images+'); background-size: cover; background-position:top center;background-repeat: no-repeat;border-top-right-radius: 5px;border-top-left-radius: 5px;">'+
                          '<div class="time-news"><i class="fas fa-clock"></i> '+v.CreateAT+'</div>'+
                          '</div>'+

                          '<div class="card-body mx-2">'+
                            '<p class="card-title font-weight-bold">'+titleres1+'</p>'+
                            '<p class="card-text" >'+res+'...</p>'+
                            '<a href="'+base_blog+'article/'+v.ID_title+'/'+v.SEO_title+'" target="_blank" class="btn-more btn btn-primary btn-md btn-rounded float-right">More Detail</a>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>');

                    // $('.carousel-item').find('.carousel-item').addClass('active');
                });            
                var owl = $('#ViewNewsLimit');
                    owl.owlCarousel({
                        items:6,
                        loop:true,
                        margin:20,
                        nav:true,
                        autoplay:true,
                        autoplayTimeout:4000,
                        autoplayHoverPause:true,
                        responsiveClass:true,
                        responsive:{
                            0:{
                                items:1,
                                nav:true
                            },
                            600:{
                                items:3,
                                nav:false
                            },
                            1000:{
                                items:6,
                                nav:true,
                                loop:false
                            }
                        },
                        navText: ['<div class="btn-floating btn-primary float-left left-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-left fa-2x"></span></div>','<div class="btn-floating btn-primary float-right right-20x waves-effect waves-light" style="line-height: 4.2;"><span class="fas fa-chevron-right fa-2x"></span></div>'],
                    
                    }); 
                    $('.play').on('click',function(){
                        owl.trigger('play.owl.autoplay',[4000])
                    })
                    $('.stop').on('click',function(){
                        owl.trigger('stop.owl.autoplay')
                    })     
            }
            
        }        
        
        
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
