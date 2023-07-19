const form=document.querySelector("form");
const btn=document.querySelector("button");
const error=document.getElementById("error");
form.addEventListener("submit", (event) => {
    event.preventDefault();
    const xml=new XMLHttpRequest();
    const formdata= new FormData(form);
    xml.open("POST","../back_script/signup.php");
    xml.onreadystatechange = function () {
        if (xml.readyState === 4 && xml.status === 200) {
            let response = JSON.parse(xml.response);
            if(response.status==true){
                error.style.visibility= "visible";
            }
            else{
                window.location=response.location;
            }
        }        
    }
    xml.send(formdata);
})