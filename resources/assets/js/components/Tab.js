import React from "react";
import { Tab, Tabs, Nav, NavItem, NavDropdown, MenuItem, Row, Col } from "react-bootstrap";

import { PrimaryButton } from "./Button";

export class MediaTabs extends React.Component {
    constructor(props) {
        super(props);
        this.handleSelect = this.handleSelect.bind(this);
    }

    handleSelect(key) {
        this.props.onSelect(key);
    }
    render() {
        return (
            <Tab.Container 
                id="tabs-with-dropdown" 
                activeKey={this.props.tabKey}
                onSelect={this.handleSelect}
            >
                <Row className="clearfix">
                    <Col md={12}>
                        <Nav bsStyle="tabs" style={{marginBottom: 20}}>
                            <NavItem eventKey="uploads">
                                Uploads
                            </NavItem>
                            <NavItem eventKey="gallery">
                                Gallery
                            </NavItem>
                        </Nav>
                    </Col>
                    <Col md={12}>
                        <Tab.Content animation>
                            <Tab.Pane eventKey="uploads">
                                Upload images from your local computer
                                {this.props.uploadContent}
                             </Tab.Pane>
                            <Tab.Pane eventKey="gallery">
                                Or, use your gallery instead!
                                {this.props.galleryContent}
                            </Tab.Pane>
                        </Tab.Content>
                    </Col>
                </Row>
            </Tab.Container>
        );
    }
}

export class CoupleTabs extends React.Component{
	constructor(props){
		super(props);
		this.state = {
			'couple' : []
		}

		this.requestData = this.requestData.bind(this);
		this.handleSelect = this.handleSelect.bind(this);
	}

	handleSelect(key){
		this.props.onSelect(key);
	}
	requestData(){
		axios.get('/api/couple')
			.then(function(result){
				this.setState({
					'couple': result.data
				});
			}.bind(this));
	}
	componentDidMount(){
		this.requestData();
	}

	render(){
		return (
			<Tabs 
				activeKey={this.props.activeTabKey} 
				onSelect={this.handleSelect}
				animation
				id="controlled-tab-example"
			>
				{
					this.state.couple.map(function(couple){
						return (
							<Tab key={couple.id} eventKey={couple.role} title={couple.role}>
								<form>
									<h1>{couple.role} Details </h1>
									<input type="hidden" name="_method" value="PATCH" />
									<div className="form-group">
										<label htmlFor="name">Name</label> 
										<input type="text" name="name" className="form-control" id="name" defaultValue={couple.name} />
									</div>
									{/* <div className="form-group">
										<input type="text" name="relation" className="form-control"  disabled />
									</div> */}
									<hr />

									Father
									<div className="form-group">
										<label htmlFor="fatherName">Name</label> 
										<input type="text" name="father_name" className="form-control" id="fatherName" defaultValue={couple.father} />
									</div>
									<hr />

									Mother
									<div className="form-group">
										<label htmlFor="motherName">Name</label> 
										<input type="text" name="mother_name" className="form-control" id="motherName" defaultValue={couple.mother} />
									</div>
									<div className="form-group">
										<PrimaryButton type="submit" text="Update" />
									</div>
								</form>
							</Tab>	
						);
					})
				}
			</Tabs>
		);
	}
}