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
                <a href={ this.props.answer.fullUrl }>
                    <div className='p-2'>
                        <div className='p-2'>
                            { this.props.answer.title }
                        </div>

                        <div className='p-2'>
                            <div className='line_max_3'>
                                { (this.props.answer.text).replace(/(<([^>]+)>)/gi, "") } {/* Removing html tags from answer text */}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        );
    }
}