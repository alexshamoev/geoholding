import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import ExampleReact from './ExampleReact';
import SearchField from './SearchField';


export default class ReactApp extends Component {
    state = {
        changed: false
    }

    handleClick = () => {
        this.setState({ changed: !this.state.changed });
    }

    render() {
        return (
            <div className='p-2 main_react_component'>
                <h1>
                    React Component - Search
                </h1>
                
                <SearchField/>

				<ExampleReact/>
				<ExampleReact temp="temp first text"/>
				<ExampleReact temp="temp second text"/>
            </div>
        );
    }
}


if(document.getElementById('examplereact')) {
	ReactDOM.render(<ReactApp/>, document.getElementById('examplereact'));
}