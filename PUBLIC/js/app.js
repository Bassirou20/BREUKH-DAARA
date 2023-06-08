
//  alert("vxhsjxsxsxvsjx");

const niveau = document.querySelector(".id_niveau");
const classinput = document.querySelector(".classinput");
const discipline = document.querySelector(".groupediscipline");
const disciplineContainer = document.querySelector("#discipline-container")
const span = document.querySelector(".span")
const textRouge = document.querySelector(".txt_red")
const new_discipline = document.querySelector(".new_discipline");
const boutonOk = document.querySelector("#boutonOk")
// const groupedisciplines=document.querySelectorAll("#id_niveau");
// alert("vxhsjxsx")

niveau.addEventListener("change", () => {
    let idNiveau = niveau.value;
    let recup = {
        "id_niveau": idNiveau
    }
    fetch("http://localhost:8000/Discipline/afficherClasse/", {
        method: "POST",
        body: JSON.stringify(recup),
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then((data) => {
            console.log(data)
            fetch("/FICHIER.json")
                .then(response => response.json())
                .then(data => {
                    classinput.innerHTML = ""
                    data.forEach(element => {
                        console.log(element);
                        let option = document.createElement("option")
                        option.value = element.id_classe
                        option.innerHTML = element.NOM
                        classinput.appendChild(option)
                    });
                })
        })
        .catch(error => {
            console.log(error)
        })
});


fetch("http://localhost:8000/Disci/afficherDiscipline")
    .then((data) => {
        console.log(data)
        fetch("/FICHIER.json")
            .then(response => response.json())
            .then(data => {
                groupediscipline.innerHTML = "";
                data.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element.nom_gd;
                    option.innerHTML = element.nom_gd;
                    groupediscipline.appendChild(option);

                })

            })
    })


const API = "http://localhost:8000/Discipline/getDisciplineByClass/"

classinput.addEventListener("change", () => {
    let id = classinput.value;
    console.log(id);
    fetch(API + id)

        .then(response => {
            fetch("/FICHIER.json")
                .then(response => response.json())
                .then(data => {
                    disciplineContainer.innerHTML = "";
                    data.forEach(element => {
                        let div = document.createElement("div");
                        let input = document.createElement("input");
                        let label = document.createElement("label");

                        div.setAttribute('class', 'form-check form-check-inline')
                        input.setAttribute('class', 'form-check-input')
                        input.setAttribute('type', 'checkbox')
                        input.setAttribute('checked', element.etat)
                        label.setAttribute('class', 'form-check-label')
                        label.innerText = element.nom_disc

                        div.append(input, label)
                        disciplineContainer.appendChild(div);
                    });
                })
        })


})


// span.style.color = 'red';
// span.innerText = textRouge.value




new_discipline.addEventListener('change', () => {
    let discip = new_discipline.value;
    console.log(discip);
})
boutonOk.addEventListener('click', () => {
    let objet = {
      "id_class": classinput.value,
      "LIBELLE": new_discipline.value,
      "id_gd": discipline.value
    };
  
    fetch("http://localhost:8000/Discipline/insertDiscipline/", {
        method: "POST",
        body: JSON.stringify(objet),
        headers: { "Content-Type": "application/json" }
      })
      .then((data) => {
        fetch("/FICHIER.json")
          .then(response => {
            if (!response.ok) {
              throw new Error("Erreur lors de la récupération des données depuis /FICHIER.json");
            }
            return response.json();
          })
          .then(data => {
            disciplineContainer.innerHTML = "";
            data.forEach(element => {
              let div = document.createElement("div");
              let input = document.createElement("input");
              let label = document.createElement("label");
  
              div.setAttribute('class', 'form-check form-check-inline');
              input.setAttribute('class', 'form-check-input');
              input.setAttribute('type', 'checkbox');
              input.setAttribute('checked', element.etat);
              label.setAttribute('class', 'form-check-label');
              label.innerText = element.nom_disc;
  
              div.append(input, label);
              disciplineContainer.appendChild(div);
            });
          })
          .catch(error => {
            console.error(error);
          });
      });
  });
  