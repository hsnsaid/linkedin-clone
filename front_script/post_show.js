const container=document.querySelector(".main_container_3");
async function receive(){
    const response=await fetch("../back_script/post_show.php");
    const datas=await response.json();
    for(const data of datas){
        container.innerHTML+=`<div class="container">
        <div class="main_container_3_flex">
        <i class="fa fa-user-circle-o" style="font-size:2.5rem "></i>
        <div>
            <h4 style="margin-botto: 0;">${data.last_name}</h4>
            <h5 style="font-weight: 100;">${data.post_date}</h5>
        </div>
        </div>
        <p style="color: black;font-size: 1.1rem;">${data.descripation}</p>
        </div>`     
    };
}
receive();