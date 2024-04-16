function toggleIngredientsForm() {
    const foodCategory = document.getElementById('foodCategory').value;
    const burgerIngredients = document.getElementById('burgerIngredients');
    const pizzaIngredients = document.getElementById('pizzaIngredients');

    if (foodCategory === 'Burger') {
        burgerIngredients.style.display = 'block';
        pizzaIngredients.style.display = 'none';
    } else if (foodCategory === 'Pizza') {
        burgerIngredients.style.display = 'none';
        pizzaIngredients.style.display = 'block';
    }
}



function increment(id) {
    var inputField = document.getElementById(id);
    inputField.value = parseInt(inputField.value) + 1;
}

function decrement(id) {
    var inputField = document.getElementById(id);
    var value = parseInt(inputField.value) - 1;
    inputField.value = (value < 0) ? 0 : value;
} 



function ajouterPanier(productId) {
    fetch('./controllers/fetch/panier_controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            method : 'ajouter' , 
            productId: productId
            
        })
    })
    .then(response => response.text())
    .then(data => {

        let nombre = document.getElementsByClassName('paniernombre');
        nombre.innerHTML = data.panier;
       

        fetch('./controllers/fetch/panier_controller.php')
        .then(response => response.json())
        .then(sessionData => {
            
            console.log(sessionData.panier); 
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des données de session :', error);
        });
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
   
}


function supprimerDuPanier(productId) {
    fetch('./controllers/fetch/panier_controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            method: 'supprimer', 
            productId: productId
        })
    })
    .then(rep => rep.json()) 
    .then(data => {
        let ligneProduit = document.getElementById(productId);
        if (ligneProduit !== null) {
            ligneProduit.remove(); 
        } else {
            console.log('La ligne du produit à supprimer est introuvable.');
        }
        console.log(data.panier);
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
}

function updateProduit(productId, signe) {
    fetch('./controllers/fetch/panier_controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            method: 'modifier',
            productId: productId,
            signe: signe,
        })
    })
    .then(response => response.json())
    .then(data => {
        let id = 'quantite_' + productId;
        let idprix = 'prix_' + productId;
        let ligneProduit = document.getElementById(id);
        let ligne = document.getElementById(productId);
        let prixLigneProduit = document.getElementById(idprix);
    
        if (ligneProduit && data.qte > 0) { 
            ligneProduit.innerHTML = data.qte;
            let prix = parseInt(data.qte) * parseInt(data.price);
            prixLigneProduit.innerHTML = prix + " €";

        } else {
            
          
            
        }
    
        console.log(data.panier);
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
    
}




