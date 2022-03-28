import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class ExampleReact extends Component {
    state = {
        changed: false
    }

    handleClick = () => {
        this.setState({ changed: !this.state.changed });
    }

    render() {
        return (
            <div className='p-3'>
                if(this.props.temp) {
                    <div className='p-2'>
                        { this.props.temp }
                    </div>
                }
                
                <div className='p-2 col-xxl-12 col-6'>
                    <button onClick={this.handleClick}>change text</button>
                </div>
                
                <div className='p-2'>
                    <span>hello {this.state.changed ? ' world' : ' alex'}</span>
                </div>
            </div>
        );
    }
}