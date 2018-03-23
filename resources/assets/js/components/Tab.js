import React from "react";
import { Tab, Tabs, Nav, NavItem, NavDropdown, MenuItem, Row, Col } from "react-bootstrap";
import { FancyInput } from "../containers/FormContainer";
import { InputFile } from "./Form";
import { DisplayImagesFromInputFile } from "./DisplayImage";
import { RequestImages } from "./Request";
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
                                <InputFile 
                                    label = "Open file browser"
                                    labelClass = "btn btn-success"
                                    name = "image"
                                    onChange = {this.addFile}
									i={this.props.i}
                                />

                                <DisplayImagesFromInputFile file={this.props.file} i={this.props.i} displayOutside />

                             </Tab.Pane>
                            <Tab.Pane eventKey="gallery">
                                Or, use your gallery instead!
	                            <RequestImages source="/api/images" i={this.props.i} />

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
			'couple' : [],
			'key' : 1
		}

		this.handleSelect = this.handleSelect.bind(this);
	}

	handleSelect(key){
		this.setState({
			'key' : key
		});
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
				activeKey={this.state.key} 
				onSelect={this.handleSelect}
				animation
				id="controlled-tab-example"
			>
				{
					this.state.couple.map(function(couple){
						const coupleImage = couple.images[0] ? couple.images[0].url_cache : null;
						return (
							<Tab key={couple.id} eventKey={couple.id} title={couple.role}>
								<h1>{couple.role} Details </h1>
								<form action= {"/admin/couple/" + couple.id} method="POST" encType="multipart/form-data">
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
										<input type="text" name="father" className="form-control" id="fatherName" defaultValue={couple.father} />
									</div>
									<hr />

									Mother
									<div className="form-group">
										<label htmlFor="motherName">Name</label> 
										<input type="text" name="mother" className="form-control" id="motherName" defaultValue={couple.mother} />
									</div>
									<FancyInput image={coupleImage} useCustomImage i={couple.id} />

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