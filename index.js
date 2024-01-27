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




