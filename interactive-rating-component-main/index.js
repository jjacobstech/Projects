$('#rates').click((event)=>{ 
  console.log(event.target.textContent);
  console.log('====================================');
 
    event.target.style.color = "white"
    event.target.style.backgroundColor = " hsl(217, 12%, 63%)"
    $('#submit-btn button').click( ()=>{ 
        $('#ratings').css('display', 'none');
        $('#thankyou').css('display', 'block');
        $('#selected-rating').text(event.target.textContent) ;
        console.log(event);
        console.log('====================================');
    });
});
