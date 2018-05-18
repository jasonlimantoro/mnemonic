import React from "react";
import {
  Tab,
  Tabs,
  Nav,
  NavItem,
  NavDropdown,
  MenuItem,
  Row,
  Col
} from "react-bootstrap";
import { FancyInput } from "../containers/FormContainer";
import { InputFile } from "./Form";
import { DisplayImagesFromInputFile } from "./DisplayImage";
import { RequestImages } from "./Request";
import { PrimaryButton } from "./Button";

export class MediaTabs extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {},
      page: 1
    };
    this.handleSelect = this.handleSelect.bind(this);
    this.changePage = this.changePage.bind(this);
    this.addFile = this.addFile.bind(this);
    this.offsetPage = this.offsetPage.bind(this);
  }

  handleSelect(key) {
    this.props.onSelect(key);
  }

  changePage(newPage) {
    this.setState({
      page: newPage
    });
  }

  offsetPage(offset, max, min = 1) {
    const currPage = this.state.page;
    const newPage = currPage + offset;
    if (newPage <= max && newPage >= min) {
      this.setState(prevState => {
        return { page: prevState.page + offset };
      });
    }
  }

  addFile(newFile) {
    this.setState({
      file: newFile
    });
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
            <Nav bsStyle="tabs" style={{ marginBottom: 20 }}>
              <NavItem eventKey="uploads">Uploads</NavItem>
              <NavItem eventKey="gallery">Gallery</NavItem>
            </Nav>
          </Col>
          <Col md={12}>
            <Tab.Content animation>
              <Tab.Pane eventKey="uploads">
                Upload images from your local computer
                <InputFile
                  label="Open file browser"
                  labelClass="btn btn-success"
                  name="image"
                  onChange={this.addFile}
                  i={this.props.i}
                />
                <DisplayImagesFromInputFile
                  file={this.state.file}
                  i={this.props.i}
                  displayOutside
                />
              </Tab.Pane>
              <Tab.Pane eventKey="gallery">
                Or, use your gallery instead!
                <RequestImages
                  source="/api/images"
                  i={this.props.i}
                  page={this.state.page}
                  onChangePage={this.changePage}
                  onChangeOffset={this.offsetPage}
                />
              </Tab.Pane>
            </Tab.Content>
          </Col>
        </Row>
      </Tab.Container>
    );
  }
}

export class CoupleTabs extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      couple: [],
      key: 1
    };
    this.handleSelect = this.handleSelect.bind(this);
  }

  handleSelect(key) {
    this.setState({
      key: key
    });
  }
  requestData() {
    axios.get("/api/couple").then(
      function(result) {
        this.setState({
          couple: result.data.data
        });
      }.bind(this)
    );
  }
  componentDidMount() {
    this.requestData();
  }

  render() {
    return (
      <Tabs
        activeKey={this.state.key}
        onSelect={this.handleSelect}
        animation
        id="controlled-tab-example"
      >
        {this.state.couple.map(function(couple) {
          const coupleImage = couple.image
            ? couple.image.attributes.url_cache
            : null;
          const coupleRole =
            couple.attributes.gender == "male" ? "Groom" : "Bride";
          return (
            <Tab key={couple.id} eventKey={couple.id} title={coupleRole}>
              <h1>{coupleRole} Details </h1>
              <form
                action={"/admin/wedding/couple/" + couple.id}
                method="POST"
                encType="multipart/form-data"
              >
                <input type="hidden" name="_method" value="PATCH" />
                <div className="col-md-6">
                  <div className="form-group">
                    <label htmlFor="name">Name</label>
                    <input
                      type="text"
                      name="name"
                      className="form-control"
                      id="name"
                      defaultValue={couple.attributes.name}
                      placeholder={coupleRole + " name"}
                    />
                  </div>
                  {/* <div className="form-group">
											<input type="text" name="relation" className="form-control"  disabled />
										</div> */}

                  <div className="form-group">
                    <label htmlFor="fatherName">Father</label>
                    <input
                      type="text"
                      name="father"
                      className="form-control"
                      id="fatherName"
                      defaultValue={couple.attributes.father}
                      placeholder={coupleRole + " father name"}
                    />
                  </div>

                  <div className="form-group">
                    <label htmlFor="motherName">Mother</label>
                    <input
                      type="text"
                      name="mother"
                      className="form-control"
                      id="motherName"
                      defaultValue={couple.attributes.mother}
                      placeholder={coupleRole + " mother name"}
                    />
                  </div>
									
									{canUpdate ? (
										<div className="form-group">
											<PrimaryButton type="submit" text="Publish" />
										</div> ) : ('')
									}

                </div>

                <div className="col-md-6">
                  <div className="form-group">
                    <p>
                      <strong>Current Image</strong>
                    </p>
                    <div className="current-image">
                      {coupleImage ? (
                        <img
                          src={coupleImage}
                          alt="coupleImage"
                          className="img-responsive"
                        />
                      ) : (
                        <p className="no-current-image">No image uploaded</p>
                      )}
                    </div>
                  </div>
                  <div className="form-group">
                    <FancyInput i={couple.id} />
                  </div>
                </div>
              </form>
            </Tab>
          );
        })}
      </Tabs>
    );
  }
}
