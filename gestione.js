function onResponse(response) {
    console.log(response);
  return response.json();
}

function onJson(json){
    console.log(json);
    if(json.eliminato != undefined){
      alert(json.eliminato);
      window.location.href = "logout.php";
    }
    else 
    alert("Operazione fallita");
  }

function eliminaUtente(event){
    const card = event.currentTarget.parentNode.parentNode.parentNode;
    const id= card.querySelector('#id').textContent;

    fetch("aggiorna_nome.php?id="+id).then(onResponse).then(onJson);

}

function cambiaUtente(event){
  const card = event.currentTarget.parentNode.parentNode.parentNode;
  const id= card.querySelector('#id').textContent;

  fetch("elimina_utente.php?id="+id).then(onResponse).then(onJson);

}

const elimina =document.querySelector('#accedi');
elimina.addEventListener("click", eliminaUtente);


const username =document.querySelector('#usernameID');
elimina.addEventListener("click", cambiaUtente);
