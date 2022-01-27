// compare les email au moment de l'inscription
function compare(event) {
  var email = document.querySelector("#email").value;
  var confirmation = document.querySelector("#confirmation").value;

  if (email != confirmation) {
    event.preventDefault();
    document.querySelector("#errormail").innerHTML =
      "L'email et la confirmation doivent être identiques";
  }
}

// Verifie si la plaque est rentrée correctement
const plaque = document.querySelector("#plaque");

plaque.addEventListener("change", function () {
  const regex = /^[a-zA-Z]{2}[-][0-9]{3}[-][a-zA-Z]{2}$/;
  plaque.classList.remove("is-valid");
  plaque.classList.remove("is-invalid");
  document.querySelector("#errorPlaque").style.display = "none";

  let plate = plaque.value;

  if (plate.match(regex)) {
    plaque.classList.add("is-valid");
  } else {
    plaque.classList.add("is-invalid");
    document.querySelector("#errorPlaque").style.display = "block";
    document.querySelector("#errorPlaque").innerHTML =
      "La plaque d'immatriculation doit avoir le format AA-123-AA";
    document.querySelector("#errorPlaque").style.color = "red";
    return false;
  }
  fetch(`./src/controller/FrontController.php?function=dupliPlate&p=${plate}`)
    .then((result) => result.json())
    .then((data) => {
      if (data.status.length > 0) {
        plaque.classList.add("is-invalid");
        document.querySelector("#errorPlaque").style.display = "block";
        document.querySelector("#errorPlaque").innerHTML =
          "Cette plaque d'immatriculation existe déjà";
        document.querySelector("#errorPlaque").style.color = "red";
      }
    });
});

// Verifie si le choix est une reponse correcte
const choix = document.querySelector("#choix");

choix.addEventListener("change", function () {
  choix.classList.remove("is-valid");
  choix.classList.remove("is-invalid");
  document.querySelector("#errorChoix").style.display = "none";

  if (choix.value == "--Choisir une option--") {
    choix.classList.add("is-invalid");
    document.querySelector("#errorChoix").style.display = "block";
    document.querySelector("#errorChoix").innerHTML =
      "Veuillez choisir une marque";
    document.querySelector("#errorChoix").style.color = "red";
    alert("Please select an option!");
  } else {
    choix.classList.add("is-valid");
  }
});

// On met une fonction submit sur le bouton
const form = document.querySelector("form");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  switch (e.submitter.id) {
    case "btn1":
      insertCar(e);
      break;
    case "btn2":
      updateCar(e.submitter.dataset.carId);
      break;
  }
});

function insertCar(event) {
  event.preventDefault();
  fetch(`./src/controller/FrontController.php?function=insertCar`, {
    method: "POST",
    body: new FormData(form),
  })
    .then((result) => result.json())
    .then((data) => {
      if (data.status == "OK") {
        document.querySelector("#messageYes").classList.remove("d-none");
        setTimeout(function time() {
          document.querySelector("#messageYes").classList.add("d-none");
        }, 5000);
        displayCars();
        form.reset();
      }
    });
}

function displayCars() {
  fetch(`./src/controller/FrontController.php?function=displayCars`)
    .then((result) => result.json())
    .then((data) => {
      if (data.status == "OK") {
        document.querySelector("#tableauCars").style.display = "block";
        document.querySelector("#tableauCars").innerHTML = data.table;
        if (data.cars.length > 0) {
          document.getElementById("pasVoitures").classList.add("d-none");
        } else {
          document.getElementById("pasVoitures").classList.remove("d-none");
        }
      }
    });
}

displayCars();

function deleteCar(id) {
  if (confirm("Voulez vous effacer la voiture ?") == true) {
    fetch(`./src/controller/FrontController.php?function=deleteCar&id=${id}`)
      .then((result) => result.json())
      .then((data) => {
        if (data.status === "OK") {
          let element = document.getElementById(`car${id}`);
          element.parentNode.removeChild(element);
          document.querySelector("#messageNo").classList.remove("d-none");
          setTimeout(function time() {
            document.querySelector("#messageNo").classList.add("d-none");
          }, 5000);
        }
      });
  }
}

function editCar(id) {
  if (confirm("Editez le formulaire pour modifier la voiture") == true) {
    fetch(`./src/controller/FrontController.php?function=editCar&id=${id}`)
      .then((result) => result.json())
      .then((data) => {
        if (data.status === "OK") {
          document.getElementById("plaque").value = data.plate;
          document.getElementById("couleur").value = data.color;
          document.getElementById("choix").value = data.brand;
          document.getElementById("modele").value = data.model;
          document.getElementById("btn2").dataset.carId = data.id;
        }
      });
    document.getElementById("btn1").classList.add("disabled");
    document.getElementById("btn2").classList.remove("disabled");
  }
}

function updateCar(id) {
  if (confirm("Voulez-vous modifier la voiture ?") == true) {
    fetch(`./src/controller/FrontController.php?function=updateCar&id=${id}`, {
      method: "POST",
      body: new FormData(form),
    })
      .then((result) => result.json())
      .then((data) => {
        if (data.status === "OK") {
          document.querySelector("#confirmUpdate").classList.remove("d-none");
          setTimeout(function time() {
            document.querySelector("#confirmUpdate").classList.add("d-none");
          }, 5000);
          displayCars();
          form.reset();
        }
      });
  }
}
// C'est une autre maniere de comparer.    if (regex.test(pass1.value)) {...
