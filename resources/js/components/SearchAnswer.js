import React, { Component } from 'react';

export default class SearchAnswer extends Component {
    constructor(props) {
        super(props);
        
        this.state = {
            lang: $('.js_lang').val(),
        };
    }


    render() {
        return (
            <div className='p-2'>
                <a href={ '/' + this.state.lang + '/' + this.props.answer['alias_' + this.state.lang] }>
                    <div className='p-2'>
                        { this.props.answer['title_' + this.state.lang] }
                    </div>
                </a>
            </div>
        );
    }
}