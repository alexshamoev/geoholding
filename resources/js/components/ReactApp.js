import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import ExampleReact from './ExampleReact';


export default class ReactApp extends Component {
    state = {
        changed: false
    }

    handleClick = () => {
        this.setState({ changed: !this.state.changed });
    }

    render() {
        return (
            <div className='p-3'>
                <h1>
                    React Component { this.props.temp }
                </h1>

				<ExampleReact/>
				<ExampleReact temp="dddd"/>
				<ExampleReact temp="vvv"/>
            </div>
        );
    }
}
 

if(document.getElementById('examplereact')) {
	ReactDOM.render(<ReactApp/>, document.getElementById('examplereact'));
}