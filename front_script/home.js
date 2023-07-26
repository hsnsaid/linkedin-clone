const form1 =document.querySelector("form");
const input1=document.querySelector(".search");
const form2 =document.querySelector(".post_form");
const input2=document.querySelector(".post");
const profiel=document.querySelector(".me");
const profiel_info=document.querySelector(".profiel_info");
const welcom=document.getElementById("Welcom");
const full_name=document.getElementById("full_name")
const job_title=document.getElementById("job_title")
const country=document.getElementById("country")
form1.addEventListener("submit",(e)=>{
    e.preventDefault();
    const xml=new XMLHttpRequest();
    const Form=new FormData(form1);
    xml.open("POST","../back_script/job_search.php");
    xml.onreadystatechange = function () {
      if (xml.readyState === 4 && xml.status === 200) {
                window.location = "job_search.html";
        };
      }
      xml.send(Form);
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
profiel.addEventListener("click",()=>{
  if(profiel_info.style.display=="none"){
   profiel_info.style.display="block";
  }
  else {
    profiel_info.style.display="none";
  }
})
async function info(){
  const response=await fetch("../back_script/user_info.php");
  const data=await response.json();
  welcom.innerText=`Welcom, ${data.first_name}`;
  full_name.innerText=`${data.first_name} ${data.last_name}`;
  job_title.innerText=`${data.job_title}`;
  country.innerText=`${data.country}, ${data.city}`;
}
info();