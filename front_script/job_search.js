const container=document.querySelector(".main_container_3");
const profiel=document.querySelector(".me");
const profiel_info=document.querySelector(".profiel_info");
const full_name=document.getElementById("full_name")
const job_title=document.getElementById("job_title")
const country=document.getElementById("country")
async function receive(){
const response=await fetch("../back_script/job_show.php");
const datas=await response.json();  
    for(const data of datas){
        container.innerHTML+=`<div class="container">
        <div class="main_container_3_flex">
        <div>
            <h2 style="margin-bottom: 0.5rem;color:#0a66c2">${data.title}</h2>
            <h4 style="font-weight: 700;">${data.Company_name}</h4>
            <h5 style="font-weight: 700;">${data.Job_location} (${data.Workplace_type})</h5>
        </div>
        </div>
        <p style="color: black;font-size: 1.1rem;">${data.description}</p>
        </div>`     
    };
}
async function info(){
    const response=await fetch("../back_script/user_info.php");
    const data=await response.json();
    full_name.innerText=`${data.first_name} ${data.last_name}`;
    job_title.innerText=`${data.job_title}`;
    country.innerText=`${data.country}, ${data.city}`;
  }
receive();
info();
profiel.addEventListener("click",()=>{
    if(profiel_info.style.display=="none"){
     profiel_info.style.display="block";
    }
    else {
      profiel_info.style.display="none";
    }
  })
  