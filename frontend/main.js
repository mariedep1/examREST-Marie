
const mesCards = document.querySelector("#mesCards");
const divPlats = document.querySelector("#plats");

getAllRestaurants();

function getAllRestaurants(){

    let data ="";

    let requete= new XMLHttpRequest(); 

    requete.open("GET", "http://localhost/frameworkObj/index.php?controller=restaurant&task=indexApi");

    requete.onload = ()=>{

        data = JSON.parse(requete.responseText); 

        faireDesCardsRestaurants(data); 


    }
    requete.send();
}


function getOneRestaurant(id){

    let requete = new XMLHttpRequest();

    requete.open('GET', `http://localhost/frameworkObj/index.php?controller=restaurant&task=showApi&id=${id}`)
            
    requete.onload = ()=>{
    
           data = JSON.parse(requete.responseText);
            
           faireRestaurantEtSesPlats(data.restaurant, data.plats);
                
            }
    requete.send()

}


 function deleteOnePlat(id){

    let requete = new XMLHttpRequest();
    requete.open("POST", "http://localhost/frameworkObj/index.php?controller=plat&task=supprApi");
    requete.onload = ()=>{

        data = JSON.parse(requete.responseText); 
        const divSuppr = document.querySelector(`div[data-plat="${id}"]`);
        divSuppr.remove(); 

    }
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    requete.send(`platId=${id}`); 

}

function createOnePlat(name, description, price, restaurantId){

    let requete = new XMLHttpRequest();
    requete.open("POST", "http://localhost/frameworkObj/index.php?controller=plat&task=createApi");

    requete.onload = ()=>{

        data = JSON.parse(requete.responseText); 
    
    }
    requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    requete.send(`namePlat=${name}&descriptionPlat=${description}&pricePlat=${price}&restaurant_id=${restaurantId}`); 



}




function faireDesCardsRestaurants(tableau){

    let cards =""; 

    tableau.forEach(element => {

        let maCard = `
        <div class="card col-3" >
            <div class="card-body">
                                    <h3  class="card-title">${element.name}</h3>
                <p class="card-text">${element.address}</p>
            <button class="showButton btn btn-info" value="${element.id}" >Voir ce restaurant</button>
                
            </div>
        </div>`;


        cards += maCard; 
        mesCards.innerHTML = cards; 
        divPlats.innerHTML = "";
        
    });

    document.querySelectorAll("button.showButton").forEach(button =>{

        button.addEventListener("click", ()=>{


            getOneRestaurant(button.value);


        })

    })

}


function faireRestaurantEtSesPlats(restaurant, plats){

    let cardRestaurant = `<div class="card col-3" >
    <div class="card-body">
                            <h3  class="card-title">${restaurant.name}</h3>
        <p class="card-text">${restaurant.address}</p>  
        <button class="btn btn-success retourRestaurants">Retour aux restaurants</button>
    </div>
</div>
`

    let formPlat = `<div>
    <div class="form-group">
            <input type="text" name="name" id="namePlat" placeholder="Nom du Plat">
        </div>
        <div class="form-group">
            <textarea name="description" id="descriptionPlat" cols="30" rows="10" placeholder="Description du plat"></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="price" id="pricePlat" placeholder="Prix">
        </div>
        <div class="form-group">
            <button class="btn btn-success addPlat" value="${restaurant.id}">Envoyer</button>
        </div>
    
        </div>
    </div> <hr>`

    
    mesCards.innerHTML = cardRestaurant;
    divPlats.innerHTML = formPlat;

    let cardsPlat = "";

    plats.forEach(plat => {
        
        let cardPlat= `<div class="row" data-plat="${plat.id}">
        <h3>${plat.name}</h3>
        <h4>${plat.price}euros</h4>
        <p>${plat.description}</p>
        
        <button class="deletePlat btn btn-danger" value="${plat.id}">Supprimer</button>
                        
        <hr>
    </div>`; 
    
        cardsPlat += cardPlat;

    });
    divPlats.innerHTML += cardsPlat;

    document.querySelector(".retourRestaurants").addEventListener("click", ()=>{
        getAllRestaurants();
    })


    document.querySelectorAll('.deletePlat').forEach(buttonDelete => {

        buttonDelete.addEventListener('click', ()=>{
            deleteOnePlat(buttonDelete.value);
        })

    })

    let addPlatButton =  document.querySelector("button.addPlat"); 
  
      addPlatButton.addEventListener('click', ()=>{
        
        let namePlat =  document.querySelector("#namePlat").value;
        let descriptionPlat =  document.querySelector("#descriptionPlat").value;
        let pricePlat =  document.querySelector("#pricePlat").value;
        let restaurantId = addPlatButton.value; 

        createOnePlat(namePlat, descriptionPlat, pricePlat, restaurantId); 
        getOneRestaurant(restaurantId);

    })
}