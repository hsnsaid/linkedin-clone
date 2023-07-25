const form =document.querySelector(".post_form");
form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const xml=new XMLHttpRequest();
    const Form=new FormData(form);
    xml.open("POST","../back_script/post_add.php");
    xml.send(Form);
})