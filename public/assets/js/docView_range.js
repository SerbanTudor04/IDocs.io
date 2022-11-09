const ratings_states={
    0:"Awful 😭",
    1:"Bad 😥",
    2:"Ok 👌",
    3:"Great 😃",
    4:"Awesome 😊",
    5:"Fantastic 🔥",
}


function updateTextInput(val) {
    document.getElementById('current_rating_range').value=ratings_states[val]; 
}