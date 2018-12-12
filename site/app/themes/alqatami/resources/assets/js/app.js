// Theme by default loads a jQuery as dependency of the main script.
// Let's include it using ES6 modules import.
// import $ from 'jquery'
import Alqatami from './Alqatami';
function ready(){
  Alqatami.start()
}
document.addEventListener("DOMContentLoaded", ready);