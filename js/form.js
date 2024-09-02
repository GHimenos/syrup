const errorMsg = "Sorry, something went wrong and your message wasn't sent Please contact us via another conctct provided on the web page";
const successMsg = "Thank you for your interest to our company. We'll reply ASAP.";

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

  if (response.ok) {
    let colorMessage = "linear-gradient(to right, #00b09b, #96c93d)";
    showTostMessage(successMsg, colorMessage);
    contactForm.reset();
  } else {
    let colorMessage = "linear-gradient(to right, red, red)";
    showTostMessage(errorMsg, colorMessage);
  }
}

function showTostMessage(message, colorMessage) {
  Toastify({
    text: message,
    duration: 5000,
    newWindow: true,
    className: "toast-message",
    close: true,
    gravity: "bottom",
    position: "center",
    stopOnFocus: true,
    style: {
      background: colorMessage,
    },
  }).showToast();
}
