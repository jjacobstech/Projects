let xhr = new XMLHttpRequest();
$('Button').click(() => {
    console.log('clicked');
    xhr.onreadystatechange = ()=>{
       if (xhr.readystate === 4) {
           document.getElementsByTagName('body').innerHTML = xhr.responseText;
       }
        };
});
xhr.open('GET',"index.html");
xhr.send();