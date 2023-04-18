
function calculateTotal() {

    
    const appetizersQuantity=parseInt(document.getElementById('q1').value);
    const entreesQuantity=parseInt(document.getElementById('q2').value);
    const drinksQuantity=parseInt(document.getElementById('q3').value);
    const dessertsQuantity=parseInt(document.getElementById('q4').value);
    document.getElementById('apval').innerText=`Starters: ${appetizersQuantity} items: ${parseFloat((document.getElementById('appetizers').value)*(appetizersQuantity))}/-`;
    document.getElementById('entval').innerText=`Biryanis: ${entreesQuantity} items: ${parseFloat((document.getElementById('entrees').value)*(entreesQuantity))}/-`;
    document.getElementById('drval').innerText=`Drinks: ${drinksQuantity} items: ${parseFloat((document.getElementById('drinks').value)*(drinksQuantity))}/-`;
    document.getElementById('desval').innerText=`Desserts: ${dessertsQuantity} items: ${parseFloat((document.getElementById('desserts').value)*(dessertsQuantity))}/-`;
    const totalPrice =parseFloat((document.getElementById('appetizers').value)*document.getElementById('q1').value)+parseFloat((document.getElementById('entrees').value)*document.getElementById('q2').value)+parseFloat((document.getElementById('drinks').value)*document.getElementById('q3').value)+parseFloat((document.getElementById('desserts').value)*document.getElementById('q4').value);
    document.getElementById('total').innerHTML=totalPrice;
  }
  document.getElementById('order').addEventListener('submit', function(e) {
    e.preventDefault();
    calculateTotal();
  });