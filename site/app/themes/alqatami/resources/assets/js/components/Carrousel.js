import AbstractCarrousel from './AbstractCarrousel'

export default class Carrousel extends AbstractCarrousel {
  constructor( el ){
    super()

    this.el = el

    if( this.el.classList.contains('carrousel--single') ){
      this.type = 'simple'
      this.loop = true
    }else if( this.el.classList.contains('carrousel--home') ){
      this.type = 'home'
      this.loop = true
    }

    this.init()
  }

  init(){
    this.items = this.el.querySelectorAll('.carrousel__wrapper li')
    this.total = this.items.length

    this.current = this.items[ this.position ]
    this.current.classList.add('active')

    if( this.type == 'simple' ){

      this.btRight = this.el.querySelector('.carrousel__arrow--right')
      this.btLeft = this.el.querySelector('.carrousel__arrow--left')
      this.btRight.addEventListener('click', ()=>this.next())
      this.btLeft.addEventListener('click', ()=>this.previous())

      this.counter = this.el.querySelectorAll('.carrousel__counter span')

    }else{

      this.mouse = null
      this.itemsTitle = this.el.querySelectorAll('.carrousel__description li')

      this.currentTitle = this.itemsTitle[ this.position ]
      this.currentTitle.classList.add('active')

      const container = document.querySelector('.carrousel__wrapper')
      container.addEventListener('mousemove', ( e )=>{
        if( ! this.mouse ){
          this.mouse = {
            x: e.pageX,
            y: e.pageY
          }
        }

        let distance = Math.sqrt( Math.pow( this.mouse.x - e.pageX, 2) + Math.pow( this.mouse.y - e.pageY, 2) )
        if( distance > 50 ){
          this.mouse = {
            x: e.pageX,
            y: e.pageY
          }
          this.next()
        }
      })

      container.addEventListener('click', (e)=>{
        window.location.href = this.current.querySelector('a').getAttribute('href')
      })
    }
    

  }

  _update(){
    this.current.classList.remove('active')
    if( this.type == 'home' ) this.currentTitle.classList.remove('active')
    
    this.current = this.items[ this.position ]
    
    this.current.classList.add('active')
    if( this.type == 'home' ) this.currentTitle.classList.add('active')

    if( this.counter ){
      for( let i = 0, lg = this.counter.length; i<lg; i++ ){
        this.counter[i].innerText = (this.position+1)  
      }
    }
  }
}