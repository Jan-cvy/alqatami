export default class Nav{
  constructor( el ){
    this.el = el

    this.isOpened = false

    this.burger = this.el.querySelector('.nav__burger')
    this.burger.addEventListener('click', ()=>this.toggle())
    console.log(this.burger)
  }

  toggle(){
    if( this.isOpened ){
      this.close()
    }else{
      this.open()
    }
  }

  open(){
    if( ! this.isOpened ){
      this.isOpened = true
      this.el.classList.add('nav--opened')
    }
  }

  close(){
    if( this.isOpened ){
      this.isOpened = false
      this.el.classList.remove('nav--opened')
    }
  }
}