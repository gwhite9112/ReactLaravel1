import React, {Component} from 'react';
import './App.css';

class App extends Component {  
  constructor(props) {
    super(props);
    this.state = {
      items:[],
      isLoaded:false,
    }
  }

  componentDidMount(){ 
    fetch('http://localhost:8000/api/movies')
    .then(res => res.json())
    .then(json => {
      this.setState({
        isLoaded:true,
        items:json,
      })
    }); 
  }

  handleIncrement = items => {
    var genreSelect = document.getElementById('genre');
    var currentGenre = genreSelect.options[genreSelect.selectedIndex].value;
    var box = document.getElementById('displayBox');
    var string = "";

    for(var i=0;i<items.length;i++){
      if(currentGenre==items[i].Genre){
        string += items[i].Genre+"<div row><img width='100px' src='"+ items[i].imageURL+"'></img></div>";
      }
    }
  
    box.innerHTML =string;
  };

  render(){
    var {isLoaded, items}=this.state;
    console.log("App - Rendered");
    if(!isLoaded){
      return <div>Loading...</div>;
    }else{
    return ( 
      <div className="App">
       <br></br> <div className="container">
        <h1>API Integration</h1>
        <div className="input-group">
        <select className="custom-select d-block w-1" id="genre" required>
                  <option value="">Choose...</option>
                  <option>Drama</option>
                  <option>Horror</option>
                  <option>SciFi</option>
                  <option>Documentary</option>
                </select>
              <div className="input-group-append">
                <button type="submit" className="btn btn-secondary" onClick={() => this.handleIncrement(items)} value="Drama">Submit</button>
              </div>
            </div>
            <br></br><div className="row" id="displayBox">Message Box
          </div>
        </div>    
      </div>
    );
   }
  }
}

export default App;
