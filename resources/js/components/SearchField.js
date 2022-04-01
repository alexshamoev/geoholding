import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class SearchField extends Component {
    constructor(props) {
        super(props);
        
        this.state = {
            value: '',
            loading: false
        };

        this.handleChange = this.handleChange.bind(this);
    }
    

    handleChange(event) {
        this.setState({value: event.target.value});

        let _token = $('meta[name="csrf-token"]').attr('content');

        console.log(_token);

        $.ajax({
            url: "/get-react",
            type: "POST",
            data: {
                id: this.state.value,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                
                if(response) {

                }
            },
        });
    }

    render() {
        return (
            <div className='p-2'>
               <input type="text" onChange={this.handleChange}/>
            </div>
        );
    }
}