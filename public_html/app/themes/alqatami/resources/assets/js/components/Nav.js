import css from 'dom-css'

export default class Nav{
  constructor( el ){
    this.el = el

    this.isOpened = false

    this.burger = this.el.querySelector('.nav__burger')
    this.burger.addEventListener('click', ()=>this.toggle())
    
    this.subMenus = this.el.querySelectorAll('.menu-item-has-children > a')

    for( let i = 0, lg = this.subMenus.length; i<lg; i++ ){
      this.subMenus[i].addEventListener('click', (e)=>{
        e.preventDefault()
        const submenu = this.subMenus[i].parentNode
        if( submenu.classList.contains('nav__sub--opened') ){
          submenu.classList.remove('nav__sub--opened')
          css( submenu.querySelector('.sub-menu-wrap'), 'height', 0 )
        }else{
          submenu.classList.add('nav__sub--opened')
          const submenuBox = submenu.querySelector('.sub-menu').getBoundingClientRect()
          css( submenu.querySelector('.sub-menu-wrap'), 'height', submenuBox.height )
        }
      })
    }

  }

  toggle(){
    console.log('toggle')
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