import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {

    state = {
        changed: false
    }

    handleClick = () => {
        this.setState({ changed: !this.state.changed });
    }

    render() {

        return (
            <div>
                <button onClick={this.handleClick}>change text</button>
                <span>hello {this.state.changed ? ' world' : ' alex'}</span>
            </div>
        );
    }
}


if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
