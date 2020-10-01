import React, {Component} from 'react'
import { render } from 'react-dom'
import PropTypes from 'prop-types'

let bookList = [
  {title:"CAN'T HURT ME", author: "David Goggins", pages:363},
  {title:"HARRY POTTER Sorcerer's Stone", author: "J.K.Rowling", pages:363},
  {title:"HARRY POTTER CHAMBER OF SECRETS", author: "J.K.Rowling", pages:363}
]

const Book = ({title="No title provided",author="No author",pages=0, freeBookMark}) => {

  return(
    <section>
      <h2>{title}</h2>
      <p>By: {author} </p>
      <p>Pages: {pages} pages</p>
  <p>Free Bookmark today: {freeBookMark ? "available":"not available"}</p>
    </section>
  ) 
}

const Hiring = () =>

    <div>   
      <p> library is hiring. check this site https://au.indeed.com/</p>
    </div>
  
const NotHiring = () => 
  <div>
    <p> Library is not hiring.</p>
  </div>

class Library extends Component{

  // static defaultProps = {
  //   books: [
  //     {"title": "tahoe Tales", "author": "Chet Whitley", "pages":1000}
  //   ]
  // }
  
  state = {
    open: true,
    freeBookMark: true,
    hiring: true,
    loading: false,
    data: []
  }

  componentDidMount(){
    this.setState({loading:true})
    fetch('http://hplussport.com/api/products/order/price/sort/asc/qty/1')
    .then(data =>data.json())
    .then(data => this.setState({data, loading:false}))
  }
 
  componentDidUpdate(){
    console.log("The componentjust updated")
  }
  toggleOpenClosed = () =>{
    this.setState(prevState=>({
      open : !prevState.open
    }))

  }

  
  render(){
    const {books} = this.props
   return(
    <div>
      {this.state.hiring ? <Hiring/>:<NotHiring/>}
   <div>{this.state.loading ? 
   "loading..." : 
   <div>{this.state.data.map(product => {

    return(
      <div key={product.id}>
        <h3>Library Product of the week!</h3>
        <h4>{product.name}</h4>
        <img alt= {product.name} src={product.image} height={100}/>
      </div>

    )
       
   })
   }
   </div>}
   </div>
      <h1> The Library is {this.state.open ? "open":"closed"}</h1>
      <button onClick={this.toggleOpenClosed}>Change</button>
      
      {books.map(
      (book, i) => 
      <Book 

      key= {i} 
      title={book.title} 
      author={book.author} 
      pages= {book.pages}
      freeBookMark = {this.state.freeBookMark}

      />
    )}  
    </div>
    
  )

  }
}
// class FavoriteColorForm extends Component{

//   state = {value: ''}
//   newColor = e => 
//   this.setState({value: e.target.value})

//   submit = e =>{
//     console.log(`New Color: ${this.state.value}`)
//     e.preventDefault()
//   }
  
//   render(){
//     return (
//       <form onSubmit={this.submit}> 
//         <label>Favorite Color:
//           <input 
//           type= "color"
//           onChange= {this.newColor}          
//           />
//         </label>
//         <button>Submit</button>
//       </form>
//     )
//   }
// }

Library.propTypes = {
  books: PropTypes.array
}

Book.propTypes = {
  title: PropTypes.string,
  author: PropTypes.string,
  pages: PropTypes.number,
  freeBookMark: PropTypes.bool
}
render(
<Library books= {bookList}/>,
document.getElementById('root')
)