const contactForm = document.querySelector("#contactMain");

contactForm.addEventListener("submit", sendForm);

async function sendForm(e) {
  e.preventDefault();
  const formData = new FormData(contactForm);
  let response = await fetch("php/send_mail.php", {
    method: "POST",
    body: formData,
    mode: "no-cors",
  });

  console.log(formData);

  console.log(response);
}
