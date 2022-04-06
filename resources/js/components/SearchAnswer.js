import React, { Component } from 'react';

export default class SearchAnswer extends Component {
    render() {
        return (
            <div className='p-2'>
                <div className='p-2'>
                    <a href={ '/ge/' + this.props.answer.alias_ge }>
                        { this.props.answer.title_ge }
                    </a>
                </div>
            </div>
        );
    }
}