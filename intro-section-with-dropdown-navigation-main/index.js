//   Desktop Navigation Functions
 // Features Button
$('#features-btn').click(() => {
    $('#features').toggle(0,()=>{
        if ($('#features').css('display') == 'none' ) {
            $('#features-btn svg').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 1 4 4 4-4"/></svg>');
            // console.log(' display - none');
        } else {
            $('#features-btn svg').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 5 4-4 4 4"/></svg>');
        //    console.log('display - block'); 
        }
    });
});
// Company Button
$('#company-btn').click(() => {
    $('#company').toggle(0,()=>{
        if ($('#company').css('display') == 'none' ) {
            $('#company-btn svg').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 1 4 4 4-4"/></svg>');
            // console.log('display - none');
        } else {
            $('#company-btn svg').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 5 4-4 4 4"/></svg>');
        //    console.log('display - block'); 
        }
    });
  
});


//  Mobile Navigation Functions

// hamburger toggle
$('#hamburger').click( () => {
    $('#mobile-nav').toggle(0,()=>{
        if ($('#mobile-nav').css("display") == "none") {
            $('#hamburger').html('<svg width="32" height="18" xmlns="http://www.w3.org/2000/svg"><g fill="#151515" fill-rule="evenodd"><path d="M0 0h32v2H0zM0 8h32v2H0zM0 16h32v2H0z"/></g></svg>');
              
          } else {
              $('#hamburger').html('<svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"><g fill="#151515" fill-rule="evenodd"><path d="m2.393.98 22.628 22.628-1.414 1.414L.979 2.395z"/><path d="M.98 23.607 23.609.979l1.414 1.414L2.395 25.021z"/></g></svg>');
          }
    });
 });
    // content toggle


    //features toggle
$('#mobile-nav-features-btn').click(function () { 
  $('#mobile-nav-features').toggle(0,()=>{
    if ( $('#mobile-nav-features').css('display') == "none") {
        $('#features-arrow-mobile').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 1 4 4 4-4"/></svg>')

    } else {
        $('#features-arrow-mobile').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 5 4-4 4 4"/></svg>')  
    } 
  });
 

      
});
 //company toggle

$('#mobile-nav-company-btn').click(function () { 
    $('#mobile-nav-company').toggle(0,()=>{
      if ( $('#mobile-nav-company').css('display') == "none") {
          $('#company-arrow-mobile').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 1 4 4 4-4"/></svg>')
  
      } else {
          $('#company-arrow-mobile').html('<svg width="10" height="6" xmlns="http://www.w3.org/2000/svg"><path stroke="#686868" stroke-width="1.5" fill="none" d="m1 5 4-4 4 4"/></svg>')  
      } 
    });
   
  
        
  });