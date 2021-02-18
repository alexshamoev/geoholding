import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {

    constructor(props) {
        super(props);

        this.state = {
            changed: false
        }
    }
    
    render() {

        return (
            <div>
                <button onClick={() => this.setState({ changed: !this.state.changed })}>change text</button>
                <span>hello {this.state.changed ? ' world' : ' alex'}</span>
            </div>
        );
    }
}


if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
