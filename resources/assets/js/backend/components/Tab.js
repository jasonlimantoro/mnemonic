import React from "react";
import {
  Tab,
  Nav,
  NavItem,
  Row,
  Col
} from "react-bootstrap";
import {InputFile} from "./Form";
import {DisplayImagesFromInputFile} from "./DisplayImage";
import {RequestImages} from "./Request";

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
        return {page: prevState.page + offset};
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
            <Nav bsStyle="tabs" style={{marginBottom: 20}}>
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

