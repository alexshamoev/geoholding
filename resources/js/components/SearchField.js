import React, { Component } from 'react';
import axios from "axios";
import SearchAnswer from './SearchAnswer';


export default class SearchField extends Component {
    constructor(props) {
        super(props);
        
        this.state = {
            value: '',
            loading: false,
			searchAnswers: [],
			emptyMessage: ''
        };

        this.handleChange = this.handleChange.bind(this);
    }
    

    handleChange(event) {
        this.setState({ value: event.target.value });

        if(event.target.value) {
            let self = this;

            axios.post('/get-react', {
                q: event.target.value,
                lang: 'ge'
            })
            .then(function (response) {
                self.setState({ searchAnswers: response.data });


				if(response.data.length === 0) {
                    self.setState({ emptyMessage: 'no answers' });
                } else {
                    self.setState({ emptyMessage: '' });
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            this.setState({ searchAnswers: [] });
			this.setState({ emptyMessage: '' });
        }
    }

	
    render() {
		let emptyMessageWithBlock = '';

		if(this.state.emptyMessage) {
			emptyMessageWithBlock = <div className='p-2'>
										{ this.state.emptyMessage }
									</div>
		}
	

        return (
			<div>
				<div className='p-2'>
					<input type="text" onChange={this.handleChange} />
				</div>

				{this.state.searchAnswers.map((answer, idx) => (
					<SearchAnswer answer={ answer } />
				))}


				{ emptyMessageWithBlock }
			</div>
        );
    }
}