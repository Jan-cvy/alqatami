import EventEmitter   from 'tiny-emitter'
import Nav            from './components/Nav'

class Alqatami extends EventEmitter {
  constructor(){
    super()
  }
  start(){
    this.nav = new Nav( document.querySelector('.nav') )
  }
}

let a = new Alqatami
export default a