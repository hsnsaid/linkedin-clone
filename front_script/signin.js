const btn = document.querySelector("button");
const item = document.querySelectorAll("form");
btn.addEventListener("submit", (e) => {
    e.preventDefault();
    const xml = new XMLHttpRequest();
    const form = new FormData();
    for (let items of item) {
        form.append(items.name, items.value);
    }
    xml.open("POST", "../back_script/signin.php");
    xml.onreadystatechange = function () {
        if (xml.readyState === 4 && xml.status === 200) {
            console.log(xml.responseText);
        }
    };
    xml.send(form);
});