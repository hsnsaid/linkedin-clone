const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const xml = new XMLHttpRequest();
  const Form = new FormData(form);
  xml.open("POST", "../back_script/job_add.php");
  xml.onreadystatechange = function () {
    if (xml.readyState === 4 && xml.status === 200) {
      let response = JSON.parse(xml.response);
      json1 = JSON.stringify(response);
      const sender = new XMLHttpRequest();
      sender.open("POST", "../back_script/job_set_job_id.php");
      sender.send(json1);  
      sender.onreadystatechange = function () {
        if (sender.readyState === 4 && sender.status === 200) {
          window.location = "job_set_description.html";
        console.log(json1);
        }
      };
    }
  };
  xml.send(Form);
});
