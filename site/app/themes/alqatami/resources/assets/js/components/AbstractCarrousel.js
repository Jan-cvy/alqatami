export default class AbstractCarrousel {
  constructor( options = {} ){
    this.position = 0
    this.total = 1
    this.loop = options.loop || false
  }

  next(){
    console.log('AbstractCarrousel.next')
    let p = this.position + 1

    if( p >= this.total ){
      if( this.loop ){
        p = 0
      }else{
        p = this.total - 1
      }
    }
    this.goto( p )
  }

  previous(){
    let p = this.position - 1

    if( p < 0 ){
      if( this.loop ){
        p = this.total - 1
      }else{
        p = 0
      }
    }

    this.goto( p )
  }

  goto( to ){
    
    to = this.clamp( to )

    // if( this.position != to ){
    this.position = to
    this._update() 
    // }
  }

  clamp( to ){
    if( to < 0 ){
      to = 0
    }else if( to > this.total - 1 ){
      to = this.total - 1
    }
    return to
  }

  _update(){

  }
}