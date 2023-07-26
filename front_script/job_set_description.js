const form = document.querySelector("form");
const textarea=document.querySelector("textarea");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const xml = new XMLHttpRequest();
  const Form = new FormData(form);
  xml.open("POST", "../back_script/job_set_description.php");
  xml.onreadystatechange = function () {
    if (xml.readyState === 4 && xml.status === 200) {
      location.reload();
    }
  };
  xml.send(Form);
  textarea.value="";
});