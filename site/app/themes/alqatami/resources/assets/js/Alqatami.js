import EventEmitter   from 'tiny-emitter'
import Nav            from './components/Nav'
import Carrousel      from './components/Carrousel'

class Alqatami extends EventEmitter {
  constructor(){
    super()
  }
  start(){
    this.nav = new Nav( document.querySelector('.nav') )
  
    let carrouselEl = document.querySelector('.carrousel')
    if( carrouselEl ) new Carrousel( carrouselEl )

    this.isiOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    this.isTouch = this.isiOS
    if( ! this.isTouch ){
      let touchHandler = ()=>{
        this.isTouch = true
        document.body.classList.remove('no-touch')
        window.removeEventListener('touchstart', touchHandler);
      }
      window.addEventListener('touchstart', touchHandler);
    }else{
      document.body.classList.remove('no-touch')
    }
  }
}

let a = new Alqatami
export default a