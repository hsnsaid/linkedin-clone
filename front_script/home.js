const form1 =document.querySelector("form");
const input1=document.querySelector(".search");
const form2 =document.querySelector(".post_form");
const input2=document.querySelector(".post")
form1.addEventListener("submit",(e)=>{
    e.preventDefault();
    const xml=new XMLHttpRequest();
    const Form=new FormData(form1);
    xml.open("POST","../back_script/job_show.php");
    xml.onreadystatechange = function () {
        if (xml.readyState === 4 && xml.status === 200) {
        //   location.reload();
        }
      };
      xml.send(Form);
    //   input1.value="";
})
form2.addEventListener("submit",(e)=>{
    e.preventDefault();
    const xml=new XMLHttpRequest();
    const Form=new FormData(form2);
    xml.open("POST","../back_script/post_add.php");
    xml.onreadystatechange = function () {
        if (xml.readyState === 4 && xml.status === 200) {
          location.reload();
        }
      };
      xml.send(Form);
      input2.value="";
})