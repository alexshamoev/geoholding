import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import SearchField from './SearchField';


export default class ReactApp extends Component {
    render() {
        return (
            <div className='main_react_component'>
                <div className='p-2'>
                    <h1>
                        React Component - Search
                    </h1>
                </div>
                
                <SearchField/>
            </div>
        );
    }
}


if(document.getElementById('examplereact')) {
	ReactDOM.render(<ReactApp />, document.getElementById('examplereact'));
}