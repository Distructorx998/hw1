   function refresh(){
    
      const library = document.querySelector('#view');
      library.innerHTML = '';
  
      const section = document.querySelector('main');
      section.classList.remove("hidden");
      const a = document.querySelector('#righe');
      a.innerHTML = '';
    
  }
   
function onclick(event){
  const form = event.currentTarget.parentNode;
  const card= form.parentNode;
  const nome = card.querySelector(".flex").textContent;
  console.log('nome:' + nome );
  rest_url = "nome.php?name=" + nome;
        console.log('URL: ' + rest_url);
        fetch(rest_url).then(onResponse).then(onJsonName);
}

function onJsonType(json){
  console.log('JSON ricevuto');
  console.log (json);
  console.log(json.data);

  if (json.data=== undefined){
    alert("Elemento non presente nel Database");
  }

  refresh();
  const library = document.querySelector('#view');
  const main = document.querySelector('main');
 
  const date= json.data;
  const sets= json.data[0].card_sets;

  for(let i of date){
     const image= i.card_images[0].image_url;
  const img = document.createElement('img');
  const name= document.createElement('div');
  name.textContent = i.name;
  img.classList.add('album');
  img.src= image;
 
  const div= document.createElement('div');
  const form= document.createElement('form');
  const bottone= document.createElement('img');
  const span= document.createElement('span');

  bottone.src = "./assets/plus-square-fill.svg" ;
  div.classList.add('blocco');
  name.classList.add('flex');
  library.appendChild(div);
  div.appendChild(img);
  div.appendChild (span);
  span.appendChild(name)
  span.appendChild(form);
  form.appendChild(bottone);
  bottone.addEventListener('click',onclick);
  img.addEventListener('click', apriModale);

  }
  window.scroll(top,710);

}
function See(json){
  console.log(json);
}

function onError(json){
  console.log(json);
  if(json.errore != undefined){
    alert(json.errore);
  }
  else 
  alert("Carta aggiunta al Deck!");
}

function dispatchResponse(response) {

  console.log(response);
  return response.json().then(databaseResponse); 
}

function dispatchError(error) { 
  console.log("Errore");
}

function databaseResponse(json) {
  if (!json.ok) {
      dispatchError();
      return null;
  }
}

function aggiungiDatabase (event){
  const img= event.currentTarget;

  const block = event.currentTarget.parentNode;
  const card = block.parentNode;

  const nome = document.querySelector('.name').textContent;
  const set= card.querySelector('.a').textContent;
  const cod= card.querySelector('.b').textContent;
  const rarity= card.querySelector('.c').textContent;
  const price= card.querySelector('.d').textContent;
  const immagine = document.querySelector('.album').src;
  fetch ("elenco.php?nome=" +nome+"&cod=" +cod +"&rarity=" + rarity+ "&price=" +price+ "&immagine=" + immagine).then(onResponse); 
  
  if(true){  
    alert("Carta aggiunta al Database!");
}
}

function onJsonName(json){
    console.log('JSON ricevuto');
    console.log (json);
    console.log(json.data);

    refresh();
    const library = document.querySelector('#view');
    const main = document.querySelector('main');
    main.classList.remove('hidden');
    if (json.data=== undefined){
      alert("La carta richesta non esiste");
    }
    const results =json.data[0].card_images;
    const sets= json.data[0].card_sets;

    for(let result of results){
       const image= result.image_url;
    const img = document.createElement('img');
    const name= document.createElement('div');
    name.textContent= json.data[0].name;
    name.classList.add('name');
    img.classList.add('album');
    img.src= image;
   
    const div= document.createElement('div');
    div.classList.add('blocco');
    library.appendChild(div);
    div.appendChild(img);
    div.appendChild(name);

    img.addEventListener('click', apriModale);

    }

    const div1= document.querySelector('#righe');
    const p= document.createElement('div');
  
    const aa= document.createElement('div');
    aa.classList.add('a');
    const bb= document.createElement('div');
    bb.classList.add('b');
    const cc= document.createElement('div');
    cc.classList.add('c');
    const dd= document.createElement('div');
    dd.classList.add('d');
    const ee= document.createElement('div');
    ee.classList.add('e');
  
    aa.classList.add('h1');
    bb.classList.add('h1');
    cc.classList.add('h1');
    dd.classList.add('h1');
    ee.classList.add('h1');

    aa.textContent = 'Espansione'; 
    bb.textContent = 'Codice';
    cc.textContent = 'Rarità';
    dd.textContent = 'Prezzo';
    ee.textContent = 'Aggiungi';


    div1.appendChild(p);
      p.appendChild(aa);
      p.appendChild(bb);
      p.appendChild(cc);
      p.appendChild(dd);
      p.appendChild(ee);
      for (let set of sets ){
      const div1= document.querySelector('#righe');
      const p= document.createElement('div');
      const form= document.createElement('form');

      const aa= document.createElement('div');
      aa.classList.add('a');
      const bb= document.createElement('div');
      bb.classList.add('b');
      const cc= document.createElement('div');
      cc.classList.add('c');
      const dd= document.createElement('div');
      dd.classList.add('d');
      const ee= document.createElement('div');
      ee.classList.add('e');
      const ff= document.createElement('div');
      const img=document.createElement('img');
      const img1=document.createElement('img');

      aa.textContent = set.set_name; 
      bb.textContent = set.set_code;
      cc.textContent = set.set_rarity;
      dd.textContent = set.set_price; 
      img.src = "./assets/file-plus-fill.svg" ;
      img.classList.add('y');
      div1.appendChild(p);
      p.appendChild(aa);
      p.appendChild(bb);
      p.appendChild(cc);
      p.appendChild(dd);
      p.appendChild(ee);
      ee.appendChild(img);
      img.addEventListener('click', aggiungiDatabase);
    
    }
    window.scroll(top,710);
}

function apriModale(event) {
	const image = document.createElement('img');
	image.id = 'immagine_post';
	image.src = event.currentTarget.src;
	modale.appendChild(image);
	modale.classList.remove('hidden');
	document.body.classList.add('no-scroll');
}

function chiudiModale(event) {
	console.log(event);
	if(event.key === 'Escape')
	{
		console.log(modale);
		modale.classList.add('hidden');
		img = modale.querySelector('img');
		img.remove();
		document.body.classList.remove('no-scroll');
	}
}

function prevent(event) {
	event.preventDefault();
}

function onResponse(response) {
    console.log(response);
  return response.json();
}


function search(event)
{
	event.preventDefault();
  
    const content = document.querySelector('#content').value;

    if(content) {
	    const text = encodeURIComponent(content);
		console.log('Eseguo ricerca elementi riguardanti: ' + text);

		const tipo = document.querySelector('#tipo').value;
		console.log('Ricerco elementi di tipo: ' +tipo);
      
    if(text ==='all'){
          let url = "all.php" ;
          console.log('URL: ' + url);
          fetch(url).then(onResponse).then(onJsonType)  
        }

        else{
        if (tipo ==='nome'){
         let url = "nome.php?name=" + text;
        console.log('URL: ' + url);
        fetch(url).then(onResponse).then(onJsonName)
        
        }

        else if (tipo==='tipo'){
          let url = "tipo.php?race=" + text;
          console.log('URL: ' + url);
            fetch(url).then(onResponse).then(onJsonType);
        }
        else if (tipo==='attributo'){
          let url = "attributo.php?attribute=" + text;            
           console.log('URL: ' + url);
           fetch(url).then(onResponse).then(onJsonType);        }
    
          else if (tipo==='arche'){
            let url = "archetipo.php?archetype=" + text;
            console.log('URL: ' + url);
             fetch(url).then(onResponse).then(onJsonType);        }

             else if (tipo==='lv'){
              let url = "livello.php?level=" + text;
              console.log('URL: ' + url);
               fetch(url).then(onResponse).then(onJsonType);        }

               else if (tipo==='tipologia'){
                let url = "tipologia.php?type=" + text;
                console.log('URL: ' + url);
                 fetch(url).then(onResponse).then(onJsonType);        }
          }
      }
	else {
		alert("Inserisci il testo per cui effettuare la ricerca");
    }
}

const form = document.querySelector('form');
form.addEventListener('submit', search);

const modale = document.querySelector('#modale');
window.addEventListener('keydown', chiudiModale);


const home = document.querySelector('#home');
home.addEventListener('click', refresh);
