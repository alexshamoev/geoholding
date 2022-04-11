import React, { Component } from 'react';
import axios from "axios";
import SearchAnswer from './SearchAnswer';


export default class SearchField extends Component {
    constructor(props) {
        super(props);
        
        this.state = {
            lang: $('.js_lang').val(),
            value: '',
            loading: false,
			searchAnswers: [],
			showEmptyMessage: false,
            translationStrings: []
        };

        
        this.handleChange = this.handleChange.bind(this);


        let self = this;

        axios.post('/get-translation-strings', {
            lang: this.state.lang
        })
        .then(function (response) {
            self.setState({ translationStrings: response.data });
        })
        .catch(function (error) {
            console.log(error);
        });
    }


    handleChange(event) {
       this.setState({ value: event.target.value });

        if(event.target.value) {
            let self = this;

            axios.post('/get-react-search', {
                q: event.target.value,
                lang: this.state.lang
            })
            .then(function (response) {
                self.setState({ searchAnswers: response.data });


				if(response.data.length === 0) {
                    self.setState({ showEmptyMessage: true });
                } else {
                    self.setState({ showEmptyMessage: false });
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            this.setState({ searchAnswers: [] });
			this.setState({ showEmptyMessage: false });
        }
    }

	
    render() {
		let emptyMessageWithBlock = '';

		if(this.state.showEmptyMessage) {
			emptyMessageWithBlock = <div className='p-2'>
										{ this.state.translationStrings.no_search_answers }
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