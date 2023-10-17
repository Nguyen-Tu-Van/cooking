import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Routes,Route,Link} from 'react-router-dom';
import HomePage from "./HomePage";
import AboutPage from "./AboutPage";
import ContactPage from "./ContactPage";

function App() {
    return (
        <Router>
        <nav>
            <ul>
                <li><Link to="/home">Home</Link></li>
                <li><Link to="/about">About</Link></li>
                <li><Link to="/contact">Contact</Link></li>
            </ul>
        </nav>
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
                        <div className="card-body">I'm an example component!</div>
                    </div>
                    <hr></hr>
                    <div>
                        <Routes>
                            <Route path="/home" element={<HomePage/>}></Route>
                            <Route path="/about" element={<AboutPage/>}></Route>
                            <Route path="/contact" element={<ContactPage/>}></Route>
                        </Routes>
                    </div>
                </div>
            </div>
        </div>
        </Router>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
